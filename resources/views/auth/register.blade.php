@extends('layouts.app')

@section('content')
@include('layouts.partials.authHeader')
<div class="login py-4" style='background: url({{url('img/aaa.jpg')}}) center center no-repeat; background-size:cover;'>
    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
        <div class="card wow fadeIn" data-wow-delay="0.3s">
            <form method="POST" action="{{ route('register') }}" class="card-body">
                @csrf
                <div class="form-header peach-gradient">
                    <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> Register:</h3>
                </div>

                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label for="name">Your name</label>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="md-form">
                    <i class="fas fa-envelope prefix"></i>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="on">
                    <label for="email">Your email</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="md-form">
                    <i class="fas fa-user-tag prefix"></i>
                    <select class="mdb-select md-form ml-2-half" id='role' name='role''>
                        <option value="doctor">Doctor</option>
                        <option value="patient">Patient</option>
                    </select>
                    <label class="mdb-main-label" style=' margin-top: -25px;'>Register As</label>
                </div>


                <div class="md-form">
                    <i class="fas fa-lock prefix"></i>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="off">
                    <label for="password">Your password</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="md-form">
                    <i class="fas fa-lock prefix"></i>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required>
                    <label for="password-confirm">Confirm password</label>
                </div>

                <div class="text-center">
                    <button class="btn peach-gradient btn-lg" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection