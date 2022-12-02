$(document).ready(function(){
	$("#email").blur(function(){
        if(validaEmail()){
           return true
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email invalido!',
              })
        }
    });

    $("#emailConf").blur(function() {
    let email = $("#email").val();
    let emailDConf = $("#emailConf").val();

   
    if(email !== emailDConf){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Verifique seu Email!',
          })
    }else{
        return true
    }
    });

});

function validaEmail(){
    let email = $("#email").val();
    let reg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (reg.test(email)){
        return true;
    }else{
     return false;   
    }
}

