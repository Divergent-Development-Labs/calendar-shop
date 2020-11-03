function doPayment(orderId){

    console.log(switchElement = $(event.target));
    
    targetId = $(event.target).attr('id');
    
    console.log(state = $(switchElement).prop('checked'));

    paymentElement = $('#span'+targetId);

    console.log(orderId, $(paymentElement));

    console.log('doPayment calling');

    error = 2;

    if(orderId!="")
    {

        var r = confirm("Are you sure to change the Payment Status?");

        if (r != true) {
            $(switchElement).prop('checked', !state);
            return false;
        }
        else{
            if(state == true){
                    isPaid = true;
            }
            else{
                isPaid = false;
            }    
        }


        $.ajax({
            url:"ajax/doPayment.php",
            method:"post",
            data:{
                orderId:orderId,
                isPaid: isPaid,
            },
            dataType:"json",
            success:function(data)
            {
                console.log((data));
                if(data && data == 1){
                    alert('Payment Status changed');
                    if(state == true){
                        $(paymentElement).html('Paid');
                    }
                    else{
                        $(paymentElement).html('Unpaid');
                    }
                
                }
                else{
                    alert('Someting went wrong 1');
                    $(switchElement).prop('checked', !state);
                    error = 1;
                }
            }
        });

    }   
    else
    {
        alert('Something went wrong..!');
        error = 1;
        $(switchElement).prop('checked', !state);
    }
}