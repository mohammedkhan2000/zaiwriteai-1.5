@extends('admin.layouts.app')

@push('style')
    <!-- Color Picker CSS -->
    <link href="{{ asset('backend/assets/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Right Content Start -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page Content Wrapper Start -->
                <div class="page-content-wrapper bg-white p-30 radius-20">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between border-bottom mb-20">
                                <div class="page-title-left">
                                    <h3 class="mb-sm-0">{{ __('Setting') }}</h3>
                                </div>

                                <div class="page-title-right">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                                title="Dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" title="Settings">Settings</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Color Setting</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Settings Page Layout Wrap Area row Start -->
                    <div class="settings-page-layout-wrap position-relative">
                        <div class="row">
                            <!-- Account settings Left Side Start-->
                            @include('admin.setting.sidebar')
                            <!-- Account settings Left Side End-->
                            <!-- Account settings Area Right Side Start-->
                            <div class="col-md-12 col-lg-12 col-xl-8 col-xxl-9">
                                <div class="account-settings-rightside bg-off-white theme-border radius-4 p-25">
                                    <!-- Color Settings Page Start -->
                                    <div class="color-settings-page-area">
                                        <!-- Account Settings Content Box Start -->
                                        <div class="account-settings-content-box">
                                            <div class="account-settings-title border-bottom mb-20 pb-20">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <h4>{{ __('Color Setting') }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Settings Page inner form area start -->
                                            <form action="{{ route('admin.setting.general-setting.update') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <!-- Settings Inner Box -->
                                                <div class="settings-inner-box bg-white theme-border radius-4 mb-25">
                                                    <div
                                                        class="select-property-box bg-white theme-border radius-4 p-20 mb-25">
                                                        <h6 class="mb-15">{{ __('Design') }}</h6>

                                                        <ul class="nav nav-tabs select-property-nav-tabs border-0"
                                                            id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="p-0 me-4 mb-1 nav-link {{ getOption('website_color_mode', 0) == 0 ? 'active' : '' }} "
                                                                    id="own-property-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#own-property-tab-pane" type="button"
                                                                    role="tab" aria-controls="own-property-tab-pane"
                                                                    aria-selected="true">
                                                                    <span
                                                                        class="select-property-nav-text d-flex align-items-center position-relative">
                                                                        <span
                                                                            class="select-property-nav-text-box me-2"></span>{{ __('Default') }}
                                                                    </span>
                                                                </button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    class="p-0 me-4 mb-1 nav-link {{ getOption('website_color_mode') == 1 ? 'active' : '' }} "
                                                                    id="lease-property-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#lease-property-tab-pane" type="button"
                                                                    role="tab" aria-controls="lease-property-tab-pane"
                                                                    aria-selected="false">
                                                                    <span
                                                                        class="select-property-nav-text d-flex align-items-center position-relative">
                                                                        <span
                                                                            class="select-property-nav-text-box me-2"></span>{{ __('Custom') }}
                                                                    </span>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="settings-inner-box-fields color-settings-fields-wrap p-20 pb-0">
                                                        <div id="colorpickerbody" class="row">
                                                            <div class="col-md-6 col-xl-6 col-xxl-4 mb-25">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Website Primary Color') }}</label>
                                                                <input type="text" id="colorpicker1"
                                                                    name="website_primary_color"
                                                                    value="{{ getOption('website_primary_color') }}">
                                                            </div>
                                                            <div class="col-md-6 col-xl-6 col-xxl-4 mb-25">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Website Secondary Color') }}</label>
                                                                <input type="text" id="colorpicker2"
                                                                    name="website_secondary_color"
                                                                    value="{{ getOption('website_secondary_color') }}">
                                                            </div>
                                                            <div class="col-md-6 col-xl-6 col-xxl-4 mb-25">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Button Primary Color') }}</label>
                                                                <input type="text" id="colorpicker3"
                                                                    name="button_primary_color"
                                                                    value="{{ getOption('button_primary_color') }}">
                                                            </div>
                                                            <div class="col-md-6 col-xl-6 col-xxl-4 mb-25">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Button Hover Color') }}</label>
                                                                <input type="text" id="colorpicker4"
                                                                    name="button_hover_color"
                                                                    value="{{ getOption('button_hover_color') }}">
                                                            </div>
                                                            <input type="hidden" id="websiteColorMode"
                                                                name="website_color_mode"
                                                                value="{{ getOption('website_color_mode') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="theme-btn" title="Update">{{ __('Update') }}</button>
                                            </form>
                                            <!-- Settings Page inner form area end -->
                                        </div>
                                        <!-- Account Settings Content Box End -->
                                    </div>
                                    <!-- Color Settings Page End -->
                                </div>
                            </div>
                            <!-- Account settings Area Right Side End-->
                        </div>
                    </div>
                    <!-- Settings Page Layout Wrap Area row End -->
                </div>
                <!-- Page Content Wrapper End -->
            </div>
        </div>
        <!-- End Page-content -->
    </div>
    <!-- Right Content End -->
@endsection

@push('script')
    <!-- Color Picker JavaScript -->
    <script src="{{ asset('backend/assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/color-picker.init.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom/colorsetting.js') }}"></script>
@endpush