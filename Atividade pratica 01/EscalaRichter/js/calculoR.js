$(document).ready(function(){

  $("button[name='calcular']").click(function(){

    var amplitude = parseFloat($("input[name='amplitude']").val());
    var intervalo = parseFloat($("input[name='intervalo']").val());

    //alert("entrou");

    if(isNaN(amplitude)){
      $("#grupoAmplitude").addClass("has-error");
      $("#alertaAmplitude").slideDown();
      $("input[name='amplitude']").val("");
      $("input[name='amplitude']").focus();
      return;
    }

    $("#grupoAmplitude").removeClass("has-error");
    $("#alertaAmplitude").hide();

    if(isNaN(intervalo)){
      $("#grupoIntervalo").addClass("has-error");
      $("#alertaIntervalo").slideDown();
      $("input[name='intervalo']").val("");
      $("input[name='intervalo']").focus();
      return;
    }

    $("#grupoIntervalo").removeClass("has-error");
    $("#alertaIntervalo").hide();

    var res = Math.log10(amplitude) + 3 * Math.log10(8 * intervalo) - 2.92;

    var efeito;
    res = res.toFixed(1);

    if (res < 3.5){
      efeito = "Geralmente não sentido, mas gravado.";
      
    }
    else if (res >= 3.5 && res <= 5.4)
    {
      efeito = "Às vezes sentido, mas raramente causa danos.";
   
    }
    else if (res >=5.5 && res <= 6.0)
    {
      efeito = "No máximo causa pequenos danos a prédios bem construídos, mas pode danificar seriamente casas mal construídas em regiões próximas.";
    
    }
    else if (res >= 6.1 && res <= 6.9)
    {
      efeito = "Pode ser destrutivo em áreas em torno de até 100 km do epicentro.";
      
    }
    else if (res >= 7.0 && res <= 7.9)
    {
      efeito = "Grande terremoto. Pode causar sérios danos numa grande faixa.";
      
    }
    else if (res > 8)
    {
      efeito = "Enorme terremoto. Pode causa graves danos em muitas áreas mesmo que estejam a centenas de quilômetros.";
     
    }

    var terremoto = "• Magnitude:\n" + res + "\n\n• Efeitos:\n" + efeito;

    $("textarea[name='resultado']").val(terremoto);


  });

  $("button[name='limpar']").click(function(){
   
  });

});
