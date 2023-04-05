
$('#add').on('click', function () {
    var selector = $('#addModal');
    selector.find('.is-invalid').removeClass('is-invalid');
    selector.find('.error-message').remove();
    selector.find('form').trigger('reset');
    selector.modal('show')
})

$(document).on('click', '.edit', function () {
    commonAjax('GET', $('#usersInfoRoute').val(), getEditRes, getEditRes, { 'id': $(this).data('id') });

});

function getEditRes(response) {
    var selector = $('#editModal')
    selector.find('.is-invalid').removeClass('is-invalid');
    selector.find('.error-message').remove();
    selector.find('input[name=id]').val(response.data.id);
    selector.find('input[name=first_name]').val(response.data.first_name);
    selector.find('input[name=last_name]').val(response.data.last_name);
    selector.find('input[name=email]').val(response.data.email);
    selector.find('select[name=status]').val(response.data.status);
    selector.modal('show');
}

$(document).on('click', '.statusBtn', function () {
    commonAjax('GET', $('#usersInfoRoute').val(), getDataRes, getDataRes, { 'id': $(this).data('id') });

});

function getDataRes(response) {
    var selector = $('#statusModal')
    selector.find('input[name=id]').val(response.data.id);
    selector.find('select[name=status]').val(response.data.status);
    selector.modal('show');
}

$('#allDataTable').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 25,
    responsive: true,
    ajax: $('#usersListRoute').val(),
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
        "data": "DT_RowIndex",
        "name": "DT_RowIndex",
        orderable: false,
        searchable: false,
        "title": "SL"
    },
    {
        "data": "name",
        "title": 'Name',
        "name": "first_name"
    },
    {
        "data": "email",
        "title": "Email",
        "name": "email"
    },
    {
        "data": "status",
        "title": "Status",
        "name": "status"
    },
    {
        "data": "action",
        "title": "Action",
        "name": "id"
    },
    ]
});
