<?php 
    $turnary = Auth::user()->user_type === 'doctor' ? 'patient_email' : 'doctor_email';
    $turnary2 = $turnary === 'patient_email' ? 'doctor_email': 'patient_email';
    $relation = DB::table('relations')
        ->where($turnary, $profile->email)
        ->where($turnary2, Auth::user()->email)
        ->where('status', 'pending')
        ->first();
?>
@include('includes.head')
@include('layouts.partials.header')
<div id="profile" class="py-5 grey lighten-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 d-flex flex-column pl-0 left">
                <div class="prof-img z-depth-2 mb-2">
                    <?php $you = DB::table('users')->where('email', $profile->email)->first();?>
                    @if ($you->user_type === 'doctor')
                    <img src="{{url('img/doctor/profile/'.$profile->image)}}">
                    @else
                    <img src="{{url('img/patient/profile/'.$profile->image)}}">
                    @endif
                </div>
                <div class="pt-2">
                    <p class="text-muted">Work</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="lead">{{$profile->cur_work}}</h5>
                    <p class="grey lighten-1 text-white px-2">Present</p>
                </div>
                @if ($you->user_type === 'doctor')
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="lead">{{$profile->prev_work}}</h5>
                    <p class="grey lighten-1 text-white px-2">Previously</p>
                </div>
                <div class="pt-2">
                    <p class="text-muted">Experience</p>
                </div>
                <p>
                    @switch($profile->experience)
                    @case(0)
                    1-2 yrs
                    @break
                    @case(1)
                    2-5 yrs
                    @break
                    @case(2)
                    5-10yrs
                    @break
                    @default
                    10+ yrs
                    @endswitch
                </p>
                @endif
            </div>
            <div class="col-lg-8 col-md-8 d-flex flex-column">
                <div>
                    <h3 class="mb-0 d-inline">{{$profile->first_name}} {{$profile->last_name}}</h3>
                    <span class="text-muted ml-3">
                        <i class="fas fa-map-marker-alt"></i>
                        {{$profile->address}}
                    </span>
                    @if ($you->user_type === 'doctor')
                    <p>{{$profile->category === 0 ? 'Physician' : 'Psychiatrist'}}</p>
                    @endif
                </div>
                @if ($you->user_type === 'doctor')
                <div class="py-2">
                    <p class="text-muted mb-1">Likes</p>
                    <p><i class="far fa-thumbs-up"></i>: {{$profile->rating}}</p>
                </div>
                @endif
                @if (Auth::user()->user_type === 'patient' && !$relation)
                <div>
                    <a class="btn z-depth-0 elegant-color text-white py-2 ml-0" data-toggle="modal"
                        data-target="#modalLoginForm">Appoint Now</a>
                    {{-- <button class="btn z-depth-0 py-2"><span class=" text-muted"> Report User</span></button> --}}
                </div>
                @endif

                @if (Auth::user()->user_type === 'patient' && $relation)
                @if ($relation->app_status === 'pending')
                <div>
                    <a class="btn z-depth-0 red text-white py-2 ml-0">Waiting for approval</a>
                    {{-- <button class="btn z-depth-0 py-2"><span class=" text-muted"> Report User</span></button> --}}
                </div>
                @endif
                @endif

                @if (Auth::user()->user_type === 'doctor' && $relation)
                <div>
                    <a class="btn z-depth-0 bg-danger py-2 ml-0 mt-2" data-toggle="modal"
                        data-target="#modalProblem">Problem
                        Info</a>
                    @if ($relation->app_status === 'pending')
                    <a class="btn z-depth-0 elegant-color text-white py-2 ml-0 mt-2" data-toggle="modal"
                        data-target="#modalConfirm">Confirm Request</a>
                    {{-- <button class="btn z-depth-0 py-2"><span class=" text-muted"> Report User</span></button> --}}
                    @endif
                </div>
                @endif

                @if ($relation && $relation->app_status === 'approved')
                <p class="mt-1 mb-0" id="timecount"></p>
                <div id="videoChat" style="display:none"></div>
                <script>
                    // Set the date we're counting down to
                    var countDownDate = new Date("{{$relation->time}}").getTime();
                    
                    // Update the count down every 1 second
                    var x = setInterval(function() {
                    
                        // Get today's date and time
                        var now = new Date().getTime();
                    
                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;
                    
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                        // Display the result in the element with id="demo"
                        document.getElementById("timecount").innerHTML = days + "d " + hours + "h "
                        + minutes + "m " + seconds + "s " + "left";
                    
                        // If the count down is finished, write some text 
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("timecount").innerHTML = "";
                            document.getElementById('videoChat').style.display = 'block';
                            }
                    }, 1000);

                    window.conUser = {{$you->id}}
                </script>
                @endif

                <div class="py-3 right">
                    <h4>About</h4>
                    <hr>
                    <div class="pb-2">
                        <p class="text-muted">Basic Info</p>
                    </div>
                    <div class="d-flex mb-1">
                        <p class="title">Address:</p>
                        <p>{{$profile->address}}, {{$profile->state}}, {{$profile->country}}</p>
                    </div>
                    <div class="d-flex mb-1">
                        <p class="title">Birth date:</p>
                        <p>{{$profile->birth_date}}</p>
                    </div>
                    <div class="d-flex mb-3">
                        <p class="title">Gender:</p>
                        <p>{{ucfirst($profile->gender)}}</p>
                    </div>
                    <div class="py-2">
                        <p class="text-muted">Contact</p>
                    </div>
                    <div class="d-flex mb-1">
                        <p class="title">Email:</p>
                        <p>{{$profile->email}}</p>
                    </div>
                    <div class="d-flex mb-3">
                        <p class="title">Phone No:</p>
                        <p>{{$profile->contact}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (Auth::user()->user_type === 'patient')
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action='{{route('appoint', $profile->email)}}' enctype="multipart/form-data">
                @csrf
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Appoint Now</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-tag prefix grey-text"></i>
                        <input type="text" id="problems" name="problems" class="form-control" autofocus required>
                        <label for="problems">Problems</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil-alt prefix grey-text"></i>
                        <textarea type="text" id="problems_detail" name='problems_detail'
                            class="md-textarea form-control" rows="4" autocomplete="false" required></textarea>
                        <label for="problems_detail">Problems In Detail</label>
                    </div>

                    <div class="md-form">
                        <div class="file-field">
                            <div class="btn aqua-gradient btn-sm float-left mx-0">
                                <span>Choose Image</span>
                                <input type="file" name='report' id='report'>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path" disabled type="text"
                                    placeholder="Upload your report if available">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button class="btn btn-default">Confirm</button>
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@if (Auth::user()->user_type === 'doctor' && $relation)
@if ($relation->app_status === 'pending')
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action='{{route('confirm', $profile->email)}}' enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h3 class="mb-0">Confirm request!</h3>
                </div>
                <div class="modal-body">
                    <div>
                        <p><b>{{$profile->first_name}} {{$profile->last_name}} </b>wants to have treatment with you.
                        </p>
                    </div>
                    <div class="md-form mt-0">
                        <input type="date" name='date' id="date" class="form-control datepicker" required>
                        <label for="date" style="width:100%">Select Date</label>
                    </div>
                    <div class="md-form">
                        <input type="text" name='time' id="timepicker" class="form-control timepicker" required>
                        <label for="timepicker" style="width:100%">Select Time</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <p class="mb-0">Are you sure you want to do this?</p>
                    <button type="submit" class="btn btn-secondary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
<div class="modal fade" id="modalProblem" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Problem Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div>
                    <h4>Problem Title</h4>
                    <div class="card">
                        <div class="card-body py-0">
                            <p class="my-2">{{$relation->problems}}</p>
                        </div>
                    </div>
                </div>
                <hr />
                <div>
                    <h4>Problem Details</h4>
                    <div class="card" style='min-height: 150px;'>
                        <div class="card-body py-2">
                            <p class="mb-0">{{$relation->problems_detail}}</p>
                        </div>
                    </div>
                </div>
                <hr />
                <div>
                    <h4>Reports</h4>
                    <div class="row">
                        <div class="col-12">
                            @if ($relation->report)
                            <img class="img-fluid" src="{{url('img/user/report/'.$relation->report)}}" alt="report">
                            @else
                            <p class="my-2">No image provided.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Modal -->
<div class="modal fade" id="endVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @if (Auth::user()->user_type === 'patient')
                <h5 class="modal-title" id="exampleModalLabel"> Hi {{Auth::user()->name}},</h5>
                <p class="lead"> Hope you got your problems solved!!</p>
                <p class="py-4"> How do you rate {{$profile->first_name}}?</p>
                <a class="btn btn-success btn-sm" href="{{route('rating', [$profile->email, 'increase'])}}"
                    onclick="event.preventDefault(); document.getElementById('like').submit();">
                    <i class="fas fa-heart"></i>
                </a>
                <form id="like" action="{{route('rating', [$profile->email, 'increase'])}}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
                <a class="btn btn-danger btn-sm" href="{{route('rating', [$profile->email, 'decrease'])}}"
                    onclick="event.preventDefault(); document.getElementById('dislike').submit();">
                    <i class="fas fa-thumbs-down"></i>
                </a>
                <form id="dislike" action="{{route('rating', [$profile->email, 'decrease'])}}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
                @else
                <h5 class="modal-title" id="exampleModalLabel"> Hi {{Auth::user()->name}},</h5>
                <p class="lead"> Hope the meeting was fine!!</p>
                <p class="py-4"> Is the treatment over? If yes click complete button to end the appointment
                    permanently else discard it.</p>
                <a class="btn btn-success btn-sm" href="{{route('complete', [$profile->email, Auth::user()->email])}}"
                    onclick="event.preventDefault(); document.getElementById('complete').submit();">
                    Complete
                </a>
                <form id="complete" action="{{route('complete', [$profile->email, Auth::user()->email])}}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
                <a class="btn btn-danger btn-sm" href="{{route('prof', $profile->email)}}">Discard</a>
                @endif
            </div>
            <div class="modal-footer">
                <strong>Video chat not done yet?</strong>
                <?php $prof_route = Auth::user()->user_type === 'patient' ? 'profile': 'prof'; ?>
                <a class="btn btn-secondary" href="{{route($prof_route, $profile->email)}}"> Go back </i></a>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')