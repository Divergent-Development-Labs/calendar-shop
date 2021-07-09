$(document).ready(function() {

    let userId = $('#accountLink').attr('data');

    retrieveRecords(userId);

    $("#designSearchText").keyup(function() {
        var txt = $(this).val();
        recordError = $(this).next();
        retrieveRecords(txt);
    });

});

function removeOrder(id) {
    var con = confirm('Are you sure to Remove the item');

    if (con == false) {
        return false;
    }
    $.ajax({
        url: "./backend/removeOrder.php",
        method: "post",
        data: {
            removeItem: id,
            table: 'orders',
            field: 'id',
        },
        dataType: "json",
        success: function(data) {
            let userId = $('#accountLink').attr('data');
            retrieveRecords(userId);
        }
    });
}

function retrieveRecords(id) {

    listDiv = $('#orderList');
    orderFooter = $('#orderFooter');
    $(listDiv).html('');

    $.ajax({
        url: "./ajax/retrieveCarts.php",
        method: "post",
        data: {
            retriveTxt: id,
            table: 'orders',
            field: 'customer_id',
            retrieveFields: 'all'
        },
        dataType: "json",
        success: function(data) {
            if (data[0]) {
                let subtotal = 0,
                    total = 0,
                    cgst = 0,
                    sgst = 0,
                    temp = '',
                    temp2 = '',
                    i = 0,
                    quantity = 0,
                    payment_status = '';

                $(listDiv).html('');
                $(orderFooter).html('');

                data.forEach(element => {
                    i++;
                    payment_status = (element.payment_status == 'false') ? 'Unpaid' : 'Paid';

                    temp += '<tr class="woocommerce-order-form__order-item order_item" id="cRow' + i + '">\
                                <td class="product-sno" data-title="Sno">\
                                    <input disbaled hidden class="order_id" value=' + element.id + ' />\
                                    <a href="view-order.php?id=' + element.id + '" class="woocommerce-Price-amount amount"><bdi>' + i + '</bdi></a> </td>\
                                <td class="product-sno" data-title="Sno">\
                                    <a href="view-order.php?id=' + element.id + '" class="woocommerce-Price-amount amount"><bdi>' + element.id + '</bdi></a> </td>\
                                <td class="product-price" data-title="Price">\
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#x20B9; </span><span class="rate_input">' + element.subtotal.toFixed(2) + '</span></bdi></span> </td>\
                                <td class="product-price" data-title="Price">\
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#x20B9; </span><span class="rate_input">' + element.gst.toFixed(2) + '</span></bdi></span> </td>\
                                <td class="product-price" data-title="Price">\
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#x20B9; </span><span class="rate_input">' + element.total.toFixed(2) + '</span></bdi></span> </td>\
                                <td class="product-price" data-title="Payment Status">\
                                    <span class="woocommerce-Price-amount amount"><bdi>' + payment_status + '</bdi></span> </td></tr>';
                });

                $(listDiv).append(temp);
                $(orderFooter).append(temp2);

                let order_price = parseFloat(subtotal);
                $('#order_price').html(order_price.toFixed(2));

                // $(".toCCalc").off('click').on('click', doCalc);    

                // doCalc();

                $('#main').removeClass('d-none');
                $('#main-empty').addClass('d-none');
            } else {
                $('#main').addClass('d-none');
                $('#main-empty').removeClass('d-none');
                // $(listDiv).html('<span class="font-weight-bold mx-auto text-center">No Data Available</span>');
            }
        }
    });
}