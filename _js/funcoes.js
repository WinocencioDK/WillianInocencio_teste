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

function LevaMot(id,status) {
  if(status == true) {
    $("#act0").html("Inativar");
  } else {
    $("#act0").html("Ativar");
  }
  $("#act1").val(id);
  $("#act2").val(status);
}

function TestaCPF() {
    var Soma;
    var Resto;
    var strCPF = document.getElementById('cpfMot').value;
    Soma = 0;
	if (strCPF == "00000000000" || strCPF == "11111111111" || strCPF == "22222222222" || strCPF == "33333333333" || strCPF == "44444444444" || strCPF == "55555555555" || strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "99999999999") { 
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
    $('#cpfMot').addClass( "is-valid" );
    $( "#Some" ).hide();
    return true;
}

$(document).ready(function() {
  $("#myBusca").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

});
