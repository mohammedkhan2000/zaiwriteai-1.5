$('#add').on('click', function () {
    var selector = $('#addModal');
    selector.find('.is-invalid').removeClass('is-invalid');
    selector.find('.error-message').remove();
    selector.modal('show')
    selector.find('form').trigger("reset");
});

$('.edit').on('click', function () {
    commonAjax('GET', $('#subCategoryGetInfoRoute').val(), getDataEditRes, getDataEditRes, { 'id': $(this).data('id') });
});

function getDataEditRes(response) {
    var selector = $('#editModal');
    selector.find('.is-invalid').removeClass('is-invalid');
    selector.find('.error-message').remove();
    selector.find('input[name=name]').val(response.data.name)
    selector.find('textarea[name=summery]').text(response.data.summery)
    selector.find('textarea[name=prompt]').text(response.data.prompt)
    selector.find('textarea[name=long_form_prompt]').text(response.data.long_form_prompt)
    selector.find('input[name=id]').val(response.data.id)
    selector.find('select[name=status]').val(response.data.status)
    selector.find('select[name=is_long_form]').val(response.data.is_long_form)
    selector.find('select[name=category_id]').val(response.data.category_id)
    if (response.data.is_long_form == 1) {
        selector.find('.long-form-prompt').removeClass('d-none');
    } else {
        selector.find('.long-form-prompt').addClass('d-none');
    }
    var content = JSON.parse(response.data.content);
    var html = '';
    var ownPromptLabel = '';
    Object.entries(content).forEach((item) => {
        html += `<div class="row border rounded mt-3 items">
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="label-text-title color-heading font-medium mb-2">Type</label>
                        <select name="items[types][]" class="form-select items-types">
                            <option value="input" ${item[1].type == 'input' ? 'selected' : ''}>Input</option>
                            <option value="textarea" ${item[1].type == 'textarea' ? 'selected' : ''}>Textarea</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3 mt-3">
                        <label class="label-text-title color-heading font-medium mb-2">Label</label>
                        <input type="text" name="items[labels][]" value="${item[1].label}" placeholder="Label" class="form-control items-labels">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="label-text-title color-heading font-medium mb-2">Placeholder</label>
                        <input name="items[placeholders][]" value="${item[1].placeholder == 'null' ? '' : item[1].placeholder}" placeholder="Placeholder" class="form-control items-placeholders">
                    </div>
                    <div class="col-md-12 mb-3 d-flex justify-content-end">
                        <button class="p-1 tbl-action-btn text-danger removeBtn" title="Delete">
                            <span class="iconify" data-icon="ep:delete-filled"></span>
                        </button>
                    </div>
                </div>`;

        ownPromptLabel += `#<span class="fw-bold">${item[1].label}</span>#, `;
    });
    ownPromptLabel += ' and #<span class="fw-bold">language</span>#'
    selector.find('.prompt-note').html(ownPromptLabel);
    if (html == '') {
        html = addItemTemplate();
    }
    selector.find('.contentItems').html(html);
    selector.modal('show')
}

$('.addItem').on('click', function () {
    var selector = $(this).closest('form');
    selector.find('.contentItems').append(addItemTemplate());
});

$(document).on('click', '.removeBtn', function () {
    $(this).parent().parent().remove();
});

$('.isLongForm').on('change', function () {
    var isLongForm = $(this).val();
    var selector = $(this).closest('form');
    if (isLongForm == 1) {
        selector.find('.long-form-prompt').removeClass('d-none');
    } else {
        selector.find('.long-form-prompt').addClass('d-none');
    }
});

$(document).on('input', '.items-labels', function () {
    var selector = $(this).closest('form');
    var items = selector.find('.items');
    var ownPromptLabel = '';
    $(items).each(function () {
        ownPromptLabel += `#<span class="fw-bold">${$(this).find('.items-labels').val()}</span>#, `;
    });
    ownPromptLabel += ' and #<span class="fw-bold">language</span>#'
    selector.find('.prompt-note').html(ownPromptLabel);
});

function addItemTemplate() {
    return `<div class="row border rounded mt-3 items">
                <div class="col-md-6 mb-3 mt-3">
                    <label
                        class="label-text-title color-heading font-medium mb-2">Type</label>
                    <select name="items[types][]" class="form-select items-types">
                        <option value="input">Input</option>
                        <option value="textarea">Textarea</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3 mt-3">
                    <label
                        class="label-text-title color-heading font-medium mb-2">Label</label>
                    <input type="text" name="items[labels][]"
                        placeholder="Label" class="form-control items-labels">
                </div>
                <div class="col-md-12 mb-3">
                    <label
                        class="label-text-title color-heading font-medium mb-2">Placeholder</label>
                    <input name="items[placeholders][]" placeholder="Placeholder"
                        class="form-control items-placeholders">
                </div>
                <div class="col-md-12 mb-3 d-flex justify-content-end">
                    <button class="p-1 tbl-action-btn text-danger removeBtn" title="Delete">
                        <span class="iconify" data-icon="ep:delete-filled"></span>
                    </button>
                </div>
            </div>`;
}
