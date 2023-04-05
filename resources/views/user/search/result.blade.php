@extends('user.layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper bg-light p-30 radius-10">

                    @include('user.layouts.header-plan-message')

                    <div class="row align-items-start">
                        <div class="col-md-12 col-lg-12 col-xl-4 col-xxl-4">
                            <div class="ai-assistant-leftside">
                                <form class="ajax" id="search-form" action="{{ route('user.search.store') }}" method="POST"
                                    data-handler="getDataResponse">
                                    <div class="row">
                                        <div class="col-md-12 mb-25">
                                            <label
                                                class="label-text-title color-heading font-medium mb-2">{{ __('Ai Assistant') }}</label>
                                            <div class="my-custom-select-box">
                                                <select
                                                    class="my-custom-select form-select selectpicker w-100 sub_category_id"
                                                    title="Select" name="sub_category_id">
                                                    @foreach ($categories as $key => $category)
                                                        <optgroup label="{{ $category->first()->category_name }}">
                                                            @foreach ($category as $subCategory)
                                                                <option
                                                                    data-content="<span class='ai-assistant-item d-flex align-items-center'>
                                                                                    <span class='ai-assistant-item-img-wrap me-2 rounded-circle'>
                                                                                        <img src='{{ asset('storage/' . $subCategory->sub_category_icon) }}' alt='' class='fit-image'></span>
                                                                                    <span class='flex-1'>
                                                                                        <span class='ai-assistant-item-title color-heading font-14'>{{ $subCategory->name }}</span>
                                                                                    </span>
                                                                                </span>"
                                                                    {{ $subCategoryId == $subCategory->id ? 'selected' : '' }}
                                                                    value="{{ $subCategory->id }}">
                                                                    {{ $subCategory->name }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div id="categoryContent">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item bg-transparent border-0 border-top">
                                                <h2 class="accordion-header pb-2" id="headingTwo">
                                                    <button
                                                        class="accordion-button label-text-title color-heading font-medium bg-transparent p-0"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwo" aria-expanded="true"
                                                        aria-controls="collapseTwo">
                                                        {{ __('Settings') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body px-0 pt-0">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-25">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Creativity') }}</label>
                                                                <select name="creativity_level" id="creativity_level"
                                                                    class="form-control">
                                                                    <option value="0.0">{{ __('None') }}</option>
                                                                    <option value="0.2">{{ __('Low') }}</option>
                                                                    <option value="0.35">{{ __('Optimal') }}</option>
                                                                    <option value="0.5">{{ __('Medium') }}</option>
                                                                    <option value="0.8">{{ __('High') }}</option>
                                                                    <option value="1.0">{{ __('Max') }}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-25 d-none long_form">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Long form') }}</label>
                                                                <select name="long_form" id="long_form"
                                                                    class="form-control">
                                                                    <option value="0">{{ __('No') }}</option>
                                                                    <option value="1">{{ __('Yes') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-25">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Outputs') }}</label>
                                                                <select name="output" id="output" class="form-control">
                                                                    <option value="1">{{ __('One') }}</option>
                                                                    <option value="2">{{ __('Two') }}</option>
                                                                    <option value="3">{{ __('Three') }}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-25">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Character') }}</label>
                                                                <input type="number" min=4 name="character" id="character"
                                                                    class="form-control"
                                                                    placeholder="{{ __('character') }}"
                                                                    value="{{ getOption('chat_gpt_search_min_character', 1500) }}"
                                                                    min="{{ getOption('chat_gpt_search_min_character', 1500) }}"
                                                                    max="{{ getOption('chat_gpt_search_max_character', 5000) }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-25">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Tone of voice') }}</label>
                                                                <select name="tone_of_voice" id="tone_of_voice"
                                                                    class="form-control">
                                                                    @foreach (getLimit(RULES_TONE) as $tone)
                                                                        <option value="{{ $tone }}">
                                                                            {{ $tone }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-25">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Target Audience') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="target_action"
                                                                    placeholder="e.g. a six year old child">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-25">
                                                                <label
                                                                    class="label-text-title color-heading font-medium mb-2">{{ __('Language') }}</label>
                                                                <select name="language" id="language" class="form-control">
                                                                    @foreach (getLimit(RULES_LANGUAGE) as $language)
                                                                        <option value="{{ $language }}"
                                                                            @if ($language == 'English') selected @endif>
                                                                            {{ $language }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-25">
                                            <button class="theme-btn" id="submit-btn" type="submit">
                                                <span class="spinner-border spinner-border-sm mr-15 spinner d-none"
                                                    role="status" aria-hidden="true"></span>
                                                {{ __('Create') }}
                                                <span class="iconify font-20 ms-2"
                                                    data-icon="material-symbols:arrow-right-alt-rounded"></span>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-8 col-xxl-8">
                            <div id="appendOutput">
                                <div class="ai-assistant-rightside bg-white radius-10 h-100 border-4 p-20 output-block">
                                    <div class="ai-assistant-editor-wrap theme-border radius-10">
                                        <textarea name="content" class="editor"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- AI Assistant Page Content Wrap row -->

                </div>
                <!-- Page Content Wrapper End -->

            </div>

        </div>
        <!-- End Page-content -->

    </div>
    <input type="hidden" id="getCategoryContentRoute" value="{{ route('user.category.content') }}">
    <input type="hidden" id="searchItemUpdateRoute" value="{{ route('user.search.item.update') }}">
    <input type="hidden" id="searchItemFavoriteRoute" value="{{ route('user.search.item.favorite') }}">
    <input type="hidden" id="searchItemReactRoute" value="{{ route('user.search.item.react') }}">
    <input type="hidden" id="searchItemDeleteRoute" value="{{ route('user.search.item.delete') }}">
@endsection

@push('script')
    <!-- Ckeditor Js Start -->
    <script src='{{ asset('user/assets/libs/ckeditor/ckeditor.js') }}'></script>
    <script src="{{ asset('user/assets/js/pages/editor.js') }}?v=1"></script>
    <!-- Ckeditor Js End -->
    <script src="{{ asset('user/assets/js/custom/search-result.js') }}?v=1"></script>
@endpush
