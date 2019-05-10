<header id="app">
    <nav class="navbar navbar-expand-md navbar-dark blue-gradient">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">Virtual Clinic</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (!route::is('admin'))
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item {{route::is('login')? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item {{route::is('register')? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @endguest
                </ul>
                @endif
            </div>
        </div>
    </nav>

</header>