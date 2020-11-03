function deleteRow(e){
    console.log('deleteRow called' + $(e).attr('data-content'));
    $('#yes-delete-record-btn').prop('href', $(e).attr('data-content'));
}
