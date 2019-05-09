@include('includes.head')

@if (Auth::user()->user_type === 'doctor')
@include('layouts.doctor.index')
@endif

@if (Auth::user()->user_type === 'patient')
@include('layouts.patient.index')
@endif

@include('includes.footer')