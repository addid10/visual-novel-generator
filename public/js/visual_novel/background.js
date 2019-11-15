// Browse 
$('#visual-novel-table tbody').on('click', '.backgrounds', function () {
    let id = $(this).attr('id');

    $('#visual-novel-backgrounds-modal').modal('show');
    $('#visual-novel-backgrounds-table tbody').html('');

    $.ajax({
        url: "visual-novels/" + id + "/backgrounds",
        dataType: "json",
        success: function (result) {

            result.data.backgrounds.forEach(function (data) {
                let background =
                    '<tr>' +
                    '<td>' + data.id + '</td>' +
                    '<td>' + data.name + '</td>' +
                    '<td><div class="bg-image-sm"><img src="storage/' + data.image + '"></div>' +
                    '</tr>';

                $('#visual-novel-backgrounds-table tbody').append(background);
            })

        }
    })
});
