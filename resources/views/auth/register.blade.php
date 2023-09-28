@extends('layouts.auth')

@section('content')
    
    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
                style="background-image: url('{{asset('assets/img/ohb/bg-regis.jpg')}}');">
                <span class="mask  opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5"></h1>
                            <br><br>
                            <p class="text-lead text-white"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4">
                                <h5>Register Here</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus
                                            placeholder="Masukan Nama">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Masukan Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input id="telp" type="number"
                                            class="form-control @error('telp') is-invalid @enderror" name="telp"
                                            value="{{ old('telp') }}" required autocomplete="telp"
                                            placeholder="Masukan No Telepon">

                                        @error('telp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input id="ig" type="text"
                                            class="form-control @error('ig') is-invalid @enderror"  name="ig"
                                            value="{{ old('ig') }}" required autocomplete="ig"
                                            placeholder="Masukan Username IG Kamu" aria-describedby="addon-wrapping">

                                        @error('ig')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-sm mt-3 mb-0">
                                            Jenis kelamin
                                          </p>
                                        <div class="radio-container">
                                            <label class="radio">
                                                <input type="radio" name="jenis_kelamin" value="laki-laki">
                                                <span class="radio-btn"></span>
                                                Laki - Laki
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="jenis_kelamin" value="perempuan">
                                                <span class="radio-btn"></span>
                                                Perempuan
                                            </label>
                                            
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Masukan Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Masukan Ulang Password">
                                    </div>
                                    <div class="form-check form-check-info text-left">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                            checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms
                                                and Conditions</a>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info btn-user btn-block">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;"
                                            class="text-dark font-weight-bolder">Sign in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
