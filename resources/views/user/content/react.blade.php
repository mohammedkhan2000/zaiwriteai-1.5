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
                                    <h2 class="mb-sm-0">{{ __($pageTitle) }}</h2>
                                    <p>{{ __($pageTitle) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row template-content-wrap">
                        @forelse ($items as $key => $item)
                            <div class="col-md-12 col-lg-12 col-xl-6 mb-25 output-block">
                                <div class="template-content-item bg-white theme-border radius-12 h-100 p-20 pb-0">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div
                                        class="ai-assistant-top-bar d-flex flex-wrap justify-content-between align-items-center">
                                        <div class="ai-assistant-top-bar-left d-inline-flex align-items-center">
                                            <p class="publish-day me-3 mb-25">{{ $item->created_at->diffForHumans() }}</p>
                                            <div class="ai-assistant-top-bar-left-btns">
                                                <button class="status-btn me-2 mb-25 copyItem"
                                                    title="{{ __('Copy') }}">{{ __('Copy') }}<span
                                                        class="iconify ms-2" data-icon="lucide:copy"></span></button>
                                                <button
                                                    class="status-btn {{ $item->is_favorite == 1 ? 'status-btn-orange' : '' }} status-btn-sm favorite-btn me-2 mb-25 favoriteItem"
                                                    title="{{ __('Favorite') }}"><span class="iconify font-18"
                                                        data-icon="ph:star"></span></button>
                                                <a href="{{ route('user.content.download', ['type' => 'print', 'id' => $item->id]) }}"
                                                    class="status-btn status-btn-sm favorite-btn me-2 mb-25" target="_blank"
                                                    title="{{ __('Print') }}">
                                                    <span class="iconify font-18"
                                                        data-icon="material-symbols:print"></span></a>
                                                <a href="{{ route('user.content.download', ['type' => 'word', 'id' => $item->id]) }}"
                                                    class="status-btn status-btn-sm favorite-btn me-2 mb-25"
                                                    title="{{ __('Word Generate') }}"><span class="iconify font-18"
                                                        data-icon="mdi:file-word"></span></a>
                                            </div>
                                        </div>
                                        <div class="ai-assistant-top-bar-left d-inline-flex align-items-center">
                                            <button
                                                class="status-btn status-btn-sm like-dislike-btn {{ $item->react == REACT_LIKE ? 'active' : '' }} me-2 mb-25 likeItem"
                                                title="Like"><span class="iconify font-17"
                                                    data-icon="uiw:like-o"></span></button>
                                            <button
                                                class="status-btn status-btn-sm like-dislike-btn {{ $item->react == REACT_DISLIKE ? 'active' : '' }} me-2 mb-25 dislikeItem"
                                                title="Dislike"><span class="iconify font-17"
                                                    data-icon="uiw:dislike-o"></span></button>
                                            <button class="status-btn status-btn-sm me-2 mb-25 trashItem"
                                                title="Trash"><span class="iconify font-17"
                                                    data-icon="ph:trash"></span></button>
                                        </div>
                                    </div>
                                    <div class="template-content-text">
                                        <p class="output">
                                            {!! nl2br($item->output) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div
                                class="empty-content-box d-flex flex-column justify-content-center align-items-center text-center m-4">
                                <img src="{{ url('user/assets/images/empty-content.png') }}" alt=""
                                    class="img-fluid">
                                <h6 class="mt-3">No Content Available!</h6>
                            </div>
                        @endforelse
                    </div>
                    @if ($items->hasPages())
                        <div class="row">
                            <div class="col-12">
                                {{ $items->links() }}
                            </div>
                        </div>
                    @endif
                    <!-- Liked Content row -->
                </div>
                <!-- Page Content Wrapper End -->
            </div>
        </div>
        <!-- End Page-content -->
    </div>
    <input type="hidden" id="searchItemFavoriteRoute" value="{{ route('user.search.item.favorite') }}">
    <input type="hidden" id="searchItemReactRoute" value="{{ route('user.search.item.react') }}">
    <input type="hidden" id="searchItemDeleteRoute" value="{{ route('user.search.item.delete') }}">
@endsection

@push('script')
    <script src="{{ asset('user/assets/js/custom/search-content.js') }}"></script>
@endpush
