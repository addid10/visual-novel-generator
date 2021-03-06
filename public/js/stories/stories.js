let characterImage = '—',
    backgroundImage = '—',
    music = '—';

// CSRF 
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// DataTable
let dataTable = $('#stories-table').DataTable({
    "processing": true,
    "ajax": {
        url: "stories"
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
                return '<button type="button" class="btn btn-md btn-gradient-primary w-100 stories" id="' + buttonId + '">' +
                    'Stories</button>';
            }
        }
    ]
});


function listDialogue(id) {
    $.ajax({
        url: "stories/" + id,
        dataType: "json",
        success: function (stories) {
            $('#story-dialogues-table tbody').html('');
            $('#visual-novel-id').val(id);

            stories.data.forEach(function (result) {
                if (result.character_image !== null) {
                    characterImage = '<div class="character-image-sm"><img src="storage/' + result.character_image.image + '"></div>';
                } else {
                    characterImage = '—';
                }

                if (result.background !== null) {
                    backgroundImage = '<div class="bg-image-sm"><img src="storage/' + result.background.image + '"></div>'
                } else {
                    backgroundImage = '—';
                }

                if (result.music !== null) {
                    music = '<audio preload="auto" src="storage/' + result.music.music + '" id="' + result.music.name + '"></audio>' +
                        '<button class="btn btn-icon btn-gradient-success btn-rounded play-music" id="' + result.music.name + '">' +
                        '<span class="mdi mdi-play-circle"></span></button>';
                } else {
                    music = '—';
                }

                let story =
                    '<tr><td>' + result.dialogue_number + '</td>' +
                    '<td>' + characterImage + '</td>' +
                    '<td>' + result.dialogue + '</td>' +
                    '<td>' + backgroundImage + '</td>' +
                    '<td>' + music + '</td>' +
                    '<td>' +
                    '<button class="d-block btn btn-sm btn-gradient-warning btn-rounded w-100 update" id="' + result.id + '">Update</button>' +
                    '<button class="d-block btn btn-sm btn-gradient-danger btn-rounded w-100 mt-2 delete" id="' + result.id + '">Delete</button>' +
                    '</td></tr>';

                $('#story-dialogues-table tbody').append(story);
            })
        }
    })
}

//  Dialogue
$('#stories-table tbody').on('click', '.stories', function () {
    let id = $(this).attr("id");

    //  Show Modal 
    $('#stories-modal').modal('show');
    $('#stories-action').text('Add');

    //  Make data null 
    $('#characters').html('<option value="">—</option>');
    $('#backgrounds').html('<option value="">—</option>');
    $('#musics').html('<option value="">—</option>');

    listDialogue(id);

    // List of Characters 
    $.ajax({
        url: 'assets/characters-images',
        type: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function (data) {
            data.forEach(function (result) {
                let character = '<option value="' + result.id + '">' + result.image + '</option>';
                $('#characters').append(character);
            })
        }
    })

    //List Backgrounds
    $.ajax({
        url: 'assets/backgrounds/specific',
        type: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function (result) {
            if (result.data.backgrounds !== undefined) {
                result.data.backgrounds.forEach(function (result) {
                    let background = '<option value="' + result.id + '">' + result.name + '</option>';
                    $('#backgrounds').append(background);
                })
            }
        }
    })

    //List Musics
    $.ajax({
        url: 'assets/musics/specific',
        type: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function (result) {
            if (result.data.musics !== undefined) {
                result.data.musics.forEach(function (result) {
                    let music = '<option value="' + result.id + '">' + result.name + '</option>';
                    $('#musics').append(music);
                })
            }
        }
    })
});

//Edit
$('#story-dialogues-table tbody').on('click', '.update', function () {
    let id = $(this).attr('id');

    $.ajax({
        url: "stories/" + id + "/edit",
        dataType: "json",
        success: function (result) {
            $('#stories-action').text("Update");

            $('#dialogue-number').val(result.data.dialogue_number);
            $('#characters').val(result.data.character_image_id);
            $('#backgrounds').val(result.data.background_id);
            $('#musics').val(result.data.music_id);
            $('#dialogue').val(result.data.dialogue);
            $('#stories-id').val(result.data.id);

        }
    })
});

//DELETE THIS!
$('#story-dialogues-table tbody').on('click', '.delete', function () {
    let id = $(this).attr('id');
    let visualNovel = $('#visual-novel-id').val();

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
                url: "stories/" + id,
                type: 'DELETE',
                success: function () {
                    Swal.fire(
                            'Deleted!',
                            'This dialogue has been deleted!',
                            'success'
                        )
                        .then(function () {
                            listDialogue(visualNovel);
                        });
                }
            });
        }
    })
});


//Submit
$(document).on('submit', '#stories-form', function (e) {
    e.preventDefault();

    //Variables
    let id = $('#stories-id').val();
    let formData = new FormData(this);
    let action = $('#stories-action').text();
    let visualNovel = $('#visual-novel-id').val();
    let url;

    if (action == 'Add') {
        url = 'stories';
    } else if (action == 'Update') {
        url = 'stories/' + id;
        formData.append("_method", "PUT");
    }

    if (action !== '') {
        Swal.fire({
            title: 'Loading',
            timer: 3000,
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
                $('#stories-form')[0].reset();

                if (data.error == undefined) {
                    Swal.fire({
                            type: 'success',
                            title: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        .then(function () {
                            listDialogue(visualNovel);
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
$('#story-dialogues-table tbody').on('click', '.play-music', function () {
    let audioName = $(this).attr('id');
    let audio = document.getElementById(audioName);

    isPlaying(audio);

    audio.play();

    if (playing == false) {
        playing = true;
    } else {
        playing = false;
    }

});
