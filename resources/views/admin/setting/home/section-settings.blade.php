@extends('admin.layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper bg-white p-30 radius-20">
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between border-bottom mb-20">
                                <div class="page-title-left">
                                    <h3 class="mb-sm-0">{{ $pageTitle }}</h3>
                                </div>
                                <div class="page-title-right">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                                title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="settings-page-layout-wrap position-relative">
                        <div class="row">
                            @include('admin.setting.sidebar')
                            <div class="col-md-12 col-lg-12 col-xl-8 col-xxl-9">
                                <div class="account-settings-rightside bg-off-white theme-border radius-4 p-25">
                                    <div class="currency-settings-page-area">
                                        <div class="account-settings-content-box">
                                            <div class="account-settings-title border-bottom mb-20 pb-20">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <h4>{{ $pageTitle }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tickets-topic-table-area">
                                                <div class="table-responsive bg-white theme-border radius-4 p-25">
                                                    <table id="allDataTable"
                                                        class="table bg-white theme-border p-20 dt-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="desktop">{{ __('SL') }}</th>
                                                                <th class="all">{{ __('Name') }}</th>
                                                                <th class="all">{{ __('Status') }}</th>
                                                                <th class="desktop">{{ __('Action') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="row-item">
                                                                <td>{{ __('1') }}</td>
                                                                <td>Hero Section</td>
                                                                <td>
                                                                    @if (getOption('home_hero_section_status', 1) == ACTIVE)
                                                                        <div
                                                                            class="status-btn status-btn-green font-13 radius-4">
                                                                            {{ __('Active') }}</div>
                                                                    @else
                                                                        <div
                                                                            class="status-btn status-btn-red font-13 radius-4">
                                                                            {{ __('Deactive') }}</div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="tbl-action-btns d-inline-flex">
                                                                        <button type="button" class="p-1 tbl-action-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editHeroModal">
                                                                            <span class="iconify"
                                                                                data-icon="clarity:note-edit-solid"></span>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="row-item">
                                                                <td>{{ __('2') }}</td>
                                                                <td>Brand Section</td>
                                                                <td>
                                                                    @if (getOption('home_brand_section_status', 1) == ACTIVE)
                                                                        <div
                                                                            class="status-btn status-btn-green font-13 radius-4">
                                                                            {{ __('Active') }}</div>
                                                                    @else
                                                                        <div
                                                                            class="status-btn status-btn-red font-13 radius-4">
                                                                            {{ __('Deactive') }}</div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="tbl-action-btns d-inline-flex">
                                                                        <button type="button" class="p-1 tbl-action-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editBrandModal">
                                                                            <span class="iconify"
                                                                                data-icon="clarity:note-edit-solid"></span>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="row-item">
                                                                <td>{{ __('3') }}</td>
                                                                <td>Generate Content Section</td>
                                                                <td>
                                                                    @if (getOption('home_generate_content_section_status', 1) == ACTIVE)
                                                                        <div
                                                                            class="status-btn status-btn-green font-13 radius-4">
                                                                            {{ __('Active') }}</div>
                                                                    @else
                                                                        <div
                                                                            class="status-btn status-btn-red font-13 radius-4">
                                                                            {{ __('Deactive') }}</div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="tbl-action-btns d-inline-flex">
                                                                        <button type="button" class="p-1 tbl-action-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editGenerateContentModal">
                                                                            <span class="iconify"
                                                                                data-icon="clarity:note-edit-solid"></span>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="row-item">
                                                                <td>{{ __('4') }}</td>
                                                                <td>How it Works Section</td>
                                                                <td>
                                                                    @if (getOption('home_how_it_word_section_status', 1) == ACTIVE)
                                                                        <div
                                                                            class="status-btn status-btn-green font-13 radius-4">
                                                                            {{ __('Active') }}</div>
                                                                    @else
                                                                        <div
                                                                            class="status-btn status-btn-red font-13 radius-4">
                                                                            {{ __('Deactive') }}</div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="tbl-action-btns d-inline-flex">
                                                                        <button type="button" class="p-1 tbl-action-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editHowItWorkModal">
                                                                            <span class="iconify"
                                                                                data-icon="clarity:note-edit-solid"></span>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="row-item">
                                                                <td>{{ __('5') }}</td>
                                                                <td>Pricing Section</td>
                                                                <td>
                                                                    @if (getOption('home_pricing_section_status', 1) == ACTIVE)
                                                                        <div
                                                                            class="status-btn status-btn-green font-13 radius-4">
                                                                            {{ __('Active') }}</div>
                                                                    @else
                                                                        <div
                                                                            class="status-btn status-btn-red font-13 radius-4">
                                                                            {{ __('Deactive') }}</div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="tbl-action-btns d-inline-flex">
                                                                        <button type="button" class="p-1 tbl-action-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editPriceModal">
                                                                            <span class="iconify"
                                                                                data-icon="clarity:note-edit-solid"></span>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="row-item">
                                                                <td>{{ __('6') }}</td>
                                                                <td>Testimonial Section</td>
                                                                <td>
                                                                    @if (getOption('home_testimonial_section_status', 1) == ACTIVE)
                                                                        <div
                                                                            class="status-btn status-btn-green font-13 radius-4">
                                                                            {{ __('Active') }}</div>
                                                                    @else
                                                                        <div
                                                                            class="status-btn status-btn-red font-13 radius-4">
                                                                            {{ __('Deactive') }}</div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="tbl-action-btns d-inline-flex">
                                                                        <button type="button" class="p-1 tbl-action-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editTestimonialModal">
                                                                            <span class="iconify"
                                                                                data-icon="clarity:note-edit-solid"></span>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="row-item">
                                                                <td>{{ __('7') }}</td>
                                                                <td>Faq Section</td>
                                                                <td>
                                                                    @if (getOption('home_faq_area', 1) == ACTIVE)
                                                                        <div
                                                                            class="status-btn status-btn-green font-13 radius-4">
                                                                            {{ __('Active') }}</div>
                                                                    @else
                                                                        <div
                                                                            class="status-btn status-btn-red font-13 radius-4">
                                                                            {{ __('Deactive') }}</div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="tbl-action-btns d-inline-flex">
                                                                        <button type="button" class="p-1 tbl-action-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editFaqModal">
                                                                            <span class="iconify"
                                                                                data-icon="clarity:note-edit-solid"></span>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editHeroModal" tabindex="-1" aria-labelledby="editHeroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editHeroModalLabel">{{ __('Hero Area') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="iconify" data-icon="akar-icons:cross"></span>
                    </button>
                </div>
                <form action="{{ route('admin.setting.general-setting.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title One') }}</label>
                                    <input type="text" name="home_hero_title_one" class="form-control"
                                        value="{{ getOption('home_hero_title_one') }}">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title Two') }}</label>
                                    <input type="text" name="home_hero_title_two" class="form-control"
                                        value="{{ getOption('home_hero_title_two') }}">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title Slider') }}</label>
                                    <input type="text" name="home_hero_title_slider" class="form-control"
                                        value="{{ getOption('home_hero_title_slider') }}">
                                    <small class="text-primary">{{ __('Separet by comma') }} (,)</small>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title Summary') }}</label>
                                    <textarea name="home_hero_title_summery" id="home_hero_title_summery" class="form-control">{{ getOption('home_hero_title_summery') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Image') }}</label>
                                    <input type="file" class="form-control" name="home_hero_area_image">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="home_hero_section_status" class="form-control">
                                        <option value="1"
                                            {{ getOption('home_hero_section_status', 1) == 1 ? 'selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="0"
                                            {{ getOption('home_hero_section_status', 1) == 0 ? 'selected' : '' }}>
                                            {{ __('Deactive') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-start">
                        <button type="button" class="theme-btn-back me-3" data-bs-dismiss="modal"
                            title="{{ __('Back') }}">{{ __('Back') }}</button>
                        <button type="submit" class="theme-btn me-3"
                            title="{{ __('Update') }}">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editBrandModalLabel">{{ __('Brand Section') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="iconify" data-icon="akar-icons:cross"></span>
                    </button>
                </div>
                <form action="{{ route('admin.setting.general-setting.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title') }}</label>
                                    <input type="text" name="home_brand_section_title"
                                        value="{{ getOption('home_brand_section_title') }}" class="form-control">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="home_brand_section_status" id="status" class="form-control">
                                        <option value="1"
                                            {{ getOption('home_brand_section_status', 1) == 1 ? 'selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="0"
                                            {{ getOption('home_brand_section_status', 1) == 0 ? 'selected' : '' }}>
                                            {{ __('Deactive') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-start">
                        <button type="button" class="theme-btn-back me-3" data-bs-dismiss="modal"
                            title="{{ __('Back') }}">{{ __('Back') }}</button>
                        <button type="submit" class="theme-btn me-3"
                            title="{{ __('Update') }}">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editGenerateContentModal" tabindex="-1" aria-labelledby="editGenerateContentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editGenerateContentModalLabel">Generate Content Section</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="iconify" data-icon="akar-icons:cross"></span>
                    </button>
                </div>
                <form action="{{ route('admin.setting.general-setting.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title') }}</label>
                                    <input type="text" name="home_generate_content_section_title" class="form-control"
                                        value="{{ getOption('home_generate_content_section_title') }}">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Summary') }}</label>
                                    <textarea name="home_generate_content_section_summery" class="form-control">{{ getOption('home_generate_content_section_summery') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Category') }}</label>
                                    <div class="my-custom-select-box">
                                        <select name="home_generate_content_section_category[]"
                                            class="my-custom-select form-select selectpicker w-100" multiple>
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}"
                                                    {{ in_array($subCategory->id, json_decode(getOption('home_generate_content_section_category',"[]"))) ? 'selected' : '' }}>
                                                    {{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Image') }}</label>
                                    <input type="file" class="form-control"
                                        name="home_generate_content_section_image">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="home_generate_content_section_status" class="form-control">
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="0">{{ __('Deactive') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-start">
                        <button type="button" class="theme-btn-back me-3" data-bs-dismiss="modal"
                            title="{{ __('Back') }}">{{ __('Back') }}</button>
                        <button type="submit" class="theme-btn me-3"
                            title="{{ __('Update') }}">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editHowItWorkModal" tabindex="-1" aria-labelledby="editHowItWorkModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editHowItWorkModalLabel">How It Work Section</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="iconify" data-icon="akar-icons:cross"></span>
                    </button>
                </div>
                <form action="{{ route('admin.setting.general-setting.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title') }}</label>
                                    <input type="text" name="home_how_it_word_section_title" class="form-control"
                                        value="{{ getOption('home_how_it_word_section_title') }}">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Summary') }}</label>
                                    <textarea name="home_how_it_word_section_summery" class="form-control">{{ getOption('home_how_it_word_section_summery') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="home_how_it_word_section_status" class="form-control">
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="0">{{ __('Deactive') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-start">
                        <button type="button" class="theme-btn-back me-3" data-bs-dismiss="modal"
                            title="{{ __('Back') }}">{{ __('Back') }}</button>
                        <button type="submit" class="theme-btn me-3"
                            title="{{ __('Update') }}">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPriceModal" tabindex="-1" aria-labelledby="editPriceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editPriceModalLabel">{{ __('Price Section') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="iconify" data-icon="akar-icons:cross"></span>
                    </button>
                </div>
                <form action="{{ route('admin.setting.general-setting.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title First') }}</label>
                                    <input type="text" name="home_price_section_title_first" class="form-control"
                                        value="{{ getOption('home_price_section_title_first') }}">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title Color') }}</label>
                                    <input type="text" name="home_price_section_title_color" class="form-control"
                                        value="{{ getOption('home_price_section_title_color') }}">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title Last') }}</label>
                                    <input type="text" name="home_price_section_title_last" class="form-control"
                                        value="{{ getOption('home_price_section_title_last') }}">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title Summary') }}</label>
                                    <textarea name="home_price_section_summery" id="home_price_section_summery" class="form-control">{{ getOption('home_price_section_summery') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="home_pricing_section_status" class="form-control">
                                        <option value="1"
                                            {{ getOption('home_pricing_section_status', 1) == 1 ? 'selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="0"
                                            {{ getOption('home_pricing_section_status', 1) == 0 ? 'selected' : '' }}>
                                            {{ __('Deactive') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-start">
                        <button type="button" class="theme-btn-back me-3" data-bs-dismiss="modal"
                            title="{{ __('Back') }}">{{ __('Back') }}</button>
                        <button type="submit" class="theme-btn me-3"
                            title="{{ __('Update') }}">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editTestimonialModal" tabindex="-1" aria-labelledby="editTestimonialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editTestimonialModalLabel">{{ __('Testimonial Section') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="iconify" data-icon="akar-icons:cross"></span>
                    </button>
                </div>
                <form action="{{ route('admin.setting.general-setting.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title') }}</label>
                                    <input type="text" name="home_testimonial_section_title"
                                        value="{{ getOption('home_testimonial_section_title') }}" class="form-control">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="home_testimonial_section_status" id="status" class="form-control">
                                        <option value="1"
                                            {{ getOption('home_testimonial_section_status', 1) == 1 ? 'selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="0"
                                            {{ getOption('home_testimonial_section_status', 1) == 0 ? 'selected' : '' }}>
                                            {{ __('Deactive') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-start">
                        <button type="button" class="theme-btn-back me-3" data-bs-dismiss="modal"
                            title="{{ __('Back') }}">{{ __('Back') }}</button>
                        <button type="submit" class="theme-btn me-3"
                            title="{{ __('Update') }}">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editFaqModal" tabindex="-1" aria-labelledby="editFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editFaqModalLabel">{{ __('Testimonial Section') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="iconify" data-icon="akar-icons:cross"></span>
                    </button>
                </div>
                <form action="{{ route('admin.setting.general-setting.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Title') }}</label>
                                    <input type="text" name="home_faq_section_title"
                                        value="{{ getOption('home_faq_section_title') }}" class="form-control">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="home_faq_section_status" id="status" class="form-control">
                                        <option value="1"
                                            {{ getOption('home_faq_section_status', 1) == 1 ? 'selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="0"
                                            {{ getOption('home_faq_section_status', 1) == 0 ? 'selected' : '' }}>
                                            {{ __('Deactive') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-start">
                        <button type="button" class="theme-btn-back me-3" data-bs-dismiss="modal"
                            title="{{ __('Back') }}">{{ __('Back') }}</button>
                        <button type="submit" class="theme-btn me-3"
                            title="{{ __('Update') }}">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
