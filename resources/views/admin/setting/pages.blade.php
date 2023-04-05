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
                                    <li class="breadcrumb-item"><a href="#" title="{{ __('Settings') }}">{{
                                            __('Settings') }}</a></li>
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
                                                <div class="col-md-6">
                                                    <div class="property-details-right text-end">
                                                        <button type="button" class="theme-btn" id="add"
                                                            title="{{ __('Add Faq') }}">{{ __('Add Faq') }}</button>
                                                    </div>
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
                                                            <th class="all">{{ __('Title') }}</th>
                                                            <th class="all">{{ __('Content') }}</th>
                                                            <th class="desktop">{{ __('Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ 1 }}</td>
                                                            <td>{{ __('Privacy Policy') }}</td>
                                                            <td>{{ Str::limit($privacyPolicy->option_value, 50, '...') }}</td>
                                                            <td>
                                                                <div class="tbl-action-btns d-inline-flex">
                                                                    <a class="p-1 tbl-action-btn edit"
                                                                        data-item="{{ $privacyPolicy}}" title="{{ __('Edit') }}">
                                                                        <span class="iconify"
                                                                            data-icon="clarity:note-edit-solid"></span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ 2 }}</td>
                                                            <td>{{ __('Terms & Conditions') }}</td>
                                                            <td>{{ Str::limit($termsAndCondition->option_value, 50, '...') }}</td>
                                                            <td>
                                                                <div class="tbl-action-btns d-inline-flex">
                                                                    <a class="p-1 tbl-action-btn edit"
                                                                        data-item="{{ $termsAndCondition }}" title="{{ __('Edit') }}">
                                                                        <span class="iconify"
                                                                            data-icon="clarity:note-edit-solid"></span>
                                                                    </a>
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

<div class="modal fade" id="editPageModal" tabindex="-1" aria-labelledby="editPageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editPageModalLabel">{{ __('Edit Page') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="iconify"
                        data-icon="akar-icons:cross"></span></button>
            </div>
            <form class="ajax" action="{{ route('admin.setting.general-setting.update') }}" method="POST"
                data-handler="getShowMessage">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="modal-inner-form-box">
                        <div class="row">
                            <div class="col-md-12 mb-25">
                                <label class="label-text-title color-heading font-medium mb-2">{{ __('Question')
                                    }}</label>
                                <input type="text" name="question" class="form-control"
                                    placeholder="{{ __('Question') }}">
                            </div>
                            <div class="col-md-12 mb-25">
                                <input type="hidden" name="type" value="privacy_policy">
                                <label class="label-text-title color-heading font-medium mb-2">{{ __('Content')
                                    }}</label>
                                <textarea name="content" class="form-control"
                                    placeholder="{{ __('content') }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-start">
                    <button type="button" class="theme-btn-back me-3" data-bs-dismiss="modal"
                        title="{{ __('Back') }}">{{ __('Back') }}</button>
                    <button type="submit" class="theme-btn me-3" title="{{ __('Update') }}">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('style')
@include('admin.layouts.datatable-style')
@endpush

@push('script')
@include('admin.layouts.datatable-script')
<script src="{{ asset('backend/assets/js/pages/alldatatables.init.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/pages.js') }}"></script>
@endpush