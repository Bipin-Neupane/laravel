@include('includes.head')
<header style="margin-top: -55px">
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

@include('layouts.admin.body')

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script>
    // Animation init
    new WOW().init();
    // Select initiate
    $(document).ready(function() {
      $('.mdb-select').materialSelect();
    });
    $(function () {
      $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
    });
</script>
@if (Auth::user())
<script>
    window.user = {
    id: {{auth()->id()}},
    name: '{{auth()->user()->name}}'
  };
  window.csrfToken = "{{ csrf_token() }}";
</script>
@endif

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>

</html>