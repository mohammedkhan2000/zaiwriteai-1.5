$(document).on('click', '.favoriteTemplate', function (e) {
    e.preventDefault();
    var selector = $(this).closest('.template-block');
    var id = selector.find('input[name=id]').val()
    if (id != '') {
        commonAjax('GET', $('#templateFavoriteRoute').val(), getShowMessage, getShowMessage, { 'id': id });
    } else {
        toastr.error('Something Went Wrong');
    }
});

$(document).on('input', '.category-search', function () {
    search($(this).val())
});

function search(text) {
    $('.category-block').each(function () {
        var categoryName = $(this).find('.category-name').text().toLowerCase();
        if (categoryName.indexOf(text.toLowerCase()) >= 0) {
            $(this).removeClass('d-none')
        } else {
            $(this).addClass('d-none')
        }
    });
}

