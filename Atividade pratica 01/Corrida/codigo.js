

  var ordem[];
this.adicionaLinha = function ()
{
  var linhas = $("#tabela").find("tbody").find("tr");

	var largada = document.getElementById('largada').value;
	var nome = document.getElementById('nome').value;
	var tempo = document.getElementById('tempo').value;
  
	
	var table = document.getElementsByTagName('table')[0];

	var newRow = table.insertRow(table.rows.length/2+1);

	var cel1 = newRow.insertCell(0);
	var cel2 = newRow.insertCell(1);
	var cel3 = newRow.insertCell(2);

	cel1.innerHTML = largada;
	cel2.innerHTML = nome;
	cel3.innerHTML = tempo;


	
}

