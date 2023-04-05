@extends('layouts.app')
@push('title')
    {{ __('Reset Password') }} -
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
                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="mb-25 sign-up-top-logo">
                                    <a href="{{ route('frontend') }}">
                                        <span class="logo-lg">
                                            <img src="{{ getSettingImage('app_logo_black') }}" alt="">
                                        </span>
                                    </a>
                                </div>
                                <h2 class="mb-25 font-bold">{{ __('Reset Password') }}</h2>
                                <div class="row mb-25">
                                    <div class="col-md-12">
                                        <label class="label-text-title color-heading mb-2">{{ __('Email') }}<span
                                                class="theme-link">*</span></label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ $email ?? old('email') }}" placeholder="{{ __('Email') }}">
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
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100"
                                            title="{{ __('Reset Password') }}">{{ __('Reset Password') }}</button>
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
