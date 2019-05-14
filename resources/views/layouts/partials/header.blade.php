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
          <li class="nav-item dropdown notifications-nav">
            <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <span class="badge red">3</span> <i class="fas fa-bell"></i>
              <span class="d-none d-md-inline-block">Notifications</span>
            </a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">
                <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                <span>New order received</span>
                <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
              </a>
              <a class="dropdown-item" href="#">
                <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                <span>New order received</span>
                <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
                <span>Your campaign is about to end</span>
                <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect"><i class="far fa-comments"></i> <span
                class="clearfix d-none d-sm-inline-block">Support</span></a>
          </li>
          <li class="nav-item avatar dropdown">
            <a class="nav-link dropdown-toggle d-flex" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" style="margin-top: 2px;">
              <p class="align-self-center mb-0 mr-2 text-capitalize">{{Auth::user()->name}}</p>
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0"
                alt="avatar image">
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