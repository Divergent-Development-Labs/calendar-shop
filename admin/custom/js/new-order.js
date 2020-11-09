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
                                        <button type="button" onclick="selectDesign(\''+element.design_link+'\', \''+element.name+'\', \''+designId+'\')" class="font-weight-bold btn btn-outline-primary waves-effect waves-light">Pick</button>\
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

function selectDesign(design_link, name, designId){
    console.log(design_link);
    // console.log($('#'+designId));
    if(designId){
        $('#'+designId).prev().find('input').val(name);
        console.log($('#'+designId).prev().prev());
        $('#'+designId).prev().prev().val(design_link);
        $('#designCard').addClass('d-none');        
    }
    else{
        $('#designCard').addClass('d-none');        
        alert('Kindly Select any Row | Cannot get Product Row');
    }

    setPurchaseData();
}