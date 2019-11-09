 // CSRF 
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 // DataTable
 let dataTable = $('#stories-table').DataTable({
     "processing": true,
     "ajax": {
         url: "stories"
     },
     "columns": [{
             data: 'title'
         },
         {
             data: 'user.name'
         },
         {
             sortable: false,
             "render": function (data, type, full, meta) {
                 let buttonId = full.id;
                 return '<button type="button" class="btn btn-md btn-gradient-primary w-100 stories" id="' + buttonId + '">' +
                     'Stories</button>';
             }
         }
     ]
 });

 //  Dialogue
 $('#stories-table tbody').on('click', '.stories', function () {
     let id = $(this).attr("id");

     //  Show Modal 
     $('#stories-modal').modal('show');
     $('#stories-action').text('Add');

     //  Make data null 
     $('#characters').html('');
     $('#story-dialogues-table tbody').html('');

     // List of Dialogue
     $.ajax({
         url: "stories/" + id,
         dataType: "json",
         success: function (stories) {
             console.log(stories);

             $('#visual-novel-id').val(id);

             stories.data.forEach(function (result) {
                 let story =
                     '<tr><td>' + result.dialogue_number + '</td>' +
                     '<td><div class="character-image-sm"><img src="storages/' + result.character_image.image + '" alt="character-image"></div></td>' +
                     '<td>' + result.dialogue + '</td>' +
                     '<td><div class="bg-image-sm"><img src="storages/' + result.background.image + '" alt="background-image"></div></td>' +
                     '<td><audio preload="auto" src="storages/' + result.music.music + '" id="' + result.music.name + '"></audio>' +
                     '<button class="btn btn-icon btn-gradient-success btn-rounded play-music" id="' + result.music.name + '">' +
                     '<span class="mdi mdi-play-circle"></span></button></td>' +
                     '<td>' +
                     '<button class="d-block btn btn-sm btn-gradient-warning btn-rounded w-100 update" id="' + result.id + '">Update</button>' +
                     '<button class="d-block btn btn-sm btn-gradient-danger btn-rounded w-100 mt-2 delete" id="' + result.id + '">Delete</button>' +
                     '</td></tr>';

                 $('#story-dialogues-table tbody').append(story);
             })
         }
     })

     // List of Characters 
     $(document).ready(function () {
         $.ajax({
             url: 'assets/characters-images',
             type: "GET",
             dataType: "json",
             success: function (characters) {
                 characters.data.forEach(function (result) {
                     let character = '<option value="' + result.id + '">' + result.image + '</option>';
                     $('#characters').append(character);
                 })
             }
         })
     });

     //List Backgrounds
     $.ajax({
         url: 'assets/backgrounds',
         type: "GET",
         dataType: "json",
         success: function (backgrounds) {
             backgrounds.data.forEach(function (result) {
                 let background = '<option value="' + result.id + '">' + result.name + '</option>';
                 $('#backgrounds').append(background);
             })
         }
     })

     //List Musics
     $.ajax({
         url: 'assets/musics',
         type: "GET",
         dataType: "json",
         success: function (musics) {
             musics.data.forEach(function (result) {
                 let music = '<option value="' + result.id + '">' + result.name + '</option>';
                 $('#musics').append(music);
             })
         }
     })
 });

 //Edit
 $('#stories-dialogues-table tbody').on('click', '.update', function () {
     let id = $(this).attr('id');

     $.ajax({
         url: "visual_novels/" + id + "/edit",
         dataType: "json",
         success: function (result) {
             console.log(result)
             $('#stories-action').text("Update");

             $('#dialogue-number').val(result.id);
             $('#characters').val(result.title);
             $('#backgrounds').val(result.synopsis);
             $('#musics').val(result.synopsis);
             $('#dialogue').val(result.synopsis);

         }
     })
 });


 $('#stories-dialogues-table tbody').on('click', '.delete', function () {
     let id = $(this).attr('id');

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
                     'Deleted!',
                     'This dialogue has been deleted!',
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


 //Submit
 $(document).on('submit', '#stories-form', function (e) {
     e.preventDefault();

     //Variables
     let id = $('#visual-novel-id').val();
     let formData = new FormData(this);
     let action = $('#stories-action').text();
     let url;

     if (action == 'Add') {
         url = 'stories';
     } else if (action == 'Update') {
         url = 'stories/' + id;
         formData.append("_method", "PUT");
     }

     if (id !== '') {
         Swal.fire({
             title: 'Loading',
             timer: 3000,
             onBeforeOpen: () => {
                 Swal.showLoading()
             }
         });

         $.ajax({
             url: url,
             type: "POST",
             data: formData,
             contentType: false,
             processData: false,
             success: function (data) {
                 $('#stories-form')[0].reset();

                 if (data.error == undefined) {
                     Swal.fire({
                             type: 'success',
                             title: data.success,
                             showConfirmButton: false,
                             timer: 1500
                         })
                         .then(function () {
                             dataTable.ajax.reload();
                             $('#stories-modal').modal('hide');
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
 $('#story-dialogues-table tbody').on('click', '.play-music', function () {
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
