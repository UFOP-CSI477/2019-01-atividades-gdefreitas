$(document).ready(function(){

  $("button[name='calcular']").click(function(){

  var peso   = parseFloat($("input[name='peso']").val());
  var altura = parseFloat($("input[name='altura']").val());

  if(isNaN(peso)){
    $("#grupoPeso").addClass("has-error");
    $("#alertaPeso").show();
    $("input[name='peso']").val("");
    $("input[name='peso']").focus();
    return;
  }

  $("#grupoPeso").removeClass("has-error");
  $("#alertaPeso").hide();

  if(isNaN(altura)){
    $("#grupoAltura").addClass("has-error");
    $("#alertaAltura").show();
    $("input[name='altura']").val("");
    $("input[name='altura']").focus();
    return;
  }

  $("#grupoAltura").removeClass("has-error");
  $("#alertaAltura").hide();

  var imc = peso / (altura*altura)
  var classificacao = ""

  if (imc < 18.5) {
    classificacao = "Subnutrição"
  }
  else if (imc >= 18.6 && imc <= 24.9) {
    classificacao = "Peso saudável"
  }
  else if (imc >= 25 && imc <= 29.9) {
    classificacao = "Sobrepeso"
  }
  else if (imc >= 30 && imc <= 34.9) {
    classificacao = "Obesidade grau 1"
  }
  else if (imc >= 35 && imc <= 39.9) {
    classificacao = "Obesidade grau 2"
  }
  else {
    classificacao = "Obesidade grau 3"
  }

  var res = "IMC: " + imc.toFixed(2) + "\t\tClassificação: " + classificacao;
  $("input[name='resultado']").val(res);

  var p1 = 18.6 * altura * altura
  var p2 = 24.9 * altura * altura

  var pesoIdeal= "P1: " + p1.toFixed(2) + "\t\tP2: " + p2.toFixed(2);
  $("input[name='pesoIdeal']").val(pesoIdeal);

});



});
