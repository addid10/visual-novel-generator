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
                return '<audio preload="auto" src="../storages/' + music + '" id="' + name + '"></audio>' +
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
