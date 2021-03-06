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
let next = true;

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

function nextDialogue(number, callback) {
    if (next) {
        $.ajax({
            type: "GET",
            url: "next",
            data: {
                number: number
            },
            success: function (data) {
                if (data.id !== undefined) {
                    $('#story-id').val(data.id);

                    if (data.music !== null) {
                        audio = audios[data.music.name];
                        isPlaying(audio);

                        audios[data.music.name].play();
                    }

                    if (playing == false) {
                        playing = true;
                    } else {
                        playing = false;
                    }

                    if (data.background !== null) {
                        if (background !== data.background.image) {
                            $('.background').css('background-image', 'url(../../storage/' + data.background.image + ')');
                            background = data.background.image;
                        }
                    }

                    if (data.character_image !== null) {
                        if (characterName !== data.character_image.character.nickname) {
                            $('#character-name').html('<span class="animated jackInTheBox delay-2s">' + data.character_image.character.nickname + '</span>');
                            characterName = data.character_image.character.nickname;
                        }
                    } else {
                        $('#character-name').html('');
                    }

                    if (data.character_image !== null) {
                        if (characterImage !== data.character_image.image) {
                            $('#character-faceclaim').html('<img class="animated fadeIn delay-2s mx-auto character-faceclaim" src="../../storage/' + data.character_image.image + '"> ');
                            characterImage = data.character_image.image;
                        }
                    } else {
                        $('#character-faceclaim').html('');
                    }

                    $('#dialogue').text(data.dialogue);
                    $('#dialogue-number').text(data.dialogue_number);
                    callback();
                    next = true;
                } else {
                    $('#character-faceclaim').html('');
                    $('#character-name').html('Epilogue');
                    $('#dialogue').text('SELESAI');

                    next = false;

                    Swal.fire(
                        'Info!',
                        "VN successfully finished or VN don't have stories.<br>" + 
                        "(Admin) click <a href='../../stories'>this</a> to add story!",
                        'info'
                    )
                }
            }
        })

    }

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
    nextDialogue(sceneNumber, function () {
        sceneNumber++
    });
});

$('#start-game').click(function () {
    nextDialogue(sceneNumber, function () {
        $('.menu-position').css('display', 'none');
        sceneNumber++
    });

})

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
