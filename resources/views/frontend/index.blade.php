@extends('frontend.layouts.app')
@push('title')
    {{ __('Welcome') }} -
@endpush
@section('content')
    <!-- Header Start -->
    @if (getOption('home_hero_section_status', 1) == ACTIVE)
        <header id="home" class="hero-area position-relative">
            <img src="{{ asset('frontend/assets/img/hero-area-bottom-part-bg.webp') }}"
                class="hero-bottom-floating-bg-img theme-common-floating-bg-img position-absolute img-fluid">
            <div class="hero-area-top-part position-relative">
                <img src="{{ asset('frontend/assets/img/page-banner-img/page-banner-bg.webp') }}"
                    class="hero-top-floating-bg-img theme-common-floating-bg-img position-absolute img-fluid">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 col-xl-10">
                            <div class="hero-content text-center position-relative">
                                <div class="hero-main-title d-inline-flex">
                                    <h1 class="hero-main-title-left font-medium text-white">
                                        {{ getOption('home_hero_title_one') }} </h1>
                                    <div class="hero-robot-img position-relative">
                                        <img src="{{ asset('frontend/assets/img/hero-robot-img.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <h1 class="hero-main-title-right font-medium text-white">
                                        {{ getOption('home_hero_title_two') }}</h1>
                                </div>
                                <h1
                                    class="hero-title-second header-caption-heading cd-headline clip is-full-width position-relative">
                                    <span id="typed-strings">
                                        @foreach (explode(',', getOption('home_hero_title_slider')) as $slider)
                                            <b>{{ $slider }}</b>
                                        @endforeach
                                    </span>
                                    <span id="typed"></span>
                                </h1>
                                <p class="hero-sub-title font-17 font-medium">
                                    {!! getOption('home_hero_title_summery') !!}
                                </p>
                                <a href="{{ route('register') }}" class="theme-btn">{{ __('Get Free Trial') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-area-bottom-part position-relative">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-12 col-xl-10">
                            <div class="hero-area-img position-relative">
                                <img src="{{ empty(getOption('home_hero_area_image')) ? asset('frontend/assets/img/hero-img.png') : getSettingImage('home_hero_area_image') }}"
                                    alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endif
    <!-- Header End -->

    <!-- Brand Logo Slider Area Start -->
    @if (getOption('home_brand_section_status', 1) == ACTIVE)
        <section id="brand" class="brand-logo-slider-area section-t-space">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="section-heading-small">{{ getOption('home_brand_section_title') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-carousel">
                        <div class="owl-carousel carousel-main brand-carousel">
                            @foreach ($brands as $brand)
                                <div class="single-logo"><img src="{{ $brand->image }}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Brand Logo Slider Area End -->

    <!-- Generate Content Area Start -->
    @if (getOption('home_generate_content_section_status', 1) == ACTIVE)
        <section id="feature" class="generate-content-area section-t-space">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">{{ getOption('home_generate_content_section_title') }}</h2>
                            <p class="section-sub-heading">{!! getOption('home_generate_content_section_summery') !!}</p>
                        </div>
                    </div>
                </div>
                <div class="generate-content-row-wrap bg-white theme-border radius-20 p-30">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 col-xl-6 col-xxl-5">
                            <div class="faq-content-box faq-left-part generate-content-faq radius-10 p-30">
                                <!-- Accordion Start -->
                                <div class="accordion" id="accordionExample3">
                                    @foreach ($generateContentSubCategories as $key => $subCategory)
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="headingEleven{{ $key }}">
                                                <button
                                                    class="accordion-button font-semibold {{ $key != 0 ? 'collapsed' : '' }}"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseEleven{{ $key }}"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    <span class="iconify"
                                                        data-icon="jam:write"></span>{{ $subCategory->name }}
                                                </button>
                                            </h5>
                                            <div id="collapseEleven{{ $key }}"
                                                class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                                aria-labelledby="headingEleven{{ $key }}"
                                                data-bs-parent="#accordionExample3">
                                                <div class="accordion-body">
                                                    {{ $subCategory->summery }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Accordion End -->
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-6 col-xxl-7">
                            <div class="generate-content-right">
                                <img src="{{ getSettingImage('home_generate_content_section_image') }}" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Generate Content Area End -->

    <!-- How It Works Area Start -->
    @if (getOption('home_how_it_word_section_status', 1) == ACTIVE)
        <section id="how-it-works" class="how-it-works-area section-t-space">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="section-heading-small">{{ getOption('home_how_it_word_section_title') }}</h3>
                            <p class="section-sub-heading">{{ getOption('home_how_it_word_section_summery') }}</p>
                        </div>
                    </div>
                </div>

                <div class="how-it-works-wrap">

                    <!-- How It Works Item Start -->
                    @foreach ($howItWorks as $howItWork)
                        <div class="how-it-works-item">
                            <div class="row">
                                <div class="col-12">
                                    <div class="how-it-works-area row align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <div class="how-it-works-item-left">
                                                <img src="{{ $howItWork->image }}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="how-it-works-item-right">
                                                <div
                                                    class="how-it-works-number bg-primary-color d-inline-flex align-items-center justify-content-center text-white font-16 font-semi-bold radius-50 mb-15">
                                                    {{ $loop->iteration }}</div>
                                                <h2 class="how-it-works-item-title">{{ $howItWork->title }}</h2>
                                                <p class="mt-25">{{ $howItWork->summery }}</p>
                                                <ul class="how-it-works-features mt-25">
                                                    @foreach (explode(',', $howItWork->content) as $content)
                                                        <li class="d-flex mb-3">
                                                            <span
                                                                class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                                                                <span class="iconify font-16"
                                                                    data-icon="material-symbols:check-small-rounded"></span>
                                                            </span>
                                                            <span class="flex-grow-1">{{ $content }}</span>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="how-it-works-item-bg text-center">
                                                <img src="{{ asset('frontend/assets/img/how-it-works-img/how-it-works-bg.png') }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- How It Works Item End -->
                </div>
            </div>
        </section>
    @endif
    <!-- How It Works Area End -->

    <!-- Pricing Area Start -->
    @if (getOption('home_pricing_section_status', 1) == ACTIVE)
        <section id="pricing" class="pricing-area section-t-space">
            <div class="pricing-area-top-part text-center position-relative">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-md-12 position-relative">
                            <div class="pricing-top-part-content-wrap radius-20 section-t-space">

                                <img src="{{ asset('frontend/assets/img/page-banner-img/page-banner-bg.webp') }}"
                                    class="pricing-floating-bg-img theme-common-floating-bg-img position-absolute img-fluid">

                                <div class="pricing-top-part-content position-relative">
                                    <h1 class="pricing-special-title text-white font-semi-bold">
                                        {{ getOption('home_price_section_title_first') }} <span
                                            class="pricing-special-small-title">{{ getOption('home_price_section_title_color') }}</span><br>
                                        <span>{{ getOption('home_price_section_title_last') }}</span>
                                    </h1>
                                    <p>{{ getOption('home_price_section_summery') }}</p>

                                    <a href="{{ route('register') }}" class="theme-btn">{{ __('Get Free Trial') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pricing-area-bottom-part position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title w-100">
                                <h2 class="section-heading text-white">{{ __('Want More Feature? Try Premium!') }}
                                </h2>
                            </div>
                            <div class="d-flex justify-content-center align-items-center pb-5 text-white">
                                <span class="mx-3">{{ __('Monthly') }}</span>
                                <div class="payment-subscription-switch form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1"
                                        id="monthly-yearly-button">
                                    <label class="form-check-label" for="monthly-yearly-button"></label>
                                </div>
                                <span class="mx-3">{{ __('Yearly') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Choose a plan content Start -->
                            <div class="choose-plan-area">
                                <div class="pricing-plan-area">
                                    <div class="row price-table-wrap">
                                        @foreach ($plans as $plan)
                                            <div class="col-md-6 col-lg-4 mb-25">
                                                <div class="price-card-item h-100 p-30">
                                                    <h5 class="font-semi-bold">{{ $plan->name }}</h5>
                                                    <hr>
                                                    <h2 class="price-title mb-4 price-monthly">
                                                        {{ currencyPrice($plan->monthly_price) }}<span
                                                            class="font-18 font-semi-bold">/{{ __('monthly') }}</span>
                                                    </h2>
                                                    <h2 class="price-title mb-4 d-none price-yearly">
                                                        {{ currencyPrice($plan->yearly_price) }}<span
                                                            class="font-18 font-semi-bold">/{{ __('yearly') }}</span>
                                                    </h2>
                                                    <h5 class="font-semi-bold mt-2">{{ __('What’s included') }}</h5>
                                                    <ul class="pricing-features">
                                                        <li class="d-flex align-items-center mb-3">
                                                            <span
                                                                class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                                                                <span class="iconify font-16"
                                                                    data-icon="material-symbols:check-small-rounded"></span>
                                                            </span>
                                                            <span class="flex-grow-1">{{ __('Generate') }}
                                                                {{ $plan->generate_characters }}
                                                                {{ __('Characters') }}</span>
                                                        </li>
                                                        <li class="d-flex align-items-center mb-3">
                                                            <span
                                                                class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                                                                <span class="iconify font-16"
                                                                    data-icon="material-symbols:check-small-rounded"></span>
                                                            </span>
                                                            <span class="flex-grow-1">{{ 'Access' }}
                                                                {{ getUseCase($plan->access_use_cases) }}
                                                                {{ 'use cases' }}</span>
                                                        </li>
                                                        <li class="d-flex align-items-center mb-3">
                                                            <span
                                                                class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                                                                <span class="iconify font-16"
                                                                    data-icon="material-symbols:check-small-rounded"></span>
                                                            </span>
                                                            <span class="flex-grow-1">{{ __('Write in') }}
                                                                {{ $plan->write_languages }}
                                                                {{ __('languages') }}</span>
                                                        </li>
                                                        <li class="d-flex align-items-center mb-3">
                                                            <span
                                                                class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                                                                <span class="iconify font-16"
                                                                    data-icon="material-symbols:check-small-rounded"></span>
                                                            </span>
                                                            <span>{{ __('Access') }} {{ $plan->access_tones }}
                                                                {{ __('tones') }}</span>
                                                        </li>

                                                        @if ($plan->access_community != null && $plan->access_community != '')
                                                            <li class="d-flex align-items-center mb-3">
                                                                <span
                                                                    class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                                                                    <span class="iconify font-16"
                                                                        data-icon="material-symbols:check-small-rounded"></span>
                                                                </span>
                                                                <span
                                                                    class="flex-grow-1">{{ $plan->access_community }}</span>
                                                            </li>
                                                        @endif
                                                        @if ($plan->support != null && $plan->support != '')
                                                            <li class="d-flex align-items-center mb-3">
                                                                <span
                                                                    class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center status-btn-purple radius-50 me-2">
                                                                    <span class="iconify font-16"
                                                                        data-icon="material-symbols:check-small-rounded"></span>
                                                                </span>
                                                                <span class="flex-grow-1">{{ $plan->support }}</span>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                    @if (auth()->user()?->id && $plan->id == auth()->user()->currentPlan?->package_id)
                                                        <button type="button" class="theme-btn-outline mt-15 active"
                                                            title="{{ __('Current Plan') }}">
                                                            {{ __('Current Plan') }}
                                                        </button>
                                                    @else
                                                        <a href="{{ route('user.subscription.index') }}"
                                                            class="theme-btn-outline mt-15"
                                                            title="{{ __('Subscribe Now') }}">
                                                            {{ __('Subscribe Now') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Choose a plan content End -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Pricing Area End -->

    <!-- Customer Testimonial Area Start -->
    @if (getOption('home_testimonial_section_status', 1) == ACTIVE)
        <section class="customer-testimonial-area section-t-small-space">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">{{ getOption('home_testimonial_section_title') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="owl-big owl-carousel owl-theme customer-testimonial-slider">
                            <!-- Testimonial Item Start -->
                            @foreach ($testimonials as $testimonial)
                                <div class="customer-testimonial-item position-relative radius-20">
                                    <div
                                        class="testimonial-top-part d-flex justify-content-between align-content-center mb-25">
                                        <div class="customer-testimonial-img d-inline-flex align-items-center">
                                            <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}"
                                                class="fit-image">
                                            <div>
                                                <h5 class="testimonial-client-name">{{ $testimonial->name }}</h5>
                                                <p class="font-normal theme-text-color">
                                                    {{ $testimonial->designation }}</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote">
                                            <span class="iconify" data-icon="clarity:block-quote-line"></span>
                                        </div>
                                    </div>
                                    <h6 class="customer-testimonial-text theme-text-color mb-25">
                                        {{ $testimonial->comment }}
                                    </h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="customer-testimonial-rating">
                                            {!! reviewStar($testimonial->star) !!}
                                        </div>
                                        <div class="testimonial-bottom-line"></div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Testimonial Item End -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Customer Testimonial Area End -->

    <!-- FAQ Area Start -->
    @if (getOption('home_faq_section_status', 1) == ACTIVE)
        <section id="faqs" class="faqs-area section-t-small-space section-b-small-space position-relative">
            <img src="{{ asset('frontend/assets/img/faq-bg.webp') }}"
                class="faq-floating-bg-img theme-common-floating-bg-img position-absolute img-fluid">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">{{ getOption('home_faq_section_title') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="faq-content-box faq-left-part">
                            <!-- Accordion Start -->
                            <div class="accordion" id="accordionExample1">
                                @php
                                    $i = 1;
                                    $take = count($faqs);
                                @endphp
                                @foreach ($faqs->take($take / 2) as $faq)
                                    <div class="accordion-item">
                                        <h5 class="accordion-header" id="headingOne{{ $i }}">
                                            <button class="accordion-button font-medium {{ $i == 1 ? '' : 'collapsed' }}"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne{{ $i }}"
                                                aria-expanded="{{ $i == 1 ? true : false }}"
                                                aria-controls="collapseOne{{ $i }}">
                                                {{ $i }}. {{ $faq->question }}
                                            </button>
                                        </h5>
                                        <div id="collapseOne{{ $i }}"
                                            class="accordion-collapse collapse {{ $i == 1 ? 'show' : '' }}"
                                            aria-labelledby="headingOne{{ $i }}"
                                            data-bs-parent="#accordionExample1">
                                            <div class="accordion-body">
                                                {{ $faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                            </div>
                            <!-- Accordion End -->
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="faq-content-box faq-right-part">
                            <!-- Accordion Start -->
                            <div class="accordion" id="accordionExample2">
                                @foreach ($faqs->skip($take / 2)->take($take / 2) as $faq)
                                    <div class="accordion-item">
                                        <h5 class="accordion-header" id="headingSix">
                                            <button class="accordion-button font-medium collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo{{ $i }}" aria-expanded="false"
                                                aria-controls="collapseTwo{{ $i }}">
                                                {{ $i }}. {{ $faq->question }}
                                            </button>
                                        </h5>
                                        <div id="collapseTwo{{ $i }}" class="accordion-collapse collapse"
                                            aria-labelledby="headingSix" data-bs-parent="#accordionExample2">
                                            <div class="accordion-body">
                                                {{ $faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                            </div>
                            <!-- Accordion End -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- FAQ Area End -->
@endsection

@push('script')
    <!-- Standalon Js Script Start -->

    <!--Typewrite Script Start-->
    <script src="{{ asset('frontend/assets/js/typed.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/page-js/type-write-script.js') }}"></script>
    <!--Typewrite Script End-->

    <!-- Standalon Js Script End -->

    <script src="{{ asset('frontend/assets/js/custom/frontend.js') }}"></script>
@endpush
