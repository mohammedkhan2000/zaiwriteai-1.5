@extends('frontend.layouts.app')
@push('title')
    {{ $title }} -
@endpush
@section('content')
    <!-- Page Banner Area Start -->
    <section class="page-banner-area">
        <img src="{{ asset('frontend/assets/img/page-banner-img/page-banner-bg.webp') }}" alt=""
            class="img-fluid position-absolute page-banner-bg-floating-img">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-banner-content position-relative">
                        <h2 class="text-white mb-2">{{ $title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner Area End -->
    <section class="faqs-area section-t-space section-b-small-space position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12">
                    <div class="faq-content-box faq-left-part">
                        {!! nl2br($page) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
