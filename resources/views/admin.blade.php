@include('includes.head')
<header>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark stylish-color-dark">
        <div class="container-fluid">
            <a href="{{route('home')}}" class="navbar-brand">Virtual Clinic</a>
            <button class="navbar-toggler" data-toggle='collapse' data-target='#navCol'>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id='navCol' class="collapse navbar-collapse">
                <ul class="nav navbar-nav nav-flex-icons ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--/Navbar-->
</header>
@include('includes.footer')