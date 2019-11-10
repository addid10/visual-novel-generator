let audios = [];
let sceneNumber = parseInt($('#dialogue-number').val());
let characterName;
let characterImage;
let dialogue;
let bacgkround;


// Stop Other Music
function isPlaying(audelem) {
    let bool = !audelem.paused;

    if (bool == false) {
        $('audio').each(function () {
            this.pause(); // Stop playing
            this.currentTime = 0; // Reset time
        });
    }
}

function dialogue(id, number) {
    $.ajax({
        url: "GET",

    })
}


$(document).ready(function () {
    //GET AUDIO
    $.ajax({
        type: "GET",
        success: function (result) {
            result.data.forEach(function (result) {
                result.musics.forEach(function (result) {
                    audios[result.name] = document.getElementById(result.name);
                })
            })
        }
    })
})

$(document).on('click, keydown', '.')
