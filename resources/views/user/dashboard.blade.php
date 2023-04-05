@extends('user.layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper bg-light p-30 radius-10">

                    @include('user.layouts.header-plan-message')

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <div class="page-title-left">
                                    <h2 class="mb-sm-0">{{ __('Dashboard') }}</h2>
                                    <p>{{ __('Welcome back') }}, {{ auth()->user()->name }} <span class="iconify font-24"
                                            data-icon="openmoji:waving-hand"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="topic-content-item-wrap row">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-4 mb-25">
                                    <div class="topic-content-item d-block bg-white theme-border radius-12 p-20">
                                        <div
                                            class="topic-content-item-btns d-flex align-content-center justify-content-between">
                                            <div
                                                class="topic-content-item-icon status-btn-orange d-inline-flex align-items-center justify-content-center radius-50">
                                                <span class="iconify" data-icon="ic:outline-image-search"></span>
                                            </div>
                                            <div>
                                                <h4 class="">{{ __('Total Document') }}</h4>
                                                <p class="font-12 mt-2">{{ $totalSearchResult }} {{ __('Times') }}</p>
                                                <p class="mt-2"><br></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-4 mb-25">
                                    <div class="topic-content-item d-block bg-white theme-border radius-12 p-20">
                                        <div
                                            class="topic-content-item-btns d-flex align-content-center justify-content-between">
                                            <div
                                                class="topic-content-item-icon status-btn-green d-inline-flex align-items-center justify-content-center radius-50">
                                                <span class="iconify" data-icon="ri:character-recognition-line"></span>
                                            </div>
                                            <div>
                                                <h4 class="">{{ __('Remaining Character') }}</h4>
                                                <p class="font-12 mt-2">
                                                    @if (!is_null($userPlan))
                                                        @if ($userPlan->end_date >= now())
                                                            {{ $totalRemainingCharacter }} /
                                                            {{ $userPlan->generate_characters }} {{ 'characters' }}
                                                        @else
                                                            0 {{ 'characters' }}
                                                        @endif
                                                    @else
                                                        0 {{ 'characters' }}
                                                    @endif
                                                </p>
                                                <p class="mt-2"><br></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-4 mb-25">
                                    <div class="topic-content-item d-block bg-white theme-border radius-12 p-20">
                                        <div
                                            class="topic-content-item-btns d-flex align-content-center justify-content-between">
                                            <div
                                                class="topic-content-item-icon status-btn-blue d-inline-flex align-items-center justify-content-center radius-50">
                                                <span class="iconify" data-icon="lucide:calendar-days"></span>
                                            </div>
                                            <div>
                                                <h4 class="">{{ __('Plan Remaining') }}</h4>
                                                <p class="font-12 mt-2">{{ $planRemainingDays }}
                                                    {{ __('Days Remaining') }}</p>
                                                <p class="font-12 mt-2">{{ __('End Date') }} :
                                                    @if (!is_null($userPlan))
                                                        {{ date('d-m-Y', strtotime($userPlan->end_date)) }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="bg-off-white radius-4 mb-25 theme-border p-20 w-100">
                                <div class="bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h4 class="mb-0">{{ __('Monthly Documents Overview') }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        const CURRENT_MONTH_DAYS = @json($currentMonthDays);
        const DOCUMENT_MONTHLY_RESULT = @json($documentMonthlyResult);
    </script>
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/index-charts.js') }}"></script>
@endpush
