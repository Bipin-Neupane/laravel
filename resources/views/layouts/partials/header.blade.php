<header>
  <nav class="navbar navbar-expand-lg navbar-light white">
    <div class="container-fluid">
      <a href="{{route('home')}}" class="navbar-brand">Virtual Clinic</a>
      <button class="navbar-toggler" data-toggle='collapse' data-target='#navCol'>
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id='navCol' class="collapse navbar-collapse">
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Doctor's Category</a>
            <div class="dropdown-menu">
              <a href="{{route('category', 'physician')}}" class="dropdown-item">PHYSICIAN</a>
              <a href="{{route('category', 'psychiatrist')}}" class="dropdown-item">PSYCHIATRIST</a>
            </div>
          </li>

          @include('layouts.partials.notification')

          <li class="nav-item avatar dropdown">
            <a class="nav-link dropdown-toggle d-flex" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" style="margin-top: 2px;">
              <p class="align-self-center mb-0 mr-2 text-capitalize">{{Auth::user()->name}}</p>
              <?php
              if (Auth::user()->user_type === 'doctor'){
                $users = DB::table('doctors')->where('email', Auth::user()->email)->first();
              }
              if (Auth::user()->user_type === 'patient'){
                $users = DB::table('patients')->where('email', Auth::user()->email)->first();
              }
              ?>
              @if ($users->image)
              <img src="{{url('img/'.Auth::user()->user_type.'/profile/'.$users->image)}}"
                class="rounded-circle z-depth-0" alt="avatar image" style="width:35px;">
              @else
              <img src="{{url('img/avatar-d.png')}}" class="rounded-circle z-depth-0" alt="avatar image">
              @endif
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-secondary"
              aria-labelledby="navbarDropdownMenuLink-55">
              <a class="dropdown-item" href="#">My account</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Log Out</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>