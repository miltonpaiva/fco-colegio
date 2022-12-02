$(document).ready(function(){
	$("#senha").blur(function(){
        if(validaSenha()){
           return true
        }else{
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'A senha deve conter de 5 a 8 caracters',
              })
        }
    });

    $("#senhaConf").blur(function() {
    let senha = $("#senha").val();
    let senhaConf = $("#senhaConf").val();

   
    if(senha !== senhaConf){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Verifique se sua senha esta correta!',
          })
    }else{
        return true
    }
    });

});

function validaSenha(){
    let senha = $("#senha").val();
    if(senha.length <= 8 && senha.length >= 5){
        return true;
    }else{
        return false
    }

}