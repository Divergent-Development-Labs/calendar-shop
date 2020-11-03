$(document).ready(function() {

    $(".customerCheck").keyup(function(){
        console.log('customer.js record checking calling');
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
                $('#updateBtn').prop('disabled', true);
                $(recordError).prop('hidden', false);
            }
            else{
                $(recordError).prop('hidden', true);
                $('#updateBtn').prop('disabled', false);
            }
            }
        });
        }
        else
        {
        $(recordError).html("");
        }
    });

    setTimeout(()=> {
        var customerName = $('#customerName').val();

        $('#dz').DataTable( {
            "processing": true,
            "serverSide": true,
            // "paging" : false,
            "buttons": true,
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'copy',
                    footer: true,
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'print',
                    footer: true,
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'colvis',
                    footer: true,
                }
            ],

            // "searching": false,
            "ajax": {
                "url": "ajax/loadCustomerData.php",
                "data": {
                    "name": customerName
                },                
            },
            columns: [
                {data: 'createdAt'},
                {data: 'ledgerId'},
                {data: 'invoiceId'},
                {data: 'bags'},
                {data: 'weight'},
                {data: 'oilContent'},
                {data: 'priceMethod'},
                {data: 'rate'},
                {data: 'unitRate'},
                {data: 'totalCost'},
                {data: 'paymentStatus'},
                {data: 'paymentDate'},
                {
                    data: 'action',
                    "orderable": false,
                    "order": [],
                }
            ],
            "fnInitComplete": function (oSettings, json) {
                amtCalc();
            }
        });

    }, 100);

} );


function amtCalc(){
    span = $('td span.totalCost');
    paymentSpan = $('td span.paymentStatus');

    var total=0, pending=0, paid=0, t1=0, t2=0;

    $(paymentSpan).each((p) => {
        // console.log($(span[p]).html());
        // console.log($(paymentSpan[p]).html())
        t1 = ($(paymentSpan[p]).html() != 'Paid') ? 0 : parseFloat($(span[p]).html());
        (paid = paid + t1);
    })

    // setTimeout(()=>{
        // console.log(span);
        // console.log(paid);

        $(span).each((e) => {
            t2 = parseFloat($(span[e]).html());

            (total = total + t2);
        });

        pending = (total - paid);
        console.log(total.toFixed(2), paid, pending);     
        $('#totalAmt').html('Rs. '+total.toFixed(2));
        $('#paidAmt').html('Rs. '+paid.toFixed(2));
        $('#pendingAmt').html('Rs. '+pending.toFixed(2));

    // },200);    
}

function doPayment(ledgerId){
    customerName = $('#customerName').val();

    console.log(switchElement = $(event.target));
    
    targetId = $(event.target).attr('id');
    
    paymentDateElement = $('#paymentDate'+targetId);

    paymentDate = $(paymentDateElement).val();

    console.log(state = $(switchElement).prop('checked'));

    paymentElement = $('#span'+targetId);

    console.log(ledgerId, customerName, $(paymentElement));

    console.log('doPayment calling');

    error = 2;

    if(ledgerId!="" && customerName!="")
    {

        var r = confirm("Are you sure to change the Payment Status?");

        if (r != true) {
            $(switchElement).prop('checked', !state);
            return false;
        }
        else{
            if(state == true){
                if($(paymentDateElement).val() == ''){
                    alert('Kindly Select Payment Date')
                    $(switchElement).prop('checked', !state);
                    return false;
                }
                else{
                    isPaid = true;
                }
            }
            else{
                isPaid = false;
                paymentDate = '';
            }    
        }


        $.ajax({
            url:"ajax/doPayment.php",
            method:"post",
            data:{
                ledgerId:ledgerId,
                customerName:customerName,
                paymentDate:paymentDate,
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
                        $(paymentElement).html('Pending');
                        $(paymentDateElement).val('');
                    }
                
                    amtCalc();
                }
                else{
                    alert('Someting went wrong 1');
                    $(switchElement).prop('checked', !state);
                    // $(paymentDateElement).val('');
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