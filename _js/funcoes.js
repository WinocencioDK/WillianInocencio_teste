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
	if (strCPF == "00000000000" || strCPF.length = 11) { //DEPOOOOOOOOOOOOOOOOOOOOOOOOOIS
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
  var sTatus = $('.sTa').html();
  if(sTatus == true) {
    $('.sTa').html("Ativo");
    $('.sTa').addClass("text-primary");
    $('.bSt').html("Inativar");
    $('.bSt').addClass("btn-outline-secondary");
  } else {
    $('.sTa').html("Inativo");
    $('.sTa').addClass("text-danger");
    $('.bSt').html("Ativar");
    $('.bSt').addClass("btn-outline-primary");
  }

  $("#myBusca").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
