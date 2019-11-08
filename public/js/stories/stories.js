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
