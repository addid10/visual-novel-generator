// CSRF 
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// DataTable
let dataTable = $('#character-table').DataTable({
    "processing": true,
    "ajax": {
        url: "characters"
    },
    "columns": [{
            data: 'fullname'
        },
        {
            data: 'gender'
        },
        {
            sortable: false,
            "render": function (data, type, full, meta) {
                let buttonId = full.id;
                return '<button id="' + buttonId + '" class="d-block btn btn-sm btn-gradient-primary show-images">Images</button>';
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

$(document).on('click', '.show-images', function () {
    $('#character-images-modal').modal('show');
})

$('#character-table tbody').on('click', '.delete', function () {
    let id = $(this).attr("id");

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            // $.ajax({
            //     url: "lecturers/" + id,
            //     type: 'DELETE',
            //     success: function () {
            Swal.fire(
                    'Deleted Id ' + id + '!',
                    'Visual novel has been turned off',
                    'success'
                )
                .then(function () {
                    dataTable.ajax.reload();
                });
            //     }
            // });
        }
    })
});
