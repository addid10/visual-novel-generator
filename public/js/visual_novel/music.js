// Browse 
$('#visual-novel-table tbody').on('click', '.musics', function () {
    let id = $(this).attr('id');

    $('#visual-novel-musics-modal').modal('show');
    $('#visual-novel-musics-table tbody').html('');

    $.ajax({
        url: "visual-novels/" + id + "/musics",
        dataType: "json",
        success: function (result) {

            result.data.musics.forEach(function (data) {
                let musics =
                    '<tr>' +
                    '<td>' + data.id + '</td>' +
                    '<td>' + data.name + '</td>' +
                    '<td><audio preload="auto" src="storage/' + data.music + '" id="' + data.name + '"></audio>' +
                    '<button class="btn btn-icon btn-gradient-success btn-rounded play-music" id="' + data.name + '">' +
                    '<span class="mdi mdi-play-circle"></span></button></div>' +
                    '</tr>';

                $('#visual-novel-musics-table tbody').append(musics);
            })

        }
    })
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
$('#visual-novel-musics-table tbody').on('click', '.play-music', function () {
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
