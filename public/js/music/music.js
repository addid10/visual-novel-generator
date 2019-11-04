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
