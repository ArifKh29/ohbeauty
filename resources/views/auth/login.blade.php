@extends('layouts.auth')

@section('content')
    {{-- <section class="vh-100" style="background-color: #ffffff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-6">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="col-md-12 col-lg-12 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <div class="d-flex align-items-center justify-content-center pb-4">
                                    <img src="{{ url('img/logo.png') }}" height="100" alt="LOL Logo" loading="lazy"
                                        style="margin-top: -1px;" />
                                </div>

                                <h6 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h6>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <div class="form-group">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="form-outline mb-4">
                                            <div class="form-group">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password" placeholder="Masukan Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                            <div class="form-outline mt-4">

                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                </form>

                                <a class="small text-muted" href="#!">Forgot password?</a>
                                <p class="mb-2 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ url('register')}}"
                                        style="color: #393f81;">Register here</a></p>
                                <a href="#!" class="small text-muted">Terms of use.</a>
                                <a href="#!" class="small text-muted">Privacy policy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section> --}}
    
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-7 mb-7">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Welcome</h3>
                                    {{-- <p class="mb-0">Enter your email and password to sign in</p> --}}
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror    
                                        </div>
                                        <div class="text-center">
                                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">
                                                    {{ __('Sign In') }}
                                                </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="{{ url('register')}}" class="text-info text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top h-100 z-index-0 ms-n6"
                                    style="background-image:url('{{ asset('assets/img/ohb/bghome.jpg')}}')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
