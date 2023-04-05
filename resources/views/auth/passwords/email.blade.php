@extends('layouts.app')
@push('title')
    {{ __('Email') }} -
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
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-25 sign-up-top-logo">
                                    <a href="{{ route('frontend') }}">
                                        <span class="logo-lg">
                                            <img src="{{ getSettingImage('app_logo_black') }}" alt="">
                                        </span>
                                    </a>
                                </div>
                                <h2 class="mb-25 font-bold">{{ __('Reset Password') }}</h2>
                                <div class="row mb-25">
                                    <div class="col-md-12 mb-3">
                                        @if (session('status'))
                                            <strong class="text-success">{{ session('status') }}</strong>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <label class="label-text-title color-heading mb-2">{{ __('Email') }}<span
                                                class="theme-link">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control email" placeholder="{{ __('Email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100"
                                            title="{{ __('Send Password Reset Link') }}">{{ __('Send Password Reset Link') }}</button>
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
