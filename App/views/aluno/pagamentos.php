


<div class="page-header">
	<h1 class="all-tittles">Sistema Academia <small>Receber pagamentos</small></h1><hr><hr><br>
</div>


<span><?php // Exibição de erros encontrados no processo
			include ('../vendor/SON/Erro/errosPagamento.php'); 
		?>
</span><br>


<div class="container">

	

	<!--Pagamento -->
	<form name="pagamento"	action = "realizarPagamento" method="post" onsubmit="">
		
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="matricula">Aluno (matrícula)</label>
				<input name="matricula" type="int" placeholder="ex: 123" class="form-control campo-texto-arredondado" id="matricula" required pattern="[0-9]+$">
			</div>
			<div class="form-group col-md-2">
				<label for="valor_pagamento">Valor do pagamento ($)</label>
				<input name="valor_pagamento" type="float" placeholder="ex: 60" class="form-control campo-texto-arredondado" id="valor_pagamento" required pattern="[0-9]+$">
			</div>
			<div class="form-group col-md-2">
				<label for="data_pagamento">Data do pagamento</label>
				<input name="data_pagamento" type="date" class="form-control campo-texto-arredondado" id="data_pagamento" placeholder="data de nascimento" required maxlength=6 pattern="[0-9]{4}[-][0-9]{2}[-][0-9]{2}">
			</div>
			
			<div class="form-row ml-3" style="justify-content: center; align-items: center;"> 
				<div class="" style="">
					<button type="submit" class="btn btn-outline-success">Receber</button>
				</div>
			</div>

			
		</div>
	</div>
</div>
<!--Fim-->




