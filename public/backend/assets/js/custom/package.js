var thisStateSelector;

$('#add').on('click', function () {
    var selector = $('#addModal');
    selector.find('.is-invalid').removeClass('is-invalid');
    selector.find('.error-message').remove();
    selector.find('form').trigger('reset');
    selector.modal('show')
})

$(document).on('click', '.edit', function () {
    commonAjax('GET', $('#packageInfoRoute').val(), getDataEditRes, getDataEditRes, { 'id': $(this).data('id') });
});

function getDataEditRes(response) {
    var selector = $('#editModal');
    selector.find('.is-invalid').removeClass('is-invalid');
    selector.find('.error-message').remove();
    selector.find('input[name=id]').val(response.data.id)
    selector.find('input[name=name]').val(response.data.name)
    selector.find('input[name=generate_characters]').val(response.data.generate_characters)
    selector.find('#access_use_cases').selectpicker('val', response.data.access_use_cases)
    selector.find('input[name=write_languages]').val(response.data.write_languages)
    selector.find('input[name=access_tones]').val(response.data.access_tones)
    selector.find('input[name=generate_images]').val(response.data.generate_images)
    selector.find('input[name=plagiarism_checker]').val(response.data.plagiarism_checker)
    selector.find('input[name=access_community]').val(response.data.access_community)
    selector.find('input[name=custom_use_cases]').val(response.data.custom_use_cases)
    selector.find('input[name=dedicated_account]').val(response.data.dedicated_account)
    selector.find('input[name=support]').val(response.data.support)
    selector.find('input[name=device_limit]').val(response.data.device_limit)
    selector.find('select[name=status]').val(response.data.status)
    selector.find('select[name=is_trail]').val(response.data.is_trail)
    selector.find('input[name=monthly_price]').val(response.data.monthly_price)
    selector.find('input[name=yearly_price]').val(response.data.yearly_price)
    selector.modal('show')
}

$('#allDataTable').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 25,
    responsive: true,
    ajax: $('#packageIndexRoute').val(),
    order: [1, 'desc'],
    ordering: false,
    autoWidth: false,
    drawCallback: function () {
        $(".dataTables_length select").addClass("form-select form-select-sm");
    },
    language: {
        'paginate': {
            'previous': '<span class="iconify" data-icon="icons8:angle-left"></span>',
            'next': '<span class="iconify" data-icon="icons8:angle-right"></span>'
        }
    },
    columns: [{
        "data": "name",
        "title": 'Name'
    },
    {
        "data": "monthly_price",
        "title": "Monthly Price",
        "name": "monthly_price"
    },
    {
        "data": "yearly_price",
        "title": "Yearly Price",
        "name": "yearly_price"
    },
    {
        "data": "generate_characters",
        "title": "Generate Characters Monthly",
        "name": "generate_characters"
    },
    {
        "data": "action",
        "title": "Action"
    },
    ]
});
