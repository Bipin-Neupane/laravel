<div class="container-fluid px-0">
  <div class="stylish-color-dark resp-sm" id='sidebar'>
    <div>
      <h3 class="my-3">Admin Panel</h3>
    </div>
    <div class="link active"><a href="#" id='tab-1' class="tab">Dashboard</a></div>
    <div class="link"><a href="#" id='tab-2' class="tab">Doctors</a></div>
    <div class="link"><a href="#" id='tab-3' class="tab">Patients</a></div>
    <div class="link"><a href="#" id='tab-4' class="tab">Approve Doctors</a></div>
    <div class="link">
      <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </div>
  <div class="row no-gutters" style="padding-top: 56px !important;">
    <div id="space"></div>
    <div class="col py-2">
      <div class="container-fluid">
        @include('layouts.admin.dashboard')
        @include('layouts.admin.doctor')
        @include('layouts.admin.patient')
        @include('layouts.admin.pending')
      </div>
    </div>
  </div>
</div>