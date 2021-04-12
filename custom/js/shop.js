$(window).on('load', function() {
    // code here
    console.log('shop.js record retrieve calling');
    var txt = '';
    let size = $('#size_menu').find('option:selected').text();
    let type = $('#calendar_type_menu').val();
    let rate = $('#size_menu').find('option:selected').val();

    console.log(txt, type, size, rate);

    retrieveDesignRecords(txt, type, size, rate);

});

$(document).ready(function() {

    let userId = $('#accountLink').attr('data');

    console.log(userId);

    $("#designSearchText").keyup(function() {
        console.log('shop.js record retrieve calling');
        var txt = $(this).val();
        let size = $('#size_menu').find('option:selected').text();
        let type = $('#calendar_type_menu').val();
        let rate = $('#size_menu').find('option:selected').val();

        recordError = $(this).next();
        console.log(recordError, txt, type, size, rate);

        retrieveDesignRecords(txt, type, size, rate);
    });

    $(".design-tab").off('click').on('click', designTabSelection);

});

function designTabSelection() {
    console.log($(this));
    var designTab = $(this).attr('data');
    if (designTab == 'custom') {
        $('#custom-counts').removeClass('d-none');
        $('#design-counts').addClass('d-none');
    } else {
        $('#design-counts').removeClass('d-none');
        $('#custom-counts').addClass('d-none');
    }
    console.log($(this).attr('data'));
    console.log(designTab);
}

function retrieveDesignRecords(txt, type, size, rate) {
    console.log('design.js record retrieve calling');

    listDiv = $('#designsList');
    designCounts = $('#design-counts');
    customCounts = $('#custom-counts');
    totalCounts = $('#total-counts');
    customListDiv = $('#customDesignsList');

    let count1 = 0,
        count2 = 0;

    $(listDiv).html('');
    $(customListDiv).html('');

    $.ajax({
        url: "admin/ajax/retrieveRecords.php",
        method: "post",
        data: {
            retriveTxt: txt,
            table: 'design',
            field: 'name',
            retrieveFields: 'all'
        },
        dataType: "json",
        success: function(data) {
            let userId = $('#accountLink').attr('data');

            console.log(userId);

            console.log('userId : ' + userId);
            console.log(data);
            console.log(data.length);
            if (data[0]) {
                data.forEach(element => {
                    if (element.user_id == 0 || element.user_id == userId) {
                        let temp = '<li class="zoom border p-0 mx-md-2 mx-lg-3 shadow-sm col-sm-6 col-12 col-md-6 col-lg-5 col-xl-5 mr-md-2 product type-product post-62 status-publish instock product_cat-shirts product_cat-trends product_tag-amari product_tag-shirt has-post-thumbnail taxable shipping-taxable purchasable product-type-simple">';

                        if (element.is_custom_design == 'true') {
                            temp += '<a href="' + element.design_link + '" target="_blank" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">\
                                    <!-- <span class="onsale">Sale!</span> -->\
                                    <img style="width:100% !important; height:289.875px !important;" src="' + element.design_link + '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">\
                                    <h4 class="mx-2 my-custom-wrap woocommerce-loop-product__title text-capitalize product_name">' + element.name + '</h4></a>';
                            count1++;
                        } else {
                            temp += '<a href="https://drive.google.com/file/d/' + element.design_link + '/view?usp=sharing" target="_blank" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">\
                                    <!-- <span class="onsale">Sale!</span> -->\
                                    <img style="width:100% !important; height:289.875px !important;" src="https://drive.google.com/uc?export=view&id=' + element.design_link + '" class=" attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">\
                                    <h4 class="mx-2 my-custom-wrap woocommerce-loop-product__title text-capitalize product_name">' + element.name + '</h4></a>';
                            count2++;
                        }
                        if (type) {
                            temp += '<span class="font-weight-bold"><span class="woocommerce-Price-amount amount"><bdi class="product_type">' + type + '</bdi></span></span><br>';
                        }
                        if (size) {
                            temp += '<div class="d-flex p-3"><div class="w-50"><span class="font-weight-bold"><span class="woocommerce-Price-amount amount"><bdi class="product_size">' + size + '</bdi></span></span><br>';
                        }
                        if (rate) {
                            temp += '<span class="font-weight-bold"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#x20B9;	</span><span class="product_rate">' + rate + '</span></bdi></span></span></div><br>';
                            temp += '<div class="align-self-center"><a type="button" data-quantity="1" onclick="addToCart(\'' + element.id + '\',\'' + element.name + '\',\'' + element.is_custom_design + '\',\'' + element.design_link + '\',\'' + type + '\',\'' + rate + '\')" id="add-btn-' + element.id + '" class=" product_type_simple add_to_cart_button ajax_add_to_cartz" data-product_size=' + size + ' data-product_sku="" aria-label="Add &ldquo; ' + element.name + '&rdquo; to your cart" rel="nofollow"><span class="fa fa-shopping-cart"></span> Add to cart</a></div></div>\
                            </li>';
                        }

                        if (element.is_custom_design == 'true') {
                            $(customListDiv).append(temp);
                        } else {
                            $(listDiv).append(temp);
                        }
                    }
                });

                $(customCounts).html(count1);
                $(designCounts).html(count2);
                $(totalCounts).html(count2 + count1);
                console.log(count1, count2);
            } else {
                if (count2 == 0) {
                    $(listDiv).html('<span class="font-weight-bold mx-auto text-center">No Data Available</span>');
                }
                if (count1 == 0) {
                    $(customListDiv).html('<span class="font-weight-bold mx-auto text-center">No Data Available</span>');
                }
            }
        }
    });
}

