@extends('layouts.app')

@section('content')
@include('layouts.partials.authHeader')
<div class="login py-4" style='background: url({{url('img/aaa.jpg')}}) center center no-repeat; background-size:cover;'>
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
                <div class="card wow fadeIn" data-wow-delay="0.3s">
                    <form method="POST" action="{{ route('login') }}" class="card-body">
                        @csrf
                        <div class="form-header purple-gradient">
                            <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> Log in:</h3>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-envelope prefix"></i>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="email">Your email</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-lock prefix"></i>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            <label for="password">Your password</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <div class="text-center">
                            <button class="btn purple-gradient btn-lg" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection