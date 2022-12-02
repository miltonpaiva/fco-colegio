$(document).ready(function () { 
    var cpf = $("#cpf");
    cpf.mask('000.000.000-00', {reverse: true});

    $( "#cpf").change(function() {
        let  cpfValido = $("#cpf").val();
        if (cpfValido.length < 14 ){
            $("#cpf").val("");
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'CPF invalido!',
              })
        }
      });


});