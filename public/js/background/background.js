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

$(document).ready(function () {

    $.ajax({
        url: '../visual-novels',
        type: "GET",
        dataType: "json",
        success: function (result) {
            if (result.data !== undefined) {
                result.data.forEach(function (result) {
                    let visualNovels = '<option value="' + result.id + '">' + result.title + '</option>';
                    $('#visual-novels').append(visualNovels);
                })
            }
        }
    })

})


// Click Button Add
$('#background-add').click(function () {
    $('#background-form')[0].reset();
    $('#background-title').text("Add background");
    $('#background-action').text("Add");
});

//Fetch datas for update
// $('#background-table tbody').on('click', '.update', function () {
//     let id = $(this).attr('id');

//     $.ajax({
//         url: "backgrounds/" + id + "/edit",
//         dataType: "json",
//         success: function (result) {
//             $('#background-modal').modal('show');
//             $('#background-title').text("Update background");
//             $('#background-action').text("Update");

//             $('#fullname').val(result.fullname);
//             $('#nickname').val(result.nickname);
//             $('#sex').val(result.gender);
//             $('#description').val(result.description);
//             $('#background-id').val(result.id);
//         }
//     })
// });

// Store
$(document).on('submit', '#background-form', function (e) {
    e.preventDefault();

    //Variables
    let action = $('#background-action').text();
    let id = $('#background-id').val();
    let url;

    let formData = new FormData(this);

    if (action == "Add") {
        url = "backgrounds";
    } else if (action == "Update") {
        url = "backgrounds/" + id;
        formData.append("_method", "PUT");
    }

    if (url !== '') {
        Swal.fire({
            title: 'Loading',
            timer: 60000,
            onBeforeOpen: () => {
                Swal.showLoading()
            }
        });

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#background-form')[0].reset();

                if (data.error == undefined) {
                    Swal.fire({
                            type: 'success',
                            title: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        .then(function () {
                            dataTable.ajax.reload();
                            $('#background-modal').modal('hide');
                        });
                } else {
                    Swal.fire({
                        type: 'error',
                        title: data.error,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
    }
});
