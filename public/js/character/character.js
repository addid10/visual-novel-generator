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

function indexImages(id) {
    $.ajax({
        url: "characters-images/" + id,
        success: function (data) {
            $('#character-images-modal').modal('show');
            $('#character-images').html('');

            data.forEach(function (result) {
                let image = '<div class="col-md-6">' +
                    '<div class="image-position">' +
                    '<img src="../storages/' + result.image + '" class="w-100 mb-5 rounded image-detail" alt="' + result.name + '">' +
                    '<button id="' + result.id + '" class="btn btn-danger btn-sm delete-images"><span class="mdi mdi-delete"></span></button>' +
                    '</div>' +
                    '</div>';

                $('#character-images').append(image);
            })
        }
    })
}

$('#character-table tbody').on('click', '.show-images', function () {

    let id = $(this).attr('id');
    indexImages(id)

})

$(document).on('click', '.delete-images', function () {
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
            $.ajax({
                url: "characters-images/" + id,
                type: 'DELETE',
                success: function () {
                    Swal.fire(
                            'Deleted!',
                            'Images successfully deleted.',
                            'success'
                        )
                        .then(function () {
                            dataTable.ajax.reload();
                            indexImages(id)
                        });
                }
            });
        }
    })
});

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
