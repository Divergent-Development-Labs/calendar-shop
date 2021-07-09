 function addRow() {

     var clone = $('#pRow').html();
     $('#pTBody').append(clone);

     clone = $('#pTBody').children(':last-child');
     const rc = $('#pTBody tr').length;

     $(clone).attr('id', 'pRow' + rc);
     $(clone).find('.sno').attr('id', 'sno' + rc);
     $(clone).find('.sno').html(rc);

     $(clone).find('.designSelect').attr('id', 'design' + rc);

     $(clone).find('.myDatalistInput').attr('name', 'mySupplier' + rc);
     $(clone).find('.myDatalistInput').attr('list', 'suppliers' + rc);
     $(clone).find('.myDatalist').attr('id', 'suppliers' + rc);

     initEvents();
     doTotalCalc();

 }

 function itemSelected() {
     var t = $(this);

     $(t).parent().prev().attr('value', '');

     $(t).parent().prev().val($(t).html());

     $(t).parent().addClass('d-none');
 }

 function delRow(input) {
     tbody = $(input).parent().parent().parent();
     row = $(input).parent().parent();

     var len = $(tbody).find('tr').length;

     if (len <= 1) {
         alert('There should be any Data. Cannot delete this..' + len);
         return;
     }

     $(row).remove();
     var i = 0;
     for (; i < (len - 1); i++) {

         $('#pTBody').children().eq(i).attr('id', 'pRow' + (i + 1));
         $('#pTBody').children().eq(i).find('.sno').html(i + 1);

     }

     doTotalCalc();
 }

 function doCalc() {
     const d = $(this).parent().parent();

     var inputs = getPInput(d);

     var r = inputs.rate;
     var q = inputs.quantity;

     var c = 0;

     ce = $(d).find('.cost');

     c = parseFloat(r * q).toFixed(2);

     $(ce).attr('value', c);

     inputs.setOutput(c);

     doTotalCalc();
 }

 function doTotalCalc() {

     var i = 1;
     var len = $('#pTBody').find('tr').length;

     var c = 0,
         d = 0,
         q = 0,
         f = 0,
         g = 0,
         h = 0;
     f = len;
     for (; i <= len; i++) {

         if ($('#pTBody').find('#pRow' + i)) {
             const parentRow = $('#pTBody').find('#pRow' + i);
             var inputs = getPInput(parentRow);
             q += parseFloat(inputs.quantity);
             c += parseFloat(inputs.cost);
         } else {
             q = 0;
             c = 0;
         }

     }

     setPurchaseData();

     setTimeout(() => {
         toce = $('#toc');
         toqe = $('#toq');
         tsno = $('#tsno');

         g = parseFloat((c * 12) / 100);
         d = parseFloat(g / 2);
         h = parseFloat(c + g);

         $(toqe).val(q.toFixed(2));
         $(toce).val(c.toFixed(2));
         $(tsno).html(f);

         $('#oSubtotal').val(c.toFixed(2));
         $('#oCGST').val(d.toFixed(2));
         $('#oSGST').val(d.toFixed(2));
         $('#oTotal').val(h.toFixed(2));

         let totalPurchaseData = {};
         totalPurchaseData.totalQuantity = q.toFixed(2);
         totalPurchaseData.subtotalCost = c.toFixed(2);
         totalPurchaseData.gst = g.toFixed(2);
         totalPurchaseData.totalCost = h.toFixed(2);

         $('#totalOrderData').val(JSON.stringify(totalPurchaseData));
     }, 200)
 }

 var getPInput = (ele) => {
     var inputs = {
         calendar_type: ele.children().eq(1).find('select').val(),
         size: ele.children().eq(2).find('select').val(),
         is_custom_design: ele.children().eq(3).find('input.is_custom_design').val(),
         design: ele.children().eq(3).find('input.design').val(),
         rate: ele.children().eq(4).find('input').val(),
         quantity: ele.children().eq(5).find('input').val(),
         cost: ele.children().eq(6).find('input').val(),

         setOutput: (cost) => {
             if (cost != NaN) {
                 return;
             }
             ele.children().eq(5).find('input').val(cost.toFixed(2))
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

 function setPurchaseData() {
     var purchase = [];

     setTimeout(() => {
             $.each($('#pTBody').children(), function(k, ele) {
                 purchase.push(getPInput($(ele)));
             })

             var len = purchase.length;
             var purchaseData = JSON.stringify(purchase);
             $('#orderData').val(purchaseData);
         }, 100) //.1s
 }