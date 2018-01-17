(function() {
  'use strict';

  window.addEventListener('load', function() {
    var form = document.getElementById('needs-validation');
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  }, false);
})();


function TestaCPF() {
    var Soma;
    var Resto;
    var strCPF = document.getElementById('cpfMot').value;
    Soma = 0;
	if (strCPF == "00000000000") {
    $( "#Some" ).show();
    $('#cpfMot').addClass( "is-invalid" );
    return false;
    }
	for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
	Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) {
      $( "#Some" ).show();
      $('#cpfMot').addClass( "is-invalid" );
      return false;
    }
	Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) {
      $( "#Some" ).show();
      $('#cpfMot').addClass( "is-invalid" );
      return false;
    }
    $( "#Some" ).hide();
    return true;
}
