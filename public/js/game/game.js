// CSRF 
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let audios = [];
let sceneNumber = parseInt($('#dialogue-number').val());
let playing = true;
let audio, characterName, characterImage, background;

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

function nextDialogue(number) {
    $.ajax({
        type: "GET",
        url: "next",
        data: {
            number: number
        },
        success: function (data) {
            if (data.id !== undefined) {
                console.log(data)
                audio = audios[data.music.name];

                isPlaying(audio);

                audios[data.music.name].play();

                if (playing == false) {
                    playing = true;
                } else {
                    playing = false;
                }

                if (background !== data.background.image) {
                    $('.background').css('background-image', 'url(../../storages/' + data.background.image + ')');
                    background = data.background.image;
                }

                if (characterName !== data.character_image.character.nickname) {
                    $('#character-name').html('<span class="animated jackInTheBox delay-2s">' + data.character_image.character.nickname + '</span>');
                    characterName = data.character_image.character.nickname;
                }

                if (characterImage !== data.character_image.image) {
                    $('#character-faceclaim').html('<img class="animated fadeIn delay-2s mx-auto character-faceclaim" src="../../storages/' + data.character_image.image + '"> ');
                    characterImage = data.character_image.image;
                }

                $('#dialogue').text(data.dialogue);
                $('#dialogue-number').text(data.dialogue_number);
            }
        }
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

$(document).click(function () {
    nextDialogue(sceneNumber);
    sceneNumber++
});
