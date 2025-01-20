@extends('auth.app')
@section('title', 'Register')
@section('content')
    <div class="background">
        <div class="container">
            <div class="content d-flex justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="register-box p-5 rounded shadow-lg">
                        <h4 class="text-white mb-4 text-center wow fadeIn" data-wow-delay="0.3s">Sign Up</h4>
                        <form method="POST" action="{{ route('register') }}" class="wow fadeInUp" data-wow-delay="0.4s">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" placeholder="Your First Name"
                                            value="{{ old('name') }}">
                                        <label for="name">First Name</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                            name="last_name" id="last_name" placeholder="Your Last Name"
                                            value="{{ old('last_name') }}">
                                        <label for="last_name">Last Name</label>
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Your Email"
                                            value="{{ old('email') }}">
                                        <label for="email">Email Address</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Password">
                                        <label for="password">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <p class="text-white">Already have an account? <a href="{{ route('login.view') }}"
                                                class="text-red ms-1">Log in</a></p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-light w-100 py-3 wow bounceIn"
                                        data-wow-delay="0.5s">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
