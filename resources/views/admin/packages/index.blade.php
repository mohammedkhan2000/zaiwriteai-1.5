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
                    <div class="row">
                        <div class="property-top-search-bar">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="property-top-search-bar-right text-end">
                                        <button type="button" class="theme-btn mb-25" id="add"
                                            title="{{ __('Add Package') }}">{{ __('Add Package') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="billing-center-area bg-off-white theme-border radius-4 p-25">
                            <table id="allDataTable" class="table responsive theme-border p-20 ">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Package Modal Start -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel"><span class="modalTitle">{{ __('Add Package') }}</span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            class="iconify" data-icon="akar-icons:cross"></span></button>
                </div>
                <form class="ajax" action="{{ route('admin.packages.store') }}" method="post"
                    enctype="multipart/form-data" data-handler="getShowMessage">
                    <div class="modal-body">
                        <div class="modal-inner-form-box border-bottom mb-25">
                            <div class="row">
                                <div class="col-md-6 mb-25">
                                    <label class="label-text-title color-heading font-medium mb-2">{{ __('Name') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('Name') }}">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Generate Characters') }}</label>
                                    <input type="number" name="generate_characters" class="form-control"
                                        placeholder="1000">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Access Use Cases') }}</label>
                                    <div class="my-custom-select-box">
                                        <select name="access_use_cases[]" data-selected-text-format="count" multiple
                                            class="my-custom-select form-select selectpicker w-100 access_use_cases">
                                            <option value="-1">{{ __('All') }}</option>
                                            @foreach ($useCases as $useCase)
                                                <option value="{{ $useCase->id }}">{{ $useCase->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Write Languages') }}</label>
                                    <input type="number" name="write_languages" class="form-control" placeholder="10">
                                </div> --}}
                                {{-- <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Access Tones') }}</label>
                                    <input type="number" name="access_tones" class="form-control" placeholder="10">
                                </div> --}}
                                <div class="col-md-6 mb-25 d-none">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Generate Images') }}</label>
                                    <input type="number" name="generate_images" class="form-control" value="0"
                                        placeholder="10">
                                </div>
                                <div class="col-md-6 mb-25 d-none">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Plagiarism Checker') }}</label>
                                    <input type="text" name="plagiarism_checker" class="form-control"
                                        placeholder="{{ __('Plagiarism Checker') }}">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Access Community') }}</label>
                                    <input type="text" name="access_community" class="form-control"
                                        placeholder="{{ __('Access Community') }}">
                                </div>
                                <div class="col-md-6 mb-25 d-none">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Custom Use Cases') }}</label>
                                    <input type="text" name="custom_use_cases" class="form-control"
                                        placeholder="{{ __('Custom Use Cases') }}">
                                </div>
                                <div class="col-md-6 mb-25 d-none">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Dedicated Account') }}</label>
                                    <input type="text" name="dedicated_account" class="form-control"
                                        placeholder="{{ __('Dedicated Account') }}">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Support') }}</label>
                                    <input type="text" name="support" class="form-control"
                                        placeholder="{{ __('Support') }}">
                                </div>
                                <div class="col-md-6 mb-25 d-none">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Device Limit') }}</label>
                                    <input type="number" name="device_limit" value="1" class="form-control"
                                        placeholder="{{ __('Device Limit') }}">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="0">{{ __('Deactivate') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Is Trail') }}</label>
                                    <select name="is_trail" id="is_trail" class="form-control">
                                        <option value="0">{{ __('Deactivate') }}</option>
                                        <option value="1">{{ __('Active') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Monthly Price') }}
                                        <span class="text-danger">*</span></label>
                                    <input type="number" step="any" name="monthly_price" class="form-control"
                                        placeholder="10">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Yearly Price') }}
                                        <span class="text-danger">*</span></label>
                                    <input type="number" step="any" name="yearly_price" class="form-control"
                                        placeholder="10">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <a href="javascript:void(0)" class="theme-btn-back me-3" data-bs-dismiss="modal"
                            title="{{ __('Back') }}">{{ __('Back') }}</a>
                        <button type="submit" class="theme-btn me-3"
                            title="{{ __('Add Package') }}">{{ __('Add Package') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel"><span class="modalTitle">{{ __('Add Package') }}</span>
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            class="iconify" data-icon="akar-icons:cross"></span></button>
                </div>
                <form class="ajax" action="{{ route('admin.packages.store') }}" method="post"
                    enctype="multipart/form-data" data-handler="getShowMessage">
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="modal-inner-form-box border-bottom mb-25">
                            <div class="row">
                                <div class="col-md-6 mb-25">
                                    <label class="label-text-title color-heading font-medium mb-2">{{ __('Name') }}
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('Name') }}">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Generate Characters') }}</label>
                                    <input type="number" name="generate_characters" class="form-control"
                                        placeholder="10">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Access Use Cases') }}</label>
                                    <div class="my-custom-select-box">
                                        <select name="access_use_cases[]" data-selected-text-format="count"
                                            id="access_use_cases" multiple
                                            class="my-custom-select form-select selectpicker w-100 access_use_cases">
                                            <option value="-1">{{ __('All') }}</option>
                                            @foreach ($useCases as $useCase)
                                                <option value="{{ $useCase->id }}">{{ $useCase->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Write Languages') }}</label>
                                    <input type="number" name="write_languages" class="form-control" placeholder="10">
                                </div> --}}
                                {{-- <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Access Tones') }}</label>
                                    <input type="number" name="access_tones" class="form-control" placeholder="10">
                                </div> --}}
                                <div class="col-md-6 mb-25 d-none">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Generate Images') }}</label>
                                    <input type="number" name="generate_images" class="form-control" placeholder="10">
                                </div>
                                <div class="col-md-6 mb-25 d-none">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Plagiarism Checker') }}</label>
                                    <input type="text" name="plagiarism_checker" class="form-control"
                                        placeholder="{{ __('Plagiarism Checker') }}">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Access Community') }}</label>
                                    <input type="text" name="access_community" class="form-control"
                                        placeholder="{{ __('Access Community') }}">
                                </div>
                                <div class="col-md-6 mb-25 d-none">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Custom Use Cases') }}</label>
                                    <input type="text" name="custom_use_cases" class="form-control"
                                        placeholder="{{ __('Custom Use Cases') }}">
                                </div>
                                <div class="col-md-6 mb-25 d-none">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Dedicated Account') }}</label>
                                    <input type="text" name="dedicated_account" class="form-control"
                                        placeholder="{{ __('Dedicated Account') }}">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Support') }}</label>
                                    <input type="text" name="support" class="form-control"
                                        placeholder="{{ __('Support') }}">
                                </div>
                                <div class="col-md-6 mb-25 d-none">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Device Limit') }}</label>
                                    <input type="number" name="device_limit" value="1" class="form-control"
                                        placeholder="{{ __('Device Limit') }}">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="0">{{ __('Deactivate') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Is Trail') }}</label>
                                    <select name="is_trail" id="is_trail" class="form-control">
                                        <option value="0">{{ __('Deactivate') }}</option>
                                        <option value="1">{{ __('Active') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Monthly Price') }}
                                        <span class="text-danger">*</span></label>
                                    <input type="number" step="any" name="monthly_price" class="form-control"
                                        placeholder="10">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Yearly Price') }}
                                        <span class="text-danger">*</span></label>
                                    <input type="number" step="any" name="yearly_price" class="form-control"
                                        placeholder="10">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <a href="javascript:void(0)" class="theme-btn-back me-3" data-bs-dismiss="modal"
                            title="{{ __('Back') }}">{{ __('Back') }}</a>
                        <button type="submit" class="theme-btn me-3"
                            title="{{ __('Update') }}">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <input type="hidden" id="packageIndexRoute" value="{{ route('admin.packages.index') }}">
    <input type="hidden" id="packageInfoRoute" value="{{ route('admin.packages.get.info') }}">
@endsection

@push('style')
    @include('admin.layouts.datatable-style')
@endpush

@push('script')
    @include('admin.layouts.datatable-script')

    <script src="{{ asset('backend/assets/js/custom/package.js') }}"></script>
@endpush
