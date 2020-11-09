$(document).ready(function() {

    let userId = $('#accountLink').attr('data');

    retrieveRecords(userId);
    
    $("#designSearchText").keyup(function(){
        console.log('design.js record retrieve calling');
        var txt = $(this).val();

        recordError = $(this).next();
        console.log(recordError, txt);

        retrieveRecords(txt);
    });
});

function retrieveRecords(id){
    console.log('design.js record retrieve calling');

    listDiv = $('#cartList');
    $(listDiv).html('');

    $.ajax({
        url:"admin/ajax/retrieveRecords.php",
        method:"post",
        data:{
        retriveTxt:id,
        table: 'carts',
        field: 'id',
        retrieveFields: 'all'
        },
        dataType:"json",
        success:function(data)
        {
            console.log(data);
            console.log(data.length);
            if(data[0]){
                data.forEach(element => {
                    let temp = '<tr>';
                    
                    temp += '<td>'+element.size+'</td>';
                    
                    temp += '</tr>';
                    
                    $(listDiv).append(temp);                        
                });
            }
            else{
                $(listDiv).html('<span class="font-weight-bold mx-auto text-center">No Data Available</span>');
            }
        }
    });
}