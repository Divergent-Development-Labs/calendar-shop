$( document ).ready(function() {

    $('#dz').DataTable( {
        "processing": true,
        "buttons": true,
        dom: 'Brlftip',
        buttons: [
            {
                extend: 'copy',
                footer: true,
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                }
            },
            {
                extend: 'print',
                footer: true,
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                }
            },
            {
                extend: 'colvis',
                footer: true,
            }
        ],

        "searching": true    
    });

});
