// DataTable
let dataTable = $('#visual-novel-table').DataTable({
    "processing": true,
    "ajax": {
        url: "visual_novels/to-json"
    },
    "columns": [{
            data: 'title'
        },
        {
            data: 'user.name'
        },
        {
            sortable: false,
            "render": function (data, type, full, meta) {
                let buttonId = full.id;
                return '<button id="' + buttonId + '" class="d-block btn btn-sm btn-gradient-primary characters">Characters</button>' +
                    '<button id="' + buttonId + '" class="d-block mt-1 btn btn-sm btn-gradient-primary characters">Backgrounds</button>' +
                    '<button id="' + buttonId + '" class="d-block mt-1 btn btn-sm btn-gradient-primary characters">Musics</button>';
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

// When pressing the add button. 
$('#visual-novel-add').click(function () {
    $('#visual-novel-form')[0].reset();
    $('#visual-novel-title').text("Add visual novel datas");
    $('#visual-novel-action').text("Add");
});

// Calling all genre data! 
$(document).ready(function () {
    $.ajax({
        url: 'genres',
        type: "GET",
        dataType: "json",
        success: function (genres) {
            genres.data.forEach(function (result) {
                let genre = '<option value="' + result.id + '">' + result.name + '</option>';
                $('#genres').append(genre);
            })

        }
    })
});

//Fetch/show datas for update
$('#visual-novel-table tbody').on('click', '.update', function () {
    let id = $(this).attr('id');
    let genres = [];

    $.ajax({
        url: "visual_novels/" + id + "/edit",
        dataType: "json",
        success: function (result) {
            console.log(result)
            $('#visual-novel-modal').modal('show');
            $('#visual-novel-title').text("Update visual novel datas");
            $('#visual-novel-action').text("Update");


            result.genres.forEach(function (genre) {
                genres.push(genre.id);
            })

            $('#visual-novel-id').val(result.id);
            $('#title').val(result.title);
            $('#synopsis').val(result.synopsis);
            $('#genres').val(genres);

        }
    })
});

// Add & Update 
$(document).on('submit', '#visual-novel-form', function (e) {
    e.preventDefault();

    //Variables
    let action = $('#visual-novel-action').text();
    let id = $('#visual-novel-id').val();
    let url;

    let formData = new FormData(this);

    if (action == "Add") {
        url = "visual_novels"
    } else if (action == "Update") {
        url = "visual_novels/" + id
        formData.append("_method", "PUT");
    }

    if (url !== '') {
        Swal.fire({
            title: 'Loading',
            timer: 2000,
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
                $('#visual-novel-form')[0].reset();

                if (data.error == undefined) {
                    Swal.fire({
                            type: 'success',
                            title: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        .then(function () {
                            dataTable.ajax.reload();
                            $('#visual-novel-modal').modal('hide');
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


// Force delete!
$('#visual-novel-table tbody').on('click', '.delete', function () {
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
