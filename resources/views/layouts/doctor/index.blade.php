@if (Auth::user()->register_status === 'pending')
@include('layouts.partials.header')

<h1 class="p-4"> Fill the form below to complete the registration process </h1>
@else
@include('layouts.partials.header')
doctor
@endif