$(document).ready(function() {

    retrieveRecords("");
    
    $("#designSearchText").keyup(function(){
        console.log('design.js record retrieve calling');
        var txt = $(this).val();

        recordError = $(this).next();
        console.log(recordError, txt);

        retrieveRecords(txt);
    });
    

    $("#newDesignName").keyup(function(){
        console.log('design.js record checking calling');
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

function retrieveRecords(txt){
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
                    $(listDiv).append(
                        '<li class="product type-product post-41 status-publish  instock product_cat-shirts product_tag-pokemon product_tag-print product_tag-shirt product_tag-white has-post-thumbnail sale taxable shipping-taxable purchasable product-type-simple">\
                            <a href="https://drive.google.com/file/d/'+element.design_link+'/view?usp=sharing" target="_blank" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">\
                                <!-- <span class="onsale">Sale!</span> -->\
                                <img style="width:auto; height:250px;" src="https://drive.google.com/thumbnail?id='+element.design_link+'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" />\
                                <h2 class="woocommerce-loop-product__title">'+element.name+'</h2>\
                                <!-- <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span></div> -->\
                                <!-- <span class="price"><del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>12.00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>10.00</bdi></span></ins></span> -->\
                            </a>\
                            <a type="button" data-quantity="1" onclick="addToCart('+element.id+')" id="add-btn-'+element.id+'" class="button product_type_simple add_to_cart_button ajax_add_to_cartz" data-product_id="'+element.id+'" data-product_sku="" aria-label="Add &ldquo; '+element.name+'&rdquo; to your cart" rel="nofollow"><span class="fa fa-shopping-cart"></span> Add to cart</a>\
                        </li>'
                    );                        
                });
            }
            else{
                $(listDiv).html('<span class="font-weight-bold mx-auto text-center">No Data Available</span>');
            }
        }
    });
}

function selectSize(e){
    console.log($(e.target).text());
}

function addToCart(element){
    var id = '#add-btn-'+element;

    $(id).removeClass('added');
    $(id).addClass('loading');

    console.log(element);
    console.log(id);

    setTimeout(()=>{
        $(id).removeClass('loading');
        $(id).addClass('added');    
    }, 1000)
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