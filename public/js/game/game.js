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
                $('#story-id').val(data.id);

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

$('.background').click(function () {
    nextDialogue(sceneNumber);
    sceneNumber++
});

// Save

$('#save-form').submit(function (e) {
    e.preventDefault();

    let url = $(this).attr('action');
    let formData = new FormData(this);

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.error == undefined) {
                Swal.fire({
                    type: 'success',
                    title: data.success,
                    showConfirmButton: false,
                    timer: 1500
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
    })
})
