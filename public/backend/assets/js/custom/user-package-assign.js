$('#assignPackage').on('click', function () {
    var selector = $('#userPackageAssignModal');
    selector.find('.is-invalid').removeClass('is-invalid');
    selector.find('.error-message').remove();
    selector.find('form').trigger('reset');
    selector.modal('show')
})
