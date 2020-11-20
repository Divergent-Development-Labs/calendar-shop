$( document ).ready(function() {
    addRow();  
    initEvents();
    
    $("#designSearchText").keyup(function(){
        console.log('design.js record retrieve calling');
        var txt = $(this).val();

        recordError = $(this).next();
        console.log(recordError, txt);

        retrieveRecords(txt);
    });

});
  
var initEvents = () => {
    $(".toOCalc").off('keyup, change').on('keyup, change', doCalc);    
    
    $(".getPData").off('keyup, change').on('keyup, change', setPurchaseData);   
    
    $('.sizeChange').off('change').on('change', setRate);
    
    $(".designSelect").off('click').on('click', designSelect);    
}

function addSupplier(){
    // console.log(input);
    $('#addOrderForm').addClass('was-validated');
    if(!$('#addOrderForm')[0].checkValidity()){
        return false;
    }
}

function setRate(){
    console.log($(this).val());

    const d = $(this).parent().parent().parent(); 

    rateElement = $(d).find('.rate');
    console.log(d)
    var txt = $(this).val();

    $.ajax({
        url:"ajax/retrieveRate.php",
        method:"post",
        data:{
        retriveTxt:txt,
        table: 'size',
        field: 'size_label',
        retrieveFields: 'rate'
        },
        dataType:"json",
        success:function(data)
        {
            console.log(data);
            console.log(data[0].rate);
            if(data[0]){
                $(rateElement).val(data[0].rate);
            }
            else{
                $(rateElement).val('0');
            }
            $(d).find('.quantity').prop('disabled' ,false);
        }
    });
}

function designSelect(){
    console.log($(this));
    $('#designCard').removeClass('d-none');
    retrieveRecords("", $(this).attr('id'));
}

function retrieveRecords(txt, designId){
    listDiv = $('#designsList');
    customListDiv = $('#customDesignsList');

    designCounts = $('#design-counts');
    customCounts = $('#custom-counts');
    totalCounts = $('#total-counts');

    $(listDiv).html('');
    $(customListDiv).html('');

    let count1 = 0, count2 = 0;

    $.ajax({
        url:"ajax/retrieveRecords.php",
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
            if(data[0]){                
                data.forEach(element => {
                    let temp = '<li class="col-md-4 col-sm-6 col-xl-3">\
                                    <div class="card">';
                    
                    if(element.is_custom_design == 'true'){                    
                            temp +='<a href="../'+element.design_link+'" target="_blank"><img style="height: 200px;" class="card-img-top img-fluid" src="../'+element.design_link+'" alt="'+element.name+'"></a>\
                                        <p class="card-text" hidden id="link-p-'+element.id+'" >'+element.design_link+'</p>';
                        count1++;
                    }
                    else{
                            temp +='<a href="https://drive.google.com/file/d/'+element.design_link+'/view?usp=sharing" target="_blank"><img style="height: 200px;" class="card-img-top img-fluid" src="https://drive.google.com/thumbnail?id='+element.design_link+'" alt="'+element.name+'"></a>\
                                        <p class="card-text" hidden id="link-p-'+element.id+'" >https://drive.google.com/file/d/'+element.design_link+'/view?usp=sharing</p>';
                        count2++;                        
                    }

                        temp += '</div>\
                                <div class="card-body">\
                                    <h4 class="card-title text-capitalize">'+element.name+'</h4>\
                                    <button type="button" onclick="selectDesign(\''+element.is_custom_design+'\', \''+element.design_link+'\', \''+element.name+'\', \''+designId+'\')" class="font-weight-bold btn btn-outline-primary waves-effect waves-light">Pick</button>\
                                </div>\
                            </div>\
                        </li>';

                    if(element.is_custom_design == 'true'){
                        $(customListDiv).append(temp);                        
                    }
                    else{
                        $(listDiv).append(temp);                        
                    }        
                });

                $(customCounts).html(count1);   
                $(designCounts).html(count2);
                $(totalCounts).html(count2+count1);
                console.log(count1, count2);   
            }
            else{
                if(count2 == 0){
                    $(listDiv).html('<span class="font-weight-bold mx-auto text-center">No Data Available</span>');
                }
                if(count1 == 0){
                    $(customListDiv).html('<span class="font-weight-bold mx-auto text-center">No Data Available</span>');
                }
            }
        }
    });
}

function retrieveRecordsz(txt, designId){
    listDiv = $('#designsList');
    $(listDiv).html('');

    $.ajax({
        url:"ajax/retrieveRecords.php",
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
            if(data[0]){
                data.forEach(element => {
                    $(listDiv).append(
                        '<div class="col-md-4 col-sm-6 col-xl-3">\
                            <div class="card">\
                                <a href="https://drive.google.com/file/d/'+element.design_link+'/view?usp=sharing" target="_blank"><img style="height: 200px;" class="card-img-top img-fluid" src="https://drive.google.com/thumbnail?id='+element.design_link+'" alt="'+element.name+'"></a>\
                                <p class="card-text" hidden id="link-p-'+element.id+'" >https://drive.google.com/file/d/'+element.design_link+'/view?usp=sharing</p>\
                                <div class="card-body">\
                                    <div class="d-flex justify-content-between mt-3">\
                                        <h4 class="card-title text-capitalize">'+element.name+'</h4>\
                                        <button type="button" onclick="selectDesign(\''+element.is_custom_design+'\', \''+element.design_link+'\', \''+element.name+'\', \''+designId+'\')" class="font-weight-bold btn btn-outline-primary waves-effect waves-light">Pick</button>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>'
                    );                        
                });
            }
            else{
                $(listDiv).html('<span class="font-weight-bold mx-auto text-center">No Data Available</span>');
            }
        }
    });
}

function selectDesign(is_custom_design, design_link, name, designId){
    console.log(design_link);
    console.log($('#'+designId));
    if(designId){
        $('#'+designId).prev().find('input').val(name);
        console.log($('#'+designId).prev().prev());
        $('#'+designId).prev().prev().val(design_link);
        $('#'+designId).prev().prev().prev().val(is_custom_design);
        $('#designCard').addClass('d-none');        
    }
    else{
        $('#designCard').addClass('d-none');        
        alert('Kindly Select any Row | Cannot get Product Row');
    }

    setPurchaseData();
}