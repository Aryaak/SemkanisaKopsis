@extends('layouts.app', ['class' => 'bg-dark'])

@section('content')
    <div class="header bg-gradient-warning py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white font-weight-bold">{{ __('Welcome to Admin Dashboard Semkanisa Kopsis') }}</h1>
                        @auth
                            <a type="button" class="btn btn-outline-white btn-lg mt-4" style="border-radius:30px" href="{{route('home')}}">Go To Dashboard</a>
                        @endauth
                        @guest
                            <a type="button" class="btn btn-outline-white btn-lg mt-4 pr-5 pl-5" style="border-radius:30px" href="{{route('login')}}">
                                <i class="ni ni-key-25"></i>
                                <span>Login</span>
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-dark" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
