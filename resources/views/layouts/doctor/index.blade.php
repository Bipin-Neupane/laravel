@include('layouts.partials.header')
@if($data->registration_status === 'pending')
<h1 class="p-4"> Fill the form below to complete the registration process </h1>
@else
doctor
@endif