@extends('layouts.guest')
@section('judul', 'Login')
@section('content')
<div class="login-page">
    
    <div class="login-box">
        <div class="login-logo">
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" style="height:6rem;"/>
                <img src="{{ asset('images/logo2.png') }}" style="height:6rem;"/>
            </div>
        </div>

        <div class="card card-outline card-primary">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Login untuk mulai</p>
                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input
                            id="field-email"
                            type="email"
                            placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            autofocus="autofocus"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input
                            id="password"
                            type="password"
                            placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            autocomplete="current-password"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login Sekarang</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection