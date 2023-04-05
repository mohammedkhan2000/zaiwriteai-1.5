@extends('layouts.app')
@push('title')
    {{ __('Sign Up') }} -
@endpush
@section('content')
    <div id="headless-wrapper">
        <section class="sign-up-page bg-secondary">
            <img src="{{ getSettingImage('sign_in_image') }}"
                class="footer-floating-bg-img theme-common-floating-bg-img position-absolute img-fluid">
            <div class="container-fluid p-0">
                <div class="row sign-up-page-wrap-row justify-content-center">
                    <div class="col-md-6">
                        <div class="sign-up-right-content position-relative bg-white radius-15 ">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="mb-25 sign-up-top-logo">
                                    <a href="{{ route('frontend') }}">
                                        <span class="logo-lg">
                                            <img src="{{ getSettingImage('app_logo_black') }}" alt="">
                                        </span>
                                    </a>
                                </div>
                                <h2 class="mb-25 font-bold">{{ __('Sign Up') }}</h2>
                                <p class="font-16 mb-30">{{ __('Already have an account?') }} <a href="{{ route('login') }}"
                                        class="secondary-color font-medium">{{ __('Sign In') }}</a></p>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label class="label-text-title color-heading mb-2">{{ __('First Name') }} <span
                                                class="theme-link">*</span></label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                                            class="form-control" placeholder="{{ __('First Name') }}">
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label class="label-text-title color-heading mb-2">{{ __('Last Name') }} <span
                                                class="theme-link">*</span></label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                                            class="form-control" placeholder="{{ __('Last Name') }}">
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label class="label-text-title color-heading mb-2">{{ __('Email') }} <span
                                                class="theme-link">*</span></label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="{{ __('Email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label class="label-text-title color-heading mb-2">{{ __('Password') }} <span
                                                class="theme-link">*</span></label>
                                        <div class="form-group mb-0 position-relative">
                                            <input class="form-control password" name="password"
                                                placeholder="{{ __('Password') }}" type="password">
                                            <span class="toggle cursor fas fa-eye pass-icon"></span>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label class="label-text-title color-heading mb-2">{{ __('Confirm Password') }}
                                            <span class="theme-link">*</span></label>
                                        <div class="form-group mb-0 position-relative">
                                            <input class="form-control password" name="password_confirmation"
                                                placeholder="{{ __('Confirm Password') }}" type="password">
                                            <span class="toggle cursor fas fa-eye pass-icon"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-25"><a href="{{ route('password.request') }}"
                                            class="theme-link font-18 d-block text-start font-medium"
                                            title="{{ __('Forgot password?') }}">{{ __('Forgot password?') }}</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100"
                                            title="{{ __('Sign Up') }}">{{ __('Sign Up') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
