// Browse 
$('#visual-novel-table tbody').on('click', '.characters', function () {
    let id = $(this).attr('id');

    $.ajax({
        url: "visual_novels/" + id + "/characters",
        dataType: "json",
        success: function (characters) {
            console.log(characters)
            $('#visual-novel-characters-modal').modal('show');
            $('#visual-novel-characters-table tbody').html('');


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
        // if (result.value) {
        //     $.ajax({
        //         url: "visual_novels/" + id,
        //         type: 'DELETE',
        //         success: function () {
        //             Swal.fire(
        //                     'Deleted!',
        //                     'Visual novel has been turned off',
        //                     'success'
        //                 )
        //                 .then(function () {
        //                     dataTable.ajax.reload();
        //                 });
        //         }
        //     });
        // }
    })
});
