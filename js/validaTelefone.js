jQuery("#celular")
        .mask("(99) 9999-99999")
        .focusout(function (event) {  
            let target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-9999");  
            } else {  
                element.mask("(99) 9999-99999");  
            }  
        });

        $( "#celular").change(function() {
            let  celularValido = $("#celular").val();
            if (celularValido.length < 15 ){
                $("#celular").val("");
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Telefone invalido!',
                  })
            }
          });

        jQuery("#fixo")
        .mask("(99) 9999-9999")
        .focusout(function (event) {  
            let target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-9999");  
            } else {  
                element.mask("(99) 9999-9999");  
            }  
        });