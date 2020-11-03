function editRow(e){
    // console.log('editRow called' + $(e).attr('data-content'));
    // console.log('editRow called' + $(e).attr('rate'));
    let rate = $(e).attr('rate')
    let content = 'update-size.php?id='+$(e).attr('data-content');

    $('#updateRateInput').val(rate);
    $('#editSizeForm').prop('action', content);
}

$( document ).ready(function() {

    $("#newSizeWidth, #newSizeHeight").keyup(function(){
        
        console.log('design.js record checking calling');
        console.log($('#newSizeHeight').val());

        sizeWidth = ($('#newSizeWidth').val() == '') ? 0 : $('#newSizeWidth').val();
        sizeHeight = ($('#newSizeHeight').val() == '') ? 0 : $('#newSizeHeight').val();
        
        
        sizeLabelElement = $('#newSizeLabel');

        recordError = $(sizeLabelElement).next();

        var txt = sizeWidth+'"x'+sizeHeight+'"';
        $(sizeLabelElement).val(txt);

        console.log(recordError, txt);

        if(txt!="")
        {
        $.ajax({
            url:"ajax/isRecordExist.php",
            method:"post",
            data:{
            searchTxt:txt,
            table: 'size',
            field: 'size_label'
            },
            dataType:"json",
            success:function(data)
            {
            if(data != 2){
                $('#newSizeSaveBtn').prop('disabled', true);
                $(recordError).html('Size already Exist.!!');
            }
            else{
                $(recordError).html('');
                $('#newSizeSaveBtn').prop('disabled', false);
            }
            }
        });
        }
        else
        {
        $(recordError).html("");
        }
    });

    $('#dz').DataTable( {
        "processing": true,
        "buttons": true,
        dom: 'Brlftip',
        buttons: [
            {
                extend: 'copy',
                footer: true,
                exportOptions: {
                    columns: [0,1,2]
                }
            },
            {
                extend: 'print',
                footer: true,
                exportOptions: {
                    columns: [0,1,2]
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
