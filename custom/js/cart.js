$(document).ready(function() {

    let userId = $('#accountLink').attr('data');

    retrieveRecords(userId);

    $("#designSearchText").keyup(function() {
        console.log('cart.js record retrieve calling');
        var txt = $(this).val();

        recordError = $(this).next();
        console.log(recordError, txt);

        retrieveRecords(txt);
    });

});

function removeCart(id, e) {
    e.preventDefault();

    if (!confirm('Are you sure to Remove the item')) {
        return false;
    }

    console.log(id);
    $.ajax({
        url: "backend/removeCart.php",
        method: "post",
        data: {
            removeItem: id,
            table: 'carts',
            field: 'id',
        },
        dataType: "json",
        success: function(data) {
            console.log(data);
            let userId = $('#accountLink').attr('data');
            retrieveRecords(userId);
        }
    });
}

function retrieveRecords(id) {
    console.log('cart.js record retrieve calling');

    listDiv = $('#cartList');
    cartFooter = $('#cartFooter');
    $(listDiv).html('');

    $.ajax({
        url: "./ajax/retrieveCarts.php",
        method: "post",
        data: {
            retriveTxt: id,
            table: 'carts',
            field: 'customer',
            retrieveFields: 'all'
        },
        dataType: "json",
        success: function(data) {
            console.log(data);
            console.log(data.length);
            if (data[0]) {
                let subtotal = 0,
                    total = 0,
                    cgst = 0,
                    sgst = 0,
                    temp = '',
                    temp2 = '',
                    i = 0,
                    quantity = 0;

                $(listDiv).html('');
                $(cartFooter).html('');

                data.forEach(element => {

                    let cost = element.rate * element.quantity;
                    quantity += element.quantity;
                    subtotal += parseFloat(cost);
                    i++;

                    temp += '<tr class="woocommerce-cart-form__cart-item cart_item" id="cRow' + i + '">\
                                <td class="product-sno" data-title="Sno">\
                                    <input disbaled hidden class="cart_id" value=' + element.id + ' />\
                                    <span class="woocommerce-Price-amount amount"><bdi>' + i + '</bdi></span> </td>';

                    if (element.is_custom_design == 'true') {
                        temp += '<td class="product-thumbnail">\
                                    <input disbaled hidden class="is_custom_design" value=' + element.is_custom_design + ' />\
                                    <a target="_blank" href="' + element.design + '"><img width="255" style="height: 620px !impotant;" src="' + element.design + '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" data=' + element.design + ' loading="lazy"></a> </td>';
                    } else {
                        temp += '<td class="product-thumbnail">\
                                    <input disbaled hidden class="is_custom_design" value=' + element.is_custom_design + ' />\
                                    <a target="_blank" href="https://drive.google.com/file/d/' + element.design + '/view?usp=sharing"><img width="255" style="height: 620px !impotant;" src="https://drive.google.com/uc?export=view&id=' + element.design + '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" data=' + element.design + ' loading="lazy"></a> </td>';
                    }

                    temp += '<td class="product-name" data-title="Product">\
                                <span >' + element.calendar_type + '</span> </td>\
                            <td class="product-name" data-title="Size">\
                                <span class="woocommerce-Price-amount amount"><bdi>' + element.size + '</bdi></span> </td>\
                            <td class="product-price" data-title="Price">\
                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#x20B9; </span><span class="rate_input">' + element.rate.toFixed(2) + '</span></bdi></span> </td>\
                            <td class="product-quantity" data-title="Quantity">\
                                <div class="quantity">\
                                    <label class="screen-reader-text" for="quantity_5fa6b7bd6dbea">Calendar Quantity</label>\
                                    <div class="styled-number"><a type="button" class="arrow-down incrementor toCCalc" data-increment="down"><span class="dashicons dashicons-minus"></span></a><input type="number" id="quantity_' + element.id + '" class="input-text qty text" step="1" min="0" max="" name="cart' + element.id + 'qty" value="' + element.quantity + '" title="Qty" size="4" placeholder="" inputmode="numeric"><a type="button" class="arrow-up incrementor toCCalc" data-increment="up"><span class="dashicons dashicons-plus"></span></a></div>\
                                </div>\
                            </td>';

                    temp += '<td class="product-subtotal" data-title="Subtotal">\
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#x20B9; </span><span class="cost_input">' + cost.toFixed(2) + '</span></bdi></span> </td>\
                            <td class="product-remove">';
                    temp += `<a type="button" onclick='removeCart("${element.id}", event)' class="remove" aria-label="Remove this item" data-product_id="62" data-product_sku="">×</a> </td>\
                            </tr>`;
                });

                temp2 += '<tr>\
                                <td colspan="8" class="actions text-md-right">\
                                    <button type="submit" class="button alignright" name="update_cart" id="update_cart" value="Update cart" disabled="" aria-disabled="true">Update cart</button>\
                                </td>\
                            </tr>';

                $(listDiv).append(temp);
                $(cartFooter).append(temp2);

                let cart_price = parseFloat(subtotal);
                $('#cart_price').html(cart_price.toFixed(2));

                $(".toCCalc").off('click').on('click', doCalc);

                doCalc();

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

var getCInput = (ele) => {
    var inputs = {
        cart_id: ele.children().eq(0).find('input.cart_id').val(),
        rate: ele.children().eq(4).find('span.rate_input').html(),
        quantity: ele.children().eq(5).find('input.qty').val(),
        cost: ele.children().eq(6).find('span.cost_input').html(),

        setOutput: (cost) => {
            //   console.log('print : ' + unitRate, totalCost)
            if (cost != NaN) {
                return;
            }
            ele.children().eq(6).find('span.cost_input').html(cost.toFixed(2))
        }
    }

    var returnInput = { setOutput: inputs.setOutput, cart_id: inputs.cart_id };

    Object.keys(inputs).forEach(key => {
        if (['setOutput', 'cart_id'].indexOf(key) == -1) {
            returnInput[key] = inputs[key] == "" ? 0 : parseFloat(inputs[key]).toFixed(2);
        }
    });

    return returnInput;
}

var getOInput = (ele) => {
    var inputs = {
        calendar_type: ele.children().eq(2).find('span').html(),
        size: ele.children().eq(3).find('bdi').html(),
        is_custom_design: ele.children().eq(1).find('input.is_custom_design').val(),
        design: ele.children().eq(1).find('img').attr('data'),
        rate: ele.children().eq(4).find('span.rate_input').html(),
        quantity: ele.children().eq(5).find('input.qty').val(),
        cost: ele.children().eq(6).find('span.cost_input').html(),

        setOutput: (cost) => {
            //   console.log('print : ' + unitRate, totalCost)
            if (cost != NaN) {
                return;
            }
            ele.children().eq(6).find('span.cost_input').html(cost.toFixed(2))
        }
    }

    var returnInput = { setOutput: inputs.setOutput, calendar_type: inputs.calendar_type, size: inputs.size, is_custom_design: inputs.is_custom_design, design: inputs.design };

    Object.keys(inputs).forEach(key => {
        if (['setOutput', 'calendar_type', 'size', 'is_custom_design', 'design'].indexOf(key) == -1) {
            returnInput[key] = inputs[key] == "" ? 0 : parseFloat(inputs[key]).toFixed(2);
        }
    });

    return returnInput;
}

function doCalc() {
    console.log(this);
    console.log($(this).attr('data-increment'));

    if ($(this).attr('data-increment')) {

        let operation = $(this).attr('data-increment');

        const d = $(this).parent().parent().parent().parent();

        var inputs = getCInput(d);
        var orderInputs = getOInput(d);

        if (operation == 'down') {
            console.log(--inputs.quantity);
        } else {
            console.log(++inputs.quantity);
        }

        if (inputs.quantity < 1) {
            inputs.quantity = 1;
        }

        var r = inputs.rate;
        var q = inputs.quantity;

        var c = 0;

        ce = $(d).find('.cost_input');
        qe = $(d).find('input.qty').val(q);
        c = parseFloat(r * q).toFixed(2);

        $(ce).html(c);

        // inputs.setOutput(c);   
        // orderInputs.setOutput(c);

        $('#update_cart').prop('disabled', false);
        $('.make_order').prop('disabled', true);
    }

    doTotalCalc();
}

function doTotalCalc() {

    console.log('doTotalCalc called');

    var i = 1;
    var len = $('#cartList').find('tr').length;
    console.log('p table length : ' + len);

    var c = 0,
        d = 0,
        q = 0,
        f = 0,
        g = 0,
        h = 0;
    f = len;
    for (; i <= len; i++) {

        if ($('#cartList').find('#cRow' + i)) {
            const parentRow = $('#cartList').find('#cRow' + i);
            var inputs = getCInput(parentRow);
            q += parseFloat(inputs.quantity);
            c += parseFloat(inputs.cost);
        } else {
            q = 0;
            c = 0;
        }

    }

    setPurchaseData();

    setTimeout(() => {
        g = parseFloat((c * 12) / 100);
        d = parseFloat(g / 2);
        h = parseFloat(c + g);

        $('#subtotalCost').html(parseFloat(c).toFixed(2));
        $('#cgstCost').html(parseFloat(d).toFixed(2));
        $('#sgstCost').html(parseFloat(d).toFixed(2));
        $('#totalCost').html(parseFloat(h).toFixed(2));

        let totalPurchaseData = {};
        totalPurchaseData.totalQuantity = q.toFixed(2);
        totalPurchaseData.subtotalCost = c.toFixed(2);
        totalPurchaseData.gst = g.toFixed(2);
        totalPurchaseData.totalCost = h.toFixed(2);

        console.log('totalOrderData : ' + JSON.stringify(totalPurchaseData));
        $('#totalOrderData').val(JSON.stringify(totalPurchaseData));
    }, 200)
}

function setPurchaseData() {
    var cart = [];
    var order = [];

    setTimeout(() => {
            $.each($('#cartList').children(), function(k, ele) {
                cart.push(getCInput($(ele)));
                order.push(getOInput($(ele)));
            })

            var len = cart.length;

            var cartData = JSON.stringify(cart);
            var orderData = JSON.stringify(order);

            $('#cartData').val(cartData);
            $('#orderData').val(orderData);

        }, 100) //.1s
}