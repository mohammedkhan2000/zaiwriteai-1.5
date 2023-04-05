@extends('frontend.layouts.app')
@push('title')
    {{ __('Contact Us') }} -
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
                        <h2 class="text-white mb-2">{{ __('Contact Us') }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Contact Us') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner Area End -->

    <!-- Inner Page Details Area Start -->
    <section class="inner-page-details contact-us-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">
                    <div class="inner-page-content contact-us-page-content bg-white theme-border radius-15">
                        <form action="{{ route('contact.us.store') }}" method="POST" class="contact-page-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-30">
                                    <label
                                        class="label-text-title color-heading font-semi-bold mb-15">{{ __('Your Name') }}</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('Your Name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-30">
                                    <label
                                        class="label-text-title color-heading font-semi-bold mb-15">{{ __('Your Email') }}</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="{{ __('Your Email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-30">
                                    <label
                                        class="label-text-title color-heading font-semi-bold mb-15">{{ __('Subject') }}</label>
                                    <input type="text" name="subject" class="form-control"
                                        placeholder="{{ __('Subject') }}">
                                    @error('subject')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-30">
                                    <label
                                        class="label-text-title color-heading font-semi-bold mb-15">{{ __('Phone Number') }}</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="{{ __('Phone Number') }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-30">
                                    <label
                                        class="label-text-title color-heading font-semi-bold mb-15">{{ __('Message') }}</label>
                                    <textarea name="message" cols="30" rows="5" class="form-control" placeholder="{{ __('Message') }}"></textarea>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="theme-btn">{{ __('Send Message') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Page Details Area End -->

    @if (getOption('home_faq_section_status', 1) == ACTIVE)
        <section id="faqs" class="faqs-area section-t-space section-b-small-space position-relative">
            <img src="{{ asset('frontend/assets/img/faq-bg.webp" alt="footer-bg') }}"
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
                                @php $i = 1; @endphp
                                @foreach ($faqs->take(5) as $faq)
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
                                @foreach ($faqs->skip(5)->take(5) as $faq)
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
@endsection
