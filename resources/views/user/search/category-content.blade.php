@php
    $content = json_decode($subCategory->content);
@endphp
@foreach ($content as $key => $item)
    @if ($item->type == 'textarea')
        <div class="col-md-12 mb-25">
            <label
                class="label-text-title color-heading font-medium mb-2">{{ $item->label == 'null' ? 'Label' : $item->label }}</label>
            <textarea class="form-control" name="{{ $item->name ?? 'description' }}"
                placeholder="{{ $item->placeholder == 'null' ? 'Placeholder' : $item->placeholder }}"></textarea>
        </div>
    @elseif ($item->type == 'input')
        <div class="col-md-12 mb-25">
            <label class="label-text-title color-heading font-medium mb-2">{{ $item->label }}</label>
            <input type="text" class="form-control" name="{{ $item->name ?? 'product' }}"
                placeholder="{{ $item->placeholder == 'null' ? 'Placeholder' : $item->placeholder }}">
        </div>
    @endif
@endforeach
