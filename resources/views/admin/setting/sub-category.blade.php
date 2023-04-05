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
                            <div class="col-md-12">
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
                                                                title="{{ __('Add Sub Category') }}">{{ __('Add Sub Category') }}</button>
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
                                                                <th class="all">{{ __('Name') }}</th>
                                                                <th class="all">{{ __('Image') }}</th>
                                                                <th class="all">{{ __('Category') }}</th>
                                                                <th class="all">{{ __('Status') }}</th>
                                                                <th class="desktop">{{ __('Action') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($subCategories as $subCategory)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $subCategory->name }}</td>
                                                                    <td>
                                                                        <img src="{{ $subCategory->image }}"
                                                                            class="rounded avatar-md tbl-user-image"
                                                                            alt="">
                                                                    </td>
                                                                    <td>{{ $subCategory->category?->name }}</td>
                                                                    <td>
                                                                        @if ($subCategory->status == ACTIVE)
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
                                                                            <a class="p-1 tbl-action-btn edit"
                                                                                data-id="{{ $subCategory->id }}"
                                                                                title="{{ __('Edit') }}">
                                                                                <span class="iconify"
                                                                                    data-icon="clarity:note-edit-solid"></span>
                                                                            </a>
                                                                            <a href="#"
                                                                                class="p-1 tbl-action-btn deleteItem"
                                                                                data-formid="delete_row_form_{{ $subCategory->id }}"
                                                                                title="Delete"><span class="iconify"
                                                                                    data-icon="ep:delete-filled"></span></a>
                                                                            <form
                                                                                action="{{ route('admin.sub-category.destroy', [$subCategory->id]) }}"
                                                                                method="post"
                                                                                id="delete_row_form_{{ $subCategory->id }}">
                                                                                {{ method_field('DELETE') }}
                                                                                <input type="hidden" name="_token"
                                                                                    value="{{ csrf_token() }}">
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
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

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel">{{ __('Add Sub Category') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            class="iconify" data-icon="akar-icons:cross"></span></button>
                </div>
                <form class="ajax" action="{{ route('admin.sub-category.store') }}" method="POST"
                    data-handler="getShowMessage">
                    <div class="modal-body">
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Category') }}</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">{{ __('Select Option') }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('Name') }}">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Summary') }}</label>
                                    <textarea type="text" name="summery" class="form-control" placeholder="{{ __('Summary') }}"></textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Icon') }}</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="col-md-12 mb-25">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="h5 mt-3">{{ __('Content') }}</h5>
                                        <button type="button" class="btn addItem"><span class="iconify"
                                                data-icon="material-symbols:add"></span> Add </button>
                                    </div>
                                    <div class="contentItems">
                                        <div class="row border rounded mt-3 items">
                                            <div class="col-md-6 mb-3 mt-3">
                                                <label
                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Type') }}</label>
                                                <select name="items[types][]" class="form-select items-types">
                                                    <option value="input">{{ __('Input') }}</option>
                                                    <option value="textarea">{{ __('Textarea') }}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3 mt-3">
                                                <label
                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Label') }}</label>
                                                <input type="text" name="items[labels][]"
                                                    placeholder="{{ __('Label') }}" class="form-control items-labels">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label
                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Placeholder') }}</label>
                                                <input name="items[placeholders][]" placeholder="{{ __('Placeholder') }}"
                                                    class="form-control items-placeholders">
                                            </div>
                                            <div class="col-md-12 mb-3 d-flex justify-content-end">
                                                <button class="p-1 tbl-action-btn text-danger removeBtn" title="Delete">
                                                    <span class="iconify" data-icon="ep:delete-filled"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-25">
                                    <div class="card border">
                                        <div class="card-body bg-light">
                                            <p class="card-text">
                                                <span class="d-block mb-2">Prompt template fields : <span
                                                        class="prompt-note"></span></span>
                                                <span class="fw-bold">{{ __('Example') }} : </span>
                                                Write me a headline about #<span class="fw-bold">description</span># and
                                                product or service is
                                                #<span class="fw-bold">product/service</span># in <span
                                                    class="fw-bold">#language#</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Prompt') }}</label>
                                    <textarea type="text" name="prompt" class="form-control"
                                        placeholder="{{ __('Write me a headline for #product#, my description is #description#') }}"></textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Is Long Form') }}</label>
                                    <select name="is_long_form" class="form-control isLongForm">
                                        <option value="0">{{ __('No') }}</option>
                                        <option value="1">{{ __('Yes') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-25 d-none long-form-prompt">
                                    <div class="card border">
                                        <div class="card-body bg-light">
                                            <p class="card-text">
                                                <span class="d-block mb-2">Prompt template fields : <span
                                                        class="prompt-note"></span></span>
                                                <span class="fw-bold">{{ __('Example') }} : </span>
                                                <span>Write an outline for a blog post about #<span class="fw-bold">topic</span>#.</span>
                                                <span class="d-block">-A quick definition of #<span class="fw-bold">topic</span>#</span>
                                                <span class="d-block">-Pros and cons of the #<span class="fw-bold">topic</span>#</span>
                                                <span class="d-block">-Some examples of #<span class="fw-bold">topic</span>#</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-25 d-none long-form-prompt">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Long Form Prompt') }}</label>
                                    <textarea name="long_form_prompt" class="form-control" placeholder="{{ __('Long Form Prompt') }}"></textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="status" id="status" class="form-control">
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
                            title="{{ __('Submit') }}">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">{{ __('Edit Sub Category') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            class="iconify" data-icon="akar-icons:cross"></span></button>
                </div>
                <form class="ajax" action="{{ route('admin.sub-category.store') }}" method="POST"
                    data-handler="getShowMessage">
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Category') }}</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">{{ __('Select Option') }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('Name') }}">
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Summary') }}</label>
                                    <textarea type="text" name="summery" class="form-control" placeholder="{{ __('Summary') }}"></textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Icon') }}</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="col-md-12 mb-25 ">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="h5 mt-3">{{ __('Content') }}</h5>
                                        <button type="button" class="btn addItem"><span class="iconify"
                                                data-icon="material-symbols:add"></span> Add </button>
                                    </div>
                                    <div class="contentItems">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <div class="card border">
                                        <div class="card-body bg-light">
                                            <p class="card-text">
                                                <span class="d-block mb-2">Prompt template fields : <span
                                                        class="prompt-note"></span></span>
                                                <span class="fw-bold">{{ __('For Example') }} : </span>
                                                Write me a headline about #<span class="fw-bold">description</span># and
                                                product or service is
                                                #<span class="fw-bold">product/service</span># in <span
                                                    class="fw-bold">#language#</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Prompt') }}</label>
                                    <textarea type="text" name="prompt" class="form-control" placeholder="{{ __('Prompt') }}"></textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Is Long Form') }}</label>
                                    <select name="is_long_form" class="form-control isLongForm">
                                        <option value="0">{{ __('No') }}</option>
                                        <option value="1">{{ __('Yes') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-25 d-none long-form-prompt">
                                    <div class="card border">
                                        <div class="card-body bg-light">
                                            <p class="card-text">
                                                <span class="d-block mb-2">Prompt template fields : <span
                                                        class="prompt-note"></span></span>
                                                <span class="fw-bold">{{ __('Example') }} : </span>
                                                <span>Write an outline for a blog post about #<span class="fw-bold">topic</span>#.</span>
                                                <span class="d-block">-A quick definition of the #<span class="fw-bold">topic</span>#</span>
                                                <span class="d-block">-Pros and cons of the #<span class="fw-bold">topic</span>#</span>
                                                <span class="d-block">-Some examples of the #<span class="fw-bold">topic</span>#</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-25 d-none long-form-prompt">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Long Form Prompt') }}</label>
                                    <textarea name="long_form_prompt" class="form-control" placeholder="{{ __('Long Form Prompt') }}"></textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label
                                        class="label-text-title color-heading font-medium mb-2">{{ __('Status') }}</label>
                                    <select name="status" id="status" class="form-control">
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
    <input type="hidden" id="subCategoryGetInfoRoute" value="{{ route('admin.sub-category.get.info') }}">
@endsection

@push('style')
    @include('admin.layouts.datatable-style')
@endpush

@push('script')
    @include('admin.layouts.datatable-script')
    <script src="{{ asset('backend/assets/js/pages/alldatatables.init.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom/sub-category.js') }}"></script>
@endpush
