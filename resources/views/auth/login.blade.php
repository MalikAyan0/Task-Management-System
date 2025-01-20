@extends('auth.app')
@section('title', 'Login Page')
@section('content')
    <div class="background">
        <div class="container">
            <div class="content d-flex justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="login-box p-5 rounded shadow-lg">
                        <h4 class="text-white mb-4 text-center wow fadeIn" data-wow-delay="0.3s">Log In</h4>
                        <form id="loginForm" method="POST" action="{{ route('login') }}" class="wow fadeInUp"
                            data-wow-delay="0.4s">
                            @csrf
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                        <label for="email">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="password" placeholder="Password">
                                        <label for="password">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <p class="text-white">Don't have an account? <a href="{{ route('register.view') }}"
                                                class="text-red ms-1">Sign Up</a></p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-light w-100 py-3 wow bounceIn"
                                        data-wow-delay="0.5s">Log In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
