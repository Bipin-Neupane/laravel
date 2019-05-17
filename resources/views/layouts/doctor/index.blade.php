@include('layouts.partials.header')

@if($data->registration_status === 'pending')

@if ($data->submit_status === 'submitted')
<div class="min-vh-100 d-flex align-items-center text-center" style="margin-top: -55px;">
  <p class="lead mx-auto">We got your info and will review it as soon as possible <br>Please come again later.</p>
</div>
@else
<h1 class="p-4"> Fill the form below to complete the registration process </h1>
@include('layouts.doctor.form')
@endif
{{-- End --}}
@else
@include('layouts.doctor.main')

@endif