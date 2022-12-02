$('#numero').on('input blur paste', function(){
    $(this).val($(this).val().replace(/\D/g, ''))
   })