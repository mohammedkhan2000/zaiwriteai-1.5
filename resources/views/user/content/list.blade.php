@extends('user.layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper bg-light p-30 radius-10">

                    @include('user.layouts.header-plan-message')

                    <input type="hidden" id="templateFavoriteRoute" value="{{ route('user.sub_category.favorite') }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <div class="page-title-left">
                                    <h2 class="mb-sm-0">{{ __($pageTitle) }}</h2>
                                    <p>{{ __('Generate AI Content With Your Favorite Templates') }}</p>
                                </div>
                                <div>
                                    <form class="app-search d-none d-lg-block">
                                        <div class="position-relative">
                                            <input type="text" class="form-control category-search"
                                                placeholder="{{ __('Search') }}">
                                            <span class="ri-search-line"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-start">
                        <div class="col-md-12 col-lg-12 col-xl-4 col-xxl-3">
                            <div class="dashboard-topic-wrap bg-gradient radius-20 py-3 mb-25">
                                <h4 class="dashboard-topic-title text-white font-normal">{{ __('Select Here') }}</h4>
                                <div class="dashboard-topic-wrap-inner">
                                    <div class="dashboard-topic-nav nav flex-column nav-pills" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        @foreach ($categories as $key => $category)
                                            <button
                                                class="nav-link font-medium position-relative {{ $loop->first ? 'active' : '' }}"
                                                id="category-{{ $key }}-tab" data-bs-toggle="pill"
                                                data-bs-target="#category-{{ $key }}" type="button" role="tab"
                                                aria-controls="category-{{ $key }}" aria-selected="false">
                                                <span
                                                    class="topic-nav-icon d-flex flex-shrink-0 align-items-center justify-content-center me-2">
                                                    <img class=""
                                                        src="{{ asset('storage/' . $category->first()->category_icon) }}"
                                                        alt="" />
                                                </span>
                                                <span
                                                    class="topic-nav-title flex-grow-1">{{ $category->first()->category_name }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-8 col-xxl-9">
                            <div class="dashboard-topic-content tab-content" id="v-pills-tabContent">
                                @foreach ($categories as $key => $category)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                        id="category-{{ $key }}" role="tabpanel"
                                        aria-labelledby="category-{{ $key }}-tab" tabindex="0">
                                        <div class="topic-content-item-wrap row">
                                            @foreach ($category as $subCategory)
                                                <div
                                                    class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-4 mb-25 template-block category-block">
                                                    <input type="hidden" name="id" value="{{ $subCategory->id }}">
                                                    <a href="{{ route('user.search', $subCategory->id) }}"
                                                        class="topic-content-item d-block bg-white theme-border radius-12 h-100 p-20">
                                                        <div
                                                            class="topic-content-item-btns d-flex align-content-center justify-content-between">
                                                            <div
                                                                class="topic-content-item-icon d-inline-flex align-items-center justify-content-center radius-50">
                                                                <img class="iconify"
                                                                    src="{{ asset('storage/' . $subCategory->sub_category_icon) }}"
                                                                    alt="" />
                                                            </div>
                                                            <span
                                                                class="favoriteTemplate status-btn {{ !is_null($subCategory->favorite) ? 'status-btn-orange' : '' }} status-btn-sm favorite-btn cursor"
                                                                title="Favorite"><span class="iconify font-17"
                                                                    data-icon="ph:star"></span></span>
                                                        </div>
                                                        <h4 class="mt-15 category-name">{{ $subCategory->name }}</h4>
                                                        <p class="font-12 mt-2">{!! $subCategory->summery !!}</p>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('user/assets/js/custom/template_favorite.js') }}"></script>
@endpush
