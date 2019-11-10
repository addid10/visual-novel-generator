// CSRF 
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// DataTable
let dataTable = $('#background-table').DataTable({
    "processing": true,
    "ajax": {
        url: "backgrounds"
    },
    "columns": [{
            data: 'name'
        },
        {
            sortable: false,
            "render": function (data, type, full, meta) {
                let image = full.image;
                return '<div class="bg-image-sm"><img src="../storages/' + image + '"></div>';
            }
        },
        {
            sortable: false,
            "render": function (data, type, full, meta) {
                let buttonId = full.id;
                return '<button id="' + buttonId + '" class="btn btn-sm btn-gradient-warning update">Update</button>';
            }
        },
        {
            sortable: false,
            "render": function (data, type, full, meta) {
                let buttonId = full.id;
                return '<button id="' + buttonId + '" class="btn btn-sm btn-gradient-danger delete">Delete</button>';
            }
        }
    ]
});