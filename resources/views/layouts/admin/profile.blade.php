@include('includes.head')
<header>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark stylish-color-dark fixed-top" style="z-index: 999;">
    <div class="container-fluid">
      <a href='/admin' class="navbar-brand ml-5">&leftarrow; Virtual Clinic</a>
    </div>
  </nav>
  <!--/Navbar-->
</header>

<div id="profile" class="py-5 grey lighten-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 d-flex flex-column pl-0 left">
        <div class="prof-img z-depth-2 mb-2">
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
        @if ($profile->registration_status === 'pending')
        <form action="{{route('approve', $profile->email)}}" method="POST">
          @csrf
          <button class="btn btn-success mx-0 btn-md" type="submit">Approve</button>
        </form>
        @endif
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
    @if ($you->user_type === 'doctor' && $profile->registration_status === 'pending')
    <hr>
    <h3> Certificates</h3>
    <div class="row text-center">
      <div class="col">
        <img class="img-fluid" src="{{url('img/doctor/certificate/'.$profile->certificate)}}">
        <p class="text-muted"><small>Certificate</small></p>
      </div>
      <div class="col">
        <img class="img-fluid" src="{{url('img/doctor/citizenship/'.$profile->citizenship)}}">
        <p class="text-muted"><small>Citizenship</small></p>
      </div>
    </div>
    @endif
  </div>
</div>