$(document).ready(function() {

    let nome = $('#nome').val();
    let cpf = $('#cpf').val();
    let nascimento = $('#nascimento').val();
    let endereco = $('#endereco').val();
    let numero = $('#numero').val();
    let cep = $('#cep').val();
    let bairro = $('#bairro').val();
    let complemento = $('#complemento').val();
    let telefone = $('#celular').val();
    let email = $('#email').val();
    let senha = $("#senha").val();


    $("#bntRegistrar").blur(function(){
		if(nome == "" || cpf == "" || nascimento == "" 
        || endereco == "" || numero == "" || cep == ""
        || bairro == "" || complemento == "" || telefone == ""
        || email == "" || senha == ""){
			$("#bntRegistrar").hide();
        }else{
			$("#bntRegistrar").show();
		}
	});
})