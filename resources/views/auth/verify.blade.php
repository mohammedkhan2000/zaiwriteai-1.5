@extends('layouts.app')
@push('title')
    {{ __('Verify') }} -
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
                            <form method="POST" action="{{ route('user.email.verify.resend', $token) }}">
                                @csrf
                                <div class="mb-25 sign-up-top-logo">
                                    <a href="{{ route('frontend') }}">
                                        <span class="logo-lg">
                                            <img src="{{ getSettingImage('app_logo_black') }}" alt="">
                                        </span>
                                    </a>
                                </div>
                                <h3 class="mb-25 font-bold">{{ __('Verify Your Account') }}</h3>
                                <div class="row mb-25">
                                    <div class="col-md-12 mb-3">
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100"
                                                title="{{ __('Click here to request another') }}">{{ __('Click here to request another') }}</button>
                                        </div>
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
