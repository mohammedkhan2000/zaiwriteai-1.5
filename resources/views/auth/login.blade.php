@extends('layouts.app')
@push('title')
    {{ __('Login') }} -
@endpush
@section('content')
    <div id="headless-wrapper">
        <!-- Sing In Area Start -->
        <section class="sign-up-page bg-secondary">
            <img src="{{ getSettingImage('sign_in_image') }}" 
                class="footer-floating-bg-img theme-common-floating-bg-img position-absolute img-fluid">
            <div class="container-fluid p-0">
                <div class="row sign-up-page-wrap-row justify-content-center">
                    <div class="col-md-6">
                        <div class="sign-up-right-content position-relative bg-white radius-15 ">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-25 sign-up-top-logo">
                                    <a href="{{ route('frontend') }}">
                                        <span class="logo-lg">
                                            <img src="{{ getSettingImage('app_logo_black') }}" alt="">
                                        </span>
                                    </a>
                                </div>
                                <h2 class="mb-25 font-bold">{{ __('Log In') }}</h2>
                                <p class="font-16 mb-30">{{ __('Don’t have an account?') }}
                                    <a href="{{ route('register') }}"
                                        class="secondary-color font-medium">{{ __('Sign up') }}</a>
                                </p>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label class="label-text-title color-heading mb-2">{{ __('Email') }}<span
                                                class="theme-link">*</span></label>
                                        <input type="text" name="email" class="form-control email"
                                            placeholder="{{ __('Email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label class="label-text-title color-heading mb-2">{{ __('Password') }}<span
                                                class="theme-link">*</span></label>
                                        <div class="form-group mb-0 position-relative">
                                            <input class="form-control password" placeholder="{{ __('Password') }}"
                                                type="password" name="password">
                                            <span class="toggle cursor fas fa-eye pass-icon"></span>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-25"><a href="{{ route('password.request') }}"
                                            class="theme-link font-18 d-block text-start font-medium"
                                            title="{{ __('Forgot Password?') }}">{{ __('Forgot Password?') }}</a></div>
                                </div>
                                @if (env('LOGIN_HELP') == 'active')
                                    <div class="row">
                                        <div class="col-md-12 mb-25">
                                            <div class="table-responsive login-info-table mt-3">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2" id="adminCredentialShow" class="login-info">
                                                                <b>Admin :</b> admin@gmail.com | 123456
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" id="userCredentialShow" class="login-info">
                                                                <b>User :</b> user@gmail.com | 123456
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100"
                                            title="{{ __('Log In') }}">{{ __('Log In') }}</button>
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
@push('script')
    <script>
        "use strict"
        $('#adminCredentialShow').on('click', function() {
            $('.email').val('admin@gmail.com');
            $('.password').val('123456');
        });
        $('#userCredentialShow').on('click', function() {
            $('.email').val('user@gmail.com');
            $('.password').val('123456');
        });
    </script>
@endpush
