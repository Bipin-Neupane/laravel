<?php 
    $turnary = Auth::user()->user_type === 'doctor' ? 'patient_email' : 'doctor_email';
    $relation = DB::table('relations')->where($turnary, $profile->email)->first();
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
                @if ($relation->app_status === 'pending')
                <div>
                    <a class="btn z-depth-0 elegant-color text-white py-2 ml-0 mt-2" data-toggle="modal"
                        data-target="#modalLoginForm">Confirm Request</a>
                    {{-- <button class="btn z-depth-0 py-2"><span class=" text-muted"> Report User</span></button> --}}
                </div>
                @endif
                @endif

                @if ($relation && $relation->app_status === 'approved')
                <div id="videoChat"></div>
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
                        <textarea type="text" id="problems_detail" name='problems_detail' class="md-textarea form-control"
                            rows="4" autocomplete="false" required></textarea>
                        <label for="problems_detail">Problems In Detail</label>
                    </div>

                    <div class="md-form">
                        <div class="file-field">
                            <div class="btn aqua-gradient btn-sm float-left mx-0">
                                <span>Choose Image</span>
                                <input type="file" name='report' id='report'>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path" disabled type="text" placeholder="Upload your report if available">
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
@include('includes.footer')