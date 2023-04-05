var stateSelector;

$('.sub_category_id').on('change', function () {
    commonAjax('GET', $('#getCategoryContentRoute').val(), getCategoryContentRes, getCategoryContentRes, { 'id': $(this).val() });
});
function getCategoryContentRes(response) {
    $('#categoryContent').html(response.data.view); //subCategory
    if (response.data.subCategory.is_long_form == 1) {
        $('.long_form').removeClass('d-none');
    } else {
        $('.long_form').addClass('d-none');
    }
}

$(document).on('submit', '#search-form', function () {
    $('#submit-btn').find('.spinner').removeClass('d-none');
});

function getDataResponse(response) {
    var l = localStorage.getItem("ulc")
    localStorage.setItem("ulc", parseInt(l) + 1)
    $('#submit-btn').find('.spinner').addClass('d-none');
    $('#submit-btn').removeAttr('disabled');
    if (response['status'] == true) {
        $('#appendOutput').html(response.data.view);
        var allEditors = document.querySelectorAll('.editor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i]);
        }
    } else {
        commonHandler(response);
    }
}
$('.sub_category_id').trigger('change');

$(document).on('click', '.copyItem', function () {
    var selector = $(this).closest('.output-block');
    var getContent = selector.find('textarea').text()
    $("<textarea/>").appendTo("body").val(getContent).select().each(function () {
        document.execCommand('copy');
    }).remove();
    toastr.success('Copy to clipboard');
});

$(document).on('click', '.editItem', function () {
    var selector = $(this).closest('.output-block');
    var selectBtn = selector.find('.editItem');
    selectBtn.text('Save');
    selectBtn.addClass('saveItem');
    selectBtn.removeClass('editItem');
    // cursor set end
    var field = selector.find('textarea');
    var content = field.val();
    field.focus();
    field.val('');
    field.val(content);

});

$(document).on('click', '.saveItem', function () {
    var selector = $(this).closest('.output-block');
    var id = selector.find('input[name=id]').val()
    var output = selector.find('textarea').val();
    if (id != '') {
        commonAjax('GET', $('#searchItemUpdateRoute').val(), showMessage, showMessage, { 'id': id, 'output': output });
    } else {
        toastr.error('Something Went Wrong');
    }
});

$(document).on('click', '.favoriteItem', function () {
    var selector = $(this).closest('.output-block');
    var id = selector.find('input[name=id]').val()
    if (id != '') {
        commonAjax('GET', $('#searchItemFavoriteRoute').val(), favoriteHandler, favoriteHandler, { 'id': id }, $(this));
    } else {
        toastr.error('Something Went Wrong');
    }
});

$(document).on('click', '.likeItem', function () {
    var selector = $(this).closest('.output-block');
    var id = selector.find('input[name=id]').val()
    if (id != '') {
        commonAjax('GET', $('#searchItemReactRoute').val(), likeHandler, likeHandler, { 'id': id, 'react': 1 }, $(this));
    } else {
        toastr.error('Something Went Wrong');
    }
});

$(document).on('click', '.dislikeItem', function () {
    var selector = $(this).closest('.output-block');
    var id = selector.find('input[name=id]').val()
    if (id != '') {
        commonAjax('GET', $('#searchItemReactRoute').val(), likeHandler, likeHandler, { 'id': id, 'react': 2 }, $(this));
    } else {
        toastr.error('Something Went Wrong');
    }
});

$(document).on('click', '.trashItem', function () {
    stateSelector = $(this).closest('.output-block');
    var id = stateSelector.find('input[name=id]').val()
    if (id != '') {
        commonAjax('GET', $('#searchItemDeleteRoute').val(), getItemDeleteRes, getItemDeleteRes, { 'id': id });
    } else {
        toastr.error('Something Went Wrong');
    }
});

// $(document).on('change', '#long_form', function () {
//     var longForm = $(this).val()
//     if (longForm == 1) {
//         $('#character').attr('disabled', true)
//     } else {
//         $('#character').attr('disabled', false)
//     }

// });

function getItemDeleteRes(response) {
    if (response['status'] == true) {
        stateSelector.remove()
        toastr.success(response.message)
    } else {
        commonHandler(response);
    }
}

function favoriteHandler(selector, response) {
    var output = '';
    var type = 'error';
    $('.error-message').remove();
    $('.is-invalid').removeClass('is-invalid');
    if (response['status'] == true) {
        output = output + response['message'];
        type = 'success';
        if ($(selector).hasClass('status-btn-orange')) {
            $(selector).removeClass('status-btn-orange');
        }
        else {
            $(selector).addClass('status-btn-orange');
        }
        toastr.success(response.message)
    } else {
        commonHandler(response)
    }
}

function likeHandler(selector, response) {
    var output = '';
    var type = 'error';
    $('.error-message').remove();
    $('.is-invalid').removeClass('is-invalid');
    if (response['status'] == true) {
        output = output + response['message'];
        type = 'success';
        $(document).find('.like-dislike-btn').removeClass('status-btn-green');
        if ($(selector).hasClass('status-btn-green')) {
            $(selector).removeClass('status-btn-green');
        }
        else {
            $(selector).addClass('status-btn-green');
        }
        toastr.success(response.message)
    } else {
        commonHandler(response)
    }
}

if (localStorage.getItem("ulc") == null) {
    localStorage.setItem("ulc", 0)
}
