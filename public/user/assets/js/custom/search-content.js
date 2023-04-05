
$(document).on('click', '.copyItem', function () {
    var selector = $(this).closest('.output-block');
    var getContent = selector.find('.output').text()
    $("<textarea/>").appendTo("body").val(getContent).select().each(function () {
        document.execCommand('copy');
    }).remove();
    toastr.success('Copy to clipboard');
});

$(document).on('click', '.favoriteItem', function () {
    var selector = $(this).closest('.output-block');
    var id = selector.find('input[name=id]').val()
    if (id != '') {
        commonAjax('GET', $('#searchItemFavoriteRoute').val(), getShowMessage, getShowMessage, { 'id': id });
    } else {
        toastr.error('Something Went Wrong');
    }
});

$(document).on('click', '.likeItem', function () {
    var selector = $(this).closest('.output-block');
    var id = selector.find('input[name=id]').val()
    if (id != '') {
        commonAjax('GET', $('#searchItemReactRoute').val(), getShowMessage, getShowMessage, { 'id': id, 'react': 1 });
    } else {
        toastr.error('Something Went Wrong');
    }
});

$(document).on('click', '.dislikeItem', function () {
    var selector = $(this).closest('.output-block');
    var id = selector.find('input[name=id]').val()
    if (id != '') {
        commonAjax('GET', $('#searchItemReactRoute').val(), getShowMessage, getShowMessage, { 'id': id, 'react': 2 });
    } else {
        toastr.error('Something Went Wrong');
    }
});

$(document).on('click', '.trashItem', function () {
    stateSelector = $(this).closest('.output-block');
    var id = stateSelector.find('input[name=id]').val()
    if (id != '') {
        commonAjax('GET', $('#searchItemDeleteRoute').val(), getShowMessage, getShowMessage, { 'id': id });
    } else {
        toastr.error('Something Went Wrong');
    }
});
