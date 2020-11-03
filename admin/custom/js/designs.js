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
                                    <h4 class="card-title text-capitalize">'+element.name+'</h4>\
                                    <div class="d-flex justify-content-between mt-3">\
                                        <button type="button" onclick="copyLink(\'link-p-'+element.id+'\')" class="font-weight-bold btn btn-outline-primary waves-effect waves-light">Copy Link</button>\
                                        <button type="button" onclick="deleteRow(this)" data-content="backend/delete-design.php?id='+element.id+'" class="font-weight-bold btn btn-outline-danger delete-record-btn waves-effect waves-light" data-toggle="modal" data-target="#myModal" data-content="11"><span data-container="body" data-toggle="tooltip" data-placement="top" title="Delete Design" class="">Delete</span></button>\
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