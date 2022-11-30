$(document).ready(function(){
	$("#cep").mask("99.999-999");

	$( "#cep").change(function() {
        let  cpfValido = $("#cep").val();
        if (cpfValido.length < 10 ){
            $("#cep").val("");
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'CEP invalido!',
              })
        }
      });

});
