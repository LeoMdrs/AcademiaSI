<?php

	if(isset($_SESSION['VerAvaliacao'])){
		echo "Entrou aqui";
		
		$avaliacao = $_SESSION['VerAvaliacao'];
		unset($_SESSION['VerAvaliacao']);
	}

?>
<?php echo $avaliacao['pescoco']; ?>


<div class="page-header">
	<h1 class="all-tittles">Sistema Academia <small>Ver avaliação fisíca</small></h1><hr><hr><br>
</div>


<div class="container">
	
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="nome_do_avaliador" style="font-size: 30px;">Nome do Avaliador:</label>
			<label for="nome_do_avaliador" style="font-size: 30px;"><?php echo ((isset($avaliacao)) ? $avaliacao['professor'] : ""); ?></label>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-3">
			<label for="frequencia_cardiaca">Frequencia Cardiaca</label>
			<input name="frequencia_cardiaca" type="text" class="form-control" id="frequencia_cardiaca" value="<?php echo ((isset($avaliacao)) ? $avaliacao['frequencia_cardiaca'] : ""); ?>">
		</div>
		<div class="form-group col-md-3">
			<label for="peso">Peso</label>
			<input name="peso" type="text" class="form-control" id="peso">
		</div>
		<div class="form-group col-md-3">
			<label for="altura">Altura</label>
			<input name="altura" type="text" class="form-control" id="altura">
		</div>
	</div>
	
	<br><br>
	<h3>Medidas antopométricas comuns</h3>
	<hr /><br>

	
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="pescoco">Pescoço</label>
				<input name="pescoco" type="text" class="form-control" id="pescoco">
			</div>
			<div class="form-group col-md-3">
				<label for="cintura">Cintura</label>
				<input name="cintura" type="text" class="form-control" id="cintura">
			</div>
			<div class="form-group col-md-3">
				<label for="quadril">Quadril</label>
				<input name="quadril" type="text" class="form-control" id="quadril">
			</div>
			<div class="form-group col-md-3">
				<label for="braco_relaxado">Braço Relaxado</label>
				<input name="braco_relaxado" type="text" class="form-control" id="braco_relaxado">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="braco_contraido">Braço Contraido</label>
				<input name="braco_contraido" type="text" class="form-control" id="braco_contraido">
			</div>
			<div class="form-group col-md-3">
				<label for="toracica">Torácica</label>
				<input name="toracica" type="text" class="form-control" id="toracica">
			</div>
			<div class="form-group col-md-3">
				<label for="antebraco">Antebraço</label>
				<input name="antebraco" type="text" class="form-control" id="antebraco">
			</div>
			<div class="form-group col-md-3">
				<label for="coxa_superior">Coxa Superior</label>
				<input name="coxa_superior" type="text" class="form-control" id="coxa_superior">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="coxa_media">Coxa Media</label>
				<input name="coxa_media" type="text" class="form-control" id="coxa_media">
			</div>
			<div class="form-group col-md-3">
				<label for="coxa_inferior">Coxa Inferior</label>
				<input name="coxa_inferior" type="text" class="form-control" id="coxa_inferior">
			</div>
		</div>


</div>

