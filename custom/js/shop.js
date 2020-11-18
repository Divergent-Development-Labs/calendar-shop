$(window).on('load', function() {
    // code here
    console.log('shop.js record retrieve calling');
    var txt = '';
    let size = $('#size_menu').find('option:selected').text();
    let type = $('#calendar_type_menu').val();
    let rate = $('#size_menu').find('option:selected').val();
    
    console.log(txt, type, size, rate);

    retrieveRecords(txt, type, size, rate);

});

$(document).ready(function() {

    let userId = $('#accountLink').attr('data');

    console.log(userId);
    
    
    $("#designSearchText").keyup(function(){
        console.log('shop.js record retrieve calling');
        var txt = $(this).val();
        let size = $('#size_menu').find('option:selected').text();
        let type = $('#calendar_type_menu').val();
        let rate = $('#size_menu').find('option:selected').val();

        recordError = $(this).next();
        console.log(recordError, txt, type, size, rate);

        retrieveRecords(txt, type, size, rate);
    });
    

    $("#newDesignName").keyup(function(){
        console.log('shop.js record checking calling');
        var txt = $(this).val();
        recordError = $(this).next();

        console.log(recordError, txt);

        if(txt!="")
        {
        $.ajax({
            url:"ajax/isRecordExist.php",
            method:"post",
            data:{
            searchTxt:txt,
            table: 'design',
            field: 'name'
            },
            dataType:"json",
            success:function(data)
            {
            if(data != 2){
                $('#newDesignSaveBtn').prop('disabled', true);
                $(recordError).html('Design name already Exist.!!');
            }
            else{
                $(recordError).html('');
                $('#newDesignSaveBtn').prop('disabled', false);
            }
            }
        });
        }
        else
        {
        $(recordError).html("");
        }
    });

});

function retrieveRecords(txt, type, size, rate){
    console.log('design.js record retrieve calling');

    listDiv = $('#designsList');
    $(listDiv).html('');

    $.ajax({
        url:"admin/ajax/retrieveRecords.php",
        method:"post",
        data:{
        retriveTxt:txt,
        table: 'design',
        field: 'name',
        retrieveFields: 'all'
        },
        dataType:"json",
        success:function(data)
        {
            console.log(data);
            console.log(data.length);
            if(data[0]){
                data.forEach(element => {
                    let temp = '<li class="col-sm-6 col-12 col-md-6 col-lg-4 col-xl-4 mx-md-2 product type-product post-62 status-publish instock product_cat-shirts product_cat-trends product_tag-amari product_tag-shirt has-post-thumbnail taxable shipping-taxable purchasable product-type-simple">\
                                    <a href="https://drive.google.com/file/d/'+element.design_link+'/view?usp=sharing" target="_blank" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">\
                                        <!-- <span class="onsale">Sale!</span> -->\
                                        <img style="width:100% !important; height:289.875px !important;" src="https://drive.google.com/thumbnail?id='+element.design_link+'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">\
                                        <h4 class="woocommerce-loop-product__title text-capitalize product_name">'+element.name+'</h4></a>';
                        
                        if(type){
                            temp += '<span class="font-weight-bold"><span class="woocommerce-Price-amount amount"><bdi class="product_type">'+type+'</bdi></span></span><br>';
                        }
                        if(size){
                            temp += '<span class="font-weight-bold"><span class="woocommerce-Price-amount amount"><bdi class="product_size">'+size+'</bdi></span></span><br>';
                        }
                        if(rate){
                            temp += '<span class="font-weight-bold"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#x20B9;	</span><span class="product_rate">'+rate+'</span></bdi></span></span><br>';
                            temp += '<a type="button" data-quantity="1" onclick="addToCart(\''+element.id+'\',\''+element.name+'\',\''+element.design_link+'\',\''+type+'\',\''+rate+'\')" id="add-btn-'+element.id+'" class="button product_type_simple add_to_cart_button ajax_add_to_cartz" data-product_size='+size+' data-product_sku="" aria-label="Add &ldquo; '+element.name+'&rdquo; to your cart" rel="nofollow"><span class="fa fa-shopping-cart"></span> Add to cart</a>\
                            </li>';
                        }

                    $(listDiv).append(temp);                        
                });
            }
            else{
                $(listDiv).html('<span class="font-weight-bold mx-auto text-center">No Data Available</span>');
            }
        }
    });
}

function selectSize(e, rate){
    let size = $(e.target).text();
    let txt = $('#designSearchText').val();
    let type = $('#calendar_type_menu').val();
    
    if(type == ''){
        alert('Calendar Type required');
        return;
    }
    
    console.log(txt, type, size, rate);
    retrieveRecords(txt, type, size, rate);
}

function selectCalendarType(e){
    let type = $(e.target).val();
    let txt = $('#designSearchText').val();
    let size = $('#size_menu').find('option:selected').text();
    let rate = '';

    if(size == ''){
        alert('Calendar Size required');
        return;
    }
    else{
        rate = $('#size_menu').find('option:selected').val();
    }
    console.log(txt, type, size, rate);
    retrieveRecords(txt, type, size, rate);
}

function addToCartz(e){
    console.log(e);
}

function addToCart(design_id, design_name, design_link, type, rate){
    let userId = $('#accountLink').attr('data');

    if(userId){

        var id = '#add-btn-'+design_id;
        
        $(id).removeClass('added');
        $(id).addClass('loading');
    
        console.log(id);
        var size = $(id).attr('data-product_size');
        console.log(design_name, design_link, type, size, rate);
        console.log(id);
    
        $.ajax({
            url:"backend/insert-cart-backend.php",
            method:"post",
            data:{
                design_name: design_name,
                design_link: design_link,
                type: type,
                size: size,
                rate: rate,
            },
            dataType:"json",
            success:function(data)
            {
                console.log(data);
                if(data == '1'){
                    setTimeout(()=>{
                        $(id).removeClass('loading');
                        $(id).addClass('added');    
                        
                        let cart_price = parseFloat($('#cart_price').html()) + parseFloat(rate);
                        $('#cart_price').html(cart_price.toFixed(2));
                    }, 100)
                }
                else{
                    // $(id).removeClass('added');    
                    $(id).removeClass('loading');
                    console.log('Something error ' + data);
                }
            }
        });
    }
    else{
        var con = confirm('Kindly Login into your accout');
        if(con == true){
            window.open('my-account.php', '_blank');
        }
        else{
            return false;
        }
    }

}

function copyLink(element){
    console.log(element);
    var $temp = $("<input>");
    $("body").append($temp);

    console.log($('#'+element).text());

    $temp.val($('#'+element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    
    /* Alert the copied text */
    alert("Copied the text: " + element);
}