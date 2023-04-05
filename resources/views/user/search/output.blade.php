@foreach ($items as $key => $item)
    <div class="ai-assistant-rightside bg-white radius-10 h-100 border-4 p-20 output-block">
        <div class="ai-assistant-top-bar d-flex flex-wrap justify-content-between align-items-center">
            <div class="ai-assistant-top-bar-left d-inline-flex align-items-center">
                {{-- <p class="me-3 mb-25">{{ $item->created_at->diffForHumans() }}</p> --}}
                <div class="ai-assistant-top-bar-left-btns">
                    <button class="status-btn status-btn-green me-2 mb-25 copyItem"
                        title="{{ __('Copy') }}">{{ __('Copy') }}<span class="iconify ms-2"
                            data-icon="lucide:copy"></span></button>
                    <button class="status-btn status-btn-blue me-2 mb-25 editItem"
                        title="{{ __('Edit') }}">{{ __('Edit') }}<span class="iconify ms-2"
                            data-icon="clarity:pencil-line"></span></button>
                    <button class="status-btn status-btn-sm favorite-btn me-2 mb-25 favoriteItem"
                        title="{{ __('Favorite') }}"><span class="iconify font-18" data-icon="ph:star"></span></button>
                </div>
            </div>
            <div class="ai-assistant-top-bar-left d-inline-flex align-items-center">
                <button class="status-btn status-btn-sm like-dislike-btn me-2 mb-25 likeItem"
                    title="{{ __('Like') }}"><span class="iconify font-18" data-icon="uiw:like-o"></span></button>
                <button class="status-btn status-btn-sm like-dislike-btn me-2 mb-25 dislikeItem"
                    title="{{ __('Dislike') }}"><span class="iconify font-18" data-icon="uiw:dislike-o"></span></button>
                <button class="status-btn status-btn-sm status-btn-orange me-2 mb-25 trashItem"
                    title="{{ __('Trash') }}"><span class="iconify font-18" data-icon="ph:trash"></span></button>
            </div>
        </div>
        <div class="ai-assistant-editor-wrap theme-border radius-10">
            <input type="hidden" name="id" value="{{ $item->id }}">
            <textarea name="content" class="editor">{!! str_replace("\n", "<br/>", $item->output) !!}</textarea>
        </div>
    </div>
@endforeach
