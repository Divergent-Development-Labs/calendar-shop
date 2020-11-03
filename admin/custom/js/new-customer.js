function addSupplier(){
    // console.log(input);
    $('#addCustomerForm').addClass('was-validated');
    if(!$('#addCustomerForm')[0].checkValidity()){
        return false;
    }
}

$( document ).ready(function() {

    $(".customerCheck").keyup(function(){
        
        console.log('customers.js record checking calling');

        var txt = $(this).val();

        var field = $(this).attr('id');

        recordError = $(this).next();
        console.log(recordError, txt);

        if(txt!="")
        {
            $.ajax({
                url:"ajax/isRecordExist.php",
                method:"post",
                data:{
                searchTxt:txt,
                table: 'customer',
                field: field
                },
                dataType:"json",
                success:function(data)
                {
                if(data != 2){
                    $('#newCustomerSaveBtn').prop('disabled', true);
                    $(recordError).prop('hidden', false);
                }
                else{
                    $(recordError).prop('hidden', true);
                    $('#newCustomerSaveBtn').prop('disabled', false);
                }
                }
            });
        }
        else
        {
            $(recordError).prop('hidden', true);
        }
    });

});
