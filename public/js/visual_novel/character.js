// Browse 
$('#visual-novel-table tbody').on('click', '.characters', function () {
    let id = $(this).attr('id');

    $('#visual-novel-characters-modal').modal('show');
    $('#visual-novel-characters-table tbody').html('');

    $.ajax({
        url: "visual-novels/" + id + "/characters",
        dataType: "json",
        success: function (characters) {

            $('#visual-novel-character-id').val(id);

            characters.data.forEach(function (result) {
                let character =
                    '<tr>' +
                    '<td>' + result.character.fullname + '</td>' +
                    '<td><div class="character-image-sm"><img src="storages/' + result.character.characters_images[0].image + '"></div>' +
                    '<td>' + result.character_role.name + '</td>' +
                    '<td><button id="' + result.id + '" class="btn btn-icon btn-gradient-danger btn-rounded delete">' +
                    '<span class="mdi mdi-close-circle"></span>' +
                    '</button></td>' +
                    '</tr>';

                $('#visual-novel-characters-table tbody').append(character);
            })

        }
    })
});

// List of Characters 
$(document).ready(function () {
    $.ajax({
        url: 'assets/characters',
        type: "GET",
        dataType: "json",
        success: function (characters) {
            characters.data.forEach(function (result) {
                let character = '<option value="' + result.id + '">' + result.fullname + '</option>';
                $('#characters').append(character);
            })
        }
    })
});

//Submit
$(document).on('submit', '#visual-novel-characters-form', function (e) {
    e.preventDefault();

    //Variables
    let id = $('#visual-novel-character-id').val();
    let formData = new FormData(this);

    if (id !== '') {
        Swal.fire({
            title: 'Loading',
            timer: 3000,
            onBeforeOpen: () => {
                Swal.showLoading()
            }
        });

        $.ajax({
            url: "visual-novels/characters",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#visual-novel-characters-form')[0].reset();

                if (data.error == undefined) {
                    Swal.fire({
                            type: 'success',
                            title: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        .then(function () {
                            dataTable.ajax.reload();
                            $('#visual-novel-characters-modal').modal('hide');
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

// Delete 
$('#visual-novel-characters-table tbody').on('click', '.delete', function () {
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
            $.ajax({
                url: "visual-novels/characters/" + id,
                type: 'DELETE',
                success: function () {
                    Swal.fire(
                            'Deleted!',
                            'This character has been deleted!',
                            'success'
                        )
                        .then(function () {
                            dataTable.ajax.reload();
                            $('#visual-novel-characters-modal').modal('hide');
                        });
                }
            });
        }
    })
});
