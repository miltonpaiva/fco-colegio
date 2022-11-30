$(document).ready(function() {
    let idade = "";
    $('#nascimento').datepicker({
        onSelect: function (value, ui) {
            let hoje = new Date();
            idade = hoje.getFullYear() - ui.selectedYear;
            $('#idade').val(idade);
        },
        maxDate: new Date(),
        chageMonth:true,
        changeYear:true,
    });
})