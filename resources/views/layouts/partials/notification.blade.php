<?php
    $email = Auth::user()->user_type === 'patient' ? 'patient_email' : 'doctor_email';
    $data = DB::table('relations')
        ->where($email , Auth::user()->email)
        ->where('status', 'pending')
        ->get();
?>
<li class="nav-item dropdown notifications-nav">
    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="badge red">{{$data->count()}}</span> <i class="fas fa-bell"></i>
        <span class="d-none d-md-inline-block">Notifications</span>
    </a>
    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        @if ($data->count() > 0)
        @if (Auth::user()->user_type === 'patient')
        @foreach ($data as $dat)
        <?php $get = DB::table('doctors')->where('email', $dat->doctor_email)->first();?>
        @if ($dat->app_status === 'pending')
        <a class="dropdown-item" href="#">
            <span>Request Sent to: {{$get->first_name}}</span>
        </a>
        @else
        <a class="dropdown-item" href="#">
            <span>Approved from: {{$get->first_name}}</span>
        </a>
        @endif
        @endforeach
        @else
        @foreach ($data as $dat)
        <?php $get = DB::table('patients')->where('email', $dat->patient_email)->first();?>
        <a class="dropdown-item" href="#">
            <span>Request from: {{$get->first_name}}</span>
            <span> </span>
            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
        </a>
        @endforeach
        @endif
        @else
        <a class="dropdown-item" href="#">
            <span>No Notifications</span>
        </a>
        @endif
    </div>
</li>