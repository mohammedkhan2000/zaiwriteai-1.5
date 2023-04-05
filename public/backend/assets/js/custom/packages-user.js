
$('#allPackagesUserTable').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 25,
    responsive: true,
    ajax: $('#packagesUserRoute').val(),
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
        "data": "user_name",
        "title": 'User Name',
        "name": "users.first_name"
    },
    {
        "data": "package_name",
        "title": "Package Name",
        "name": "packages.package_name"
    },
    {
        "data": "start_date",
        "title": "Start Date",
        "name": "user_packages.start_date"
    },
    {
        "data": "end_date",
        "title": "End Date",
        "name": "user_packages.end_date"
    },
    {
        "data": "payment_status",
        "title": "Payment Status",
        "name": "orders.payment_status"
    },
    {
        "data": "status",
        "title": "Status",
        "name": "user_packages.status"
    },

    ]
});
