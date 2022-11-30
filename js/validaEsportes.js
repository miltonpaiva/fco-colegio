$(document).ready(function(){
	

let max = 3;
jQuery('input[name=esporte]').click(function () {
    var n = jQuery('input[name=esporte]:checked').length;
    if (n > max) {
        $(this).prop('checked', false);
        Swal.fire({
            icon: 'info',
            title: 'Oops...',
            text: 'Escolha no mínimo 3 opções',
          })
    }
 });

});

