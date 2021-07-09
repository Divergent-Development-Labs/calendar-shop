$(document).ready(function() {

    let profile_id = ($('#profileId').attr('value'));
    if (!profile_id) {
        profile_id = 'all';
    }

    $('#dz').DataTable({

        "processing": true,
        "serverSide": true,
        "buttons": true,
        dom: 'Blfrtip',
        buttons: [{
                extend: 'copy',
                footer: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            },
            {
                extend: 'print',
                footer: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            },
            {
                extend: 'colvis',
                footer: true,
            }
        ],

        "searching": true,
        "ajax": ({
            url: "ajax/loadOrderData.php",
            method: "get",
            data: {
                customer_id: profile_id
            },
            dataType: "json",
        }),
        columns: [{
                data: 'id'
            },
            {
                data: 'customer_id'
            },
            {
                data: 'subtotal'
            },
            {
                data: 'gst'
            },
            {
                data: 'total'
            },
            {
                data: 'order_date'
            },
            {
                data: 'payment_status'
            },
            {
                data: 'action',
                "orderable": false,
            }
        ]
    });

});

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