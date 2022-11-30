$(document).ready(function(){

let maxAprender = 2;
 jQuery('input[name=aprender]').click(function () {
    var n = jQuery('input[name=aprender]:checked').length;
    if (n > maxAprender) {
        $(this).prop('checked', false);
        Swal.fire({
            icon: 'info',
            title: 'Oops...',
            text: 'Escolha no mínimo 2 opções',
          })
    }
 });
    
});

