$(document).ready(function() {

    retrieveRecords("");

    $("#designSearchText").keyup(function() {
        var txt = $(this).val();
        recordError = $(this).next();
        retrieveRecords(txt);
    });

    $("#newDesignName").keyup(function() {
        var txt = $(this).val();
        recordError = $(this).next();

        if (txt != "") {
            $.ajax({
                url: "ajax/isRecordExist.php",
                method: "post",
                data: {
                    searchTxt: txt,
                    table: 'design',
                    field: 'name'
                },
                dataType: "json",
                success: function(data) {
                    if (data != 2) {
                        $('#newDesignSaveBtn').prop('disabled', true);
                        $(recordError).html('Design name already Exist.!!');
                    } else {
                        $(recordError).html('');
                        $('#newDesignSaveBtn').prop('disabled', false);
                    }
                }
            });
        } else {
            $(recordError).html("");
        }
    });

    $(".design-tab").off('click').on('click', designTabSelection);

});

function designTabSelection() {
    var designTab = $(this).attr('data');
    if (designTab == 'custom') {
        $('#custom-counts').removeClass('d-none');
        $('#design-counts').addClass('d-none');
    } else {
        $('#design-counts').removeClass('d-none');
        $('#custom-counts').addClass('d-none');
    }
}

function retrieveRecords(txt) {
    listDiv = $('#designsList');
    customListDiv = $('#customDesignsList');

    designCounts = $('#design-counts');
    customCounts = $('#custom-counts');
    totalCounts = $('#total-counts');

    $(listDiv).html('');
    $(customListDiv).html('');

    let count1 = 0,
        count2 = 0;

    $.ajax({
        url: "ajax/retrieveRecords.php",
        method: "post",
        data: {
            retriveTxt: txt,
            table: 'design',
            field: 'name',
            retrieveFields: 'all'
        },
        dataType: "json",
        success: function(data) {
            if (data[0]) {
                data.forEach(element => {
                    let temp = '<li class="col-md-4 col-sm-6 col-xl-3">\
                                    <div class="card">';

                    if (element.is_custom_design == 'true') {
                        temp += '<a href="../' + element.design_link + '" target="_blank"><img style="height: 200px;" class="card-img-top img-fluid" src="../' + element.design_link + '" alt="' + element.name + '"></a>\
                                        <p class="card-text" hidden id="link-p-' + element.id + '" >' + element.design_link + '</p>';
                        count1++;
                    } else {
                        temp += '<a href="https://drive.google.com/file/d/' + element.design_link + '/view?usp=sharing" target="_blank"><img style="height: 200px;" class="card-img-top img-fluid" src="https://drive.google.com/uc?export=view&id=' + element.design_link + '" alt="' + element.name + '"></a>\
                                        <p class="card-text" hidden id="link-p-' + element.id + '" >https://drive.google.com/file/d/' + element.design_link + '/view?usp=sharing</p>';
                        count2++;
                    }

                    temp += '</div>\
                                <div class="card-body">\
                                    <h4 class="card-title text-capitalize">' + element.name + '</h4>\
                                    <div class="d-flex justify-content-between mt-3">\
                                        <button type="button" onclick="copyLink(\'link-p-' + element.id + '\')" class="font-weight-bold btn btn-outline-primary waves-effect waves-light">Copy Link</button>\
                                        <button type="button" onclick="deleteRow(this)" data-content="backend/delete-design.php?id=' + element.id + '" class="font-weight-bold btn btn-outline-danger delete-record-btn waves-effect waves-light" data-toggle="modal" data-target="#myModal" data-content="11"><span data-container="body" data-toggle="tooltip" data-placement="top" title="Delete Design" class="">Delete</span></button>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>';

                    if (element.is_custom_design == 'true') {
                        $(customListDiv).append(temp);
                    } else {
                        $(listDiv).append(temp);
                    }
                });

                $(customCounts).html(count1);
                $(designCounts).html(count2);
                $(totalCounts).html(count2 + count1);
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

function copyLink(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($('#' + element).text()).select();
    document.execCommand("copy");
    $temp.remove();

    /* Alert the copied text */
    alert("Copied the text: " + element);
}