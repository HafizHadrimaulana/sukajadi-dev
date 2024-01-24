<x-landing-layout>
    <section class="content">
        <div class="container">
            <div class="row justify-content-center pt-md-5">
                <div class="col-4">
                    <div class="login-logo" style="background:#eee;opacity: 0.8">
                        <a href="#"><b>PORTAL</b></a>
                      </div>

                    <div class="card">
                        <div class="card-body bg-white">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                {{-- <input type="email" class="form-control" placeholder="Email" autocomplete="off"> --}}
                                    <input
                                        {{-- id="email" --}}
                                        type="email"
                                        placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required="required"
                                        autocomplete="email"
                                        autofocus="autofocus">
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
                                    {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                                    <input
                                        id="password"
                                        type="password"
                                        placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        required="required"
                                        autocomplete="current-password">
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
                                    {{-- <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="remember">
                                            <label for="remember">
                                                Ingat sesi saya
                                            </label>
                                        </div>
                                    </div> --}}
                                    <!-- /.col -->
                                    <div class="mb-0">
                                        <button type="submit" class="btn btn-primary w-100">Login</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-landing-layout>