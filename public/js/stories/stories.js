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

             $('#visual-novel-id').val(id);

             stories.data.forEach(function (result) {
                 let story =
                     '<tr><td>1</td>' +
                     '<td><div class="character-image-sm"><img src="" alt="character-image"></div></td>' +
                     '<td>Konsultasi Pra-Proposal</td>' +
                     '<td><div class="bg-image-sm"><img src="" alt="background-image"></div></td>' +
                     '<td><button class="btn btn-icon btn-gradient-success btn-rounded">' +
                     '<span class="mdi mdi-play-circle"></span></button></td>' +
                     '<td>' +
                     '<button class="d-block btn btn-sm btn-gradient-warning btn-rounded w-100 update">Update</button>' +
                     '<button class="d-block btn btn-sm btn-gradient-danger btn-rounded w-100 mt-2 delete">Delete</button>' +
                     '</td></tr>';

                 $('#story-dialogues-table tbody').append(story);
             })
         }
     })

     //List Characters
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
 $('#stories-table tbody').on('click', '.update', function () {
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