function selectSize(e, rate) {
    let size = $(e.target).text();
    let txt = $('#designSearchText').val();
    let type = $('#calendar_type_menu').val();

    if (type == '') {
        alert('Calendar Type required');
        return;
    }

    console.log(txt, type, size, rate);
    retrieveDesignRecords(txt, type, size, rate);
}

function selectCalendarType(e) {
    let type = $(e.target).val();
    let txt = $('#designSearchText').val();
    let size = $('#size_menu').find('option:selected').text();
    let rate = '';

    if (size == '') {
        alert('Calendar Size required');
        return;
    } else {
        rate = $('#size_menu').find('option:selected').val();
    }
    console.log(txt, type, size, rate);
    retrieveDesignRecords(txt, type, size, rate);
}

function addToCart(design_id, design_name, is_custom_design, design_link, type, rate) {
    let userId = $('#accountLink').attr('data');

    if (userId) {

        var id = '#add-btn-' + design_id;

        $(id).removeClass('added');
        $(id).addClass('loading');

        console.log(id);
        var size = $(id).attr('data-product_size');
        console.log(design_name, design_link, type, size, rate);
        console.log(id);

        $.ajax({
            url: "backend/insert-cart-backend.php",
            method: "post",
            data: {
                design_name: design_name,
                is_custom_design: is_custom_design,
                design_link: design_link,
                type: type,
                size: size,
                rate: rate,
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data == '1') {
                    setTimeout(() => {
                        $(id).removeClass('loading');
                        $(id).addClass('added');

                        let cart_price = parseFloat($('#cart_price').html()) + parseFloat(rate);
                        $('#cart_price').html(cart_price.toFixed(2));
                    }, 100)
                } else {
                    // $(id).removeClass('added');    
                    $(id).removeClass('loading');
                    console.log('Something error ' + data);
                }
            }
        });
    } else {
        var con = confirm('Kindly Login into your accout');
        if (con == true) {
            window.open('login.php', '_blank');
        } else {
            return false;
        }
    }

}

function copyLink(element) {
    console.log(element);
    var $temp = $("<input>");
    $("body").append($temp);

    console.log($('#' + element).text());

    $temp.val($('#' + element).text()).select();
    document.execCommand("copy");
    $temp.remove();

    /* Alert the copied text */
    alert("Copied the text: " + element);
}