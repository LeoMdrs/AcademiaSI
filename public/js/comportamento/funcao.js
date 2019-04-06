
(function($) {

	RemoveTableRow = function(handler) {
		var tr = $(handler).closest('tr');

		tr.fadeOut(400, function(){ 
		  tr.remove(); 
		}); 

		return false;
	};
  
	AddTableRow = function() {
      
		var newRow = $("<tr>");
		var cols = "";
		
		cols += '<td>' + document.getElementById('exercicio').value + '</td>';
		cols += '<td>' + document.getElementById('series').value + '</td>';
		cols += '<td>' + document.getElementById('repeticoes').value + '</td>';
		  
		cols += '<td class="actions">';
		cols += '<button class="btn btn-outline-danger" onclick="RemoveTableRow(this)" type="button"><i class="fa fa-trash" style="font-size:24px"></i></button>';
		cols += '</td>';
		  
		newRow.append(cols);
		  
		$("#myTable").append(newRow);
		
		document.getElementById('exercicio').value = "";
		document.getElementById('series').value = "";
		document.getElementById('repeticoes').value = "";
		
		return false;
	};
  
	
	RecuperarValores = function() {
		
		var valoresTable = [];
		
		$('#myTable tbody tr').each(
			
			function(index,tr){
				
				var tds = $(tr).find('td');
				var tupla = [];
				
				$(tds).each(function(indexTd,td){
					tupla.push($(td).text());
					//valoresTable.push($(td).text());					
				});
				
				tupla.pop();
				valoresTable.push(tupla);
				
		});
		//alert(valoresTable);
		//unset($valoresTable[0]);
		
		document.getElementById("nome_treino").value = document.getElementById('nome').value;
		
		document.getElementById("treino").value = valoresTable.join("|");
		
	}
		
		
})(jQuery);

