var CPF = new CPF();

$('input[name="cpf"').mask('999.999.999-99');

$('input[name="cpf"').blur(function() {
	
	var res = CPF.valida($(this).val());
	if(res != 'true') {
		alert("CPF Inválido, tente novamente");
		$(this).focus();
	} 

});

jQuery.validator.addMethod("cpf", function(value, element) {
   value = jQuery.trim(value);

    value = value.replace('.','');
    value = value.replace('.','');
    cpf = value.replace('-','');
    while(cpf.length < 11) cpf = "0"+ cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i=0; i<11; i++){
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
    b = 0;
    c = 11;
    for (y=0; y<10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

    var retorno = true;
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

    return this.optional(element) || retorno;

}, "Informe um CPF válido");

$("#userform").validate({
      rules: {
        cpf: {cpf: true, required: true},
        password : {
          minlength : 5
        },
        repassword : {
          minlength : 5,
          equalTo : "#password"
        }
      },
      messages: {
        cpf: { cpf: 'CPF inválido'}
      }
  });

$(document).ready(function(){
  
  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',                
    language: 'pt-BR'
  });


  $('.upload-avatar').change(function(e) {

    // $('figure').css("background-image", e.target.result);
    // console.log(this.files[0])

  });

});

function changePassword() {

  $('input[name="password"]').removeAttr('disabled');

}
