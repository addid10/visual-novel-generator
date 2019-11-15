// CSRF 
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// DataTable
let dataTable = $('#music-table').DataTable({
    "processing": true,
    "ajax": {
        url: "musics"
    },
    "columns": [{
            data: 'name'
        },
        {
            sortable: false,
            "render": function (data, type, full, meta) {
                let music = full.music;
                let name = full.name;
                return '<audio preload="auto" src="../storage/' + music + '" id="' + name + '"></audio>' +
                    '<button class="btn btn-icon btn-gradient-danger btn-rounded play-music" value="' + name + '">' +
                    '<span class="mdi mdi-play-circle"></span></button>';
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

//Stop Others Musics
function isPlaying(audelem) {
    let bool = !audelem.paused;

    if (bool == false) {
        $('audio').each(function () {
            this.pause(); // Stop playing
            this.currentTime = 0; // Reset time
        });
    }
}

// Play Music
let playing = true;
$('#music-table tbody').on('click', '.play-music', function () {
    let audioName = $(this).val();
    let audio = document.getElementById(audioName);

    isPlaying(audio);

    audio.play();

    if (playing == false) {
        playing = true;
    } else {
        playing = false;
    }

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
$('#music-add').click(function () {
    $('#music-form')[0].reset();
    $('#music-title').text("Add music");
    $('#music-action').text("Add");
    $('#music').attr('required', '');
});

//Fetch datas for update
$('#music-table tbody').on('click', '.update', function () {
    let id = $(this).attr('id');
    let visualNovels = [];
    $.ajax({
        url: "musics/" + id + "/edit",
        dataType: "json",
        success: function (result) {
            $('#music-modal').modal('show');
            $('#music-title').text("Update music");
            $('#music-action').text("Update");

            result.visual_novels.forEach(function (visualNovel) {
                visualNovels.push(visualNovel.id);
            });


            $('#name').val(result.name);
            $('#visual-novels').val(visualNovels);
            $('#music-id').val(result.id);
            $('#music').removeAttr('required');
        }
    })
});

// Store
$(document).on('submit', '#music-form', function (e) {
    e.preventDefault();

    //Variables
    let action = $('#music-action').text();
    let id = $('#music-id').val();
    let url;

    let formData = new FormData(this);

    if (action == "Add") {
        url = "musics";
    } else if (action == "Update") {
        url = "musics/" + id;
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
                $('#music-form')[0].reset();

                if (data.error == undefined) {
                    Swal.fire({
                            type: 'success',
                            title: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        .then(function () {
                            dataTable.ajax.reload();
                            $('#music-modal').modal('hide');
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

// Delete music
$('#music-table tbody').on('click', '.delete', function () {
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
            Swal.fire({
                title: 'Loading',
                timer: 60000,
                onBeforeOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: "musics/" + id,
                type: 'DELETE',
                success: function () {
                    Swal.fire(
                            'Deleted.',
                            'Music successfully deleted!',
                            'success'
                        )
                        .then(function () {
                            dataTable.ajax.reload();
                        });
                }
            });
        }
    })
});
