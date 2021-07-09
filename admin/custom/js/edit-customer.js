$(document).ready(function() {

    $(".customerCheck").keyup(function() {
        var txt = $(this).val();

        var field = $(this).attr('id');

        recordError = $(this).next();

        if (txt != "") {
            $.ajax({
                url: "ajax/isRecordExist.php",
                method: "post",
                data: {
                    searchTxt: txt,
                    table: 'customer',
                    field: field
                },
                dataType: "json",
                success: function(data) {
                    if (data != 2) {
                        $('#updateBtn').prop('disabled', true);
                        $(recordError).prop('hidden', false);
                    } else {
                        $(recordError).prop('hidden', true);
                        $('#updateBtn').prop('disabled', false);
                    }
                }
            });
        } else {
            $(recordError).html("");
        }
    });

    setTimeout(() => {
        amtCalc();
    }, 100);

});


function amtCalc() {
    span = $('td span.totalCost');
    paymentSpan = $('td span.paymentStatus');

    var total = 0,
        pending = 0,
        paid = 0,
        t1 = 0,
        t2 = 0;

    $(paymentSpan).each((p) => {
        t1 = ($(paymentSpan[p]).html() != 'Paid') ? 0 : parseFloat($(span[p]).html());
        (paid = paid + t1);
    })

    $(span).each((e) => {
        t2 = parseFloat($(span[e]).html());

        (total = total + t2);
    });

    pending = (total - paid);
    $('#totalAmt').html('Rs. ' + total.toFixed(2));
    $('#paidAmt').html('Rs. ' + paid.toFixed(2));
    $('#pendingAmt').html('Rs. ' + pending.toFixed(2));
}

function doPayment(orderId) {

    switchElement = $(event.target);
    targetId = $(event.target).attr('id');
    state = $(switchElement).prop('checked');
    paymentElement = $('#span' + targetId);
    error = 2;

    if (orderId != "") {

        var r = confirm("Are you sure to change the Payment Status?");

        if (r != true) {
            $(switchElement).prop('checked', !state);
            return false;
        } else {
            if (state == true) {
                isPaid = true;
            } else {
                isPaid = false;
            }
        }


        $.ajax({
            url: "ajax/doPayment.php",
            method: "post",
            data: {
                orderId: orderId,
                isPaid: isPaid,
            },
            dataType: "json",
            success: function(data) {
                if (data && data == 1) {
                    alert('Payment Status changed');
                    if (state == true) {
                        $(paymentElement).html('Paid');
                    } else {
                        $(paymentElement).html('Unpaid');
                    }
                    amtCalc();
                } else {
                    alert('Someting went wrong 1');
                    $(switchElement).prop('checked', !state);
                    error = 1;
                }
            }
        });

    } else {
        alert('Something went wrong..!');
        error = 1;
        $(switchElement).prop('checked', !state);
    }

}