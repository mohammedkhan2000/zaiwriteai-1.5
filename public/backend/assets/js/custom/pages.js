
$('.edit').on('click', function (e) {
    var selector = $('#editPageModal');
    selector.find('.is-invalid').removeClass('is-invalid');
    selector.find('.error-message').remove();
    selector.find('textarea[name=content]').val($(this).data('item').content)
    selector.find('input[name=id]').val($(this).data('item').id)
    selector.modal('show')
})
