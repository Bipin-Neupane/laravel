@include('layouts.partials.header')

@if ($data->submit_status === 'submitted')
@include('layouts.patient.main')
@else
<h1 class="p-4"> Fill the form below to complete the registration process</h1>
@include('layouts.patient.form')
@endif