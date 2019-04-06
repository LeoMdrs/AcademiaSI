<?php

	if(isset($_SESSION['VerTreino']) && isset($_SESSION['VerExercicios'])){
		
		$treino = $_SESSION['VerTreino'];
		unset($_SESSION['VerTreino']);
		
		$exercicios = $_SESSION['VerExercicios'];
		unset($_SESSION['VerExercicios']);
		
		if(isset($_SESSION['EditarTreino'])){
			$editar_treino = $_SESSION['EditarTreino'];
			unset($_SESSION['EditarTreino']);
		}
		
		//print_r(array_values($exercicios));

	}
?>

<script type="text/javascript">
	document.getElementById("tituloPagina").innerHTML = "<?php echo (isset($treino)) ? "Treino #{$treino[0]->id_treino}" : "Novo Treino"; ?>";
	document.getElementById("title").innerHTML = "Novo Treino";
</script>


<div class="page-header">
	<h1 class="all-tittles">Sistema Academia <small>Cadastrar treino</small></h1><hr><hr><br>
</div>

<div class="container">

	<!--Exercicio -->
	<div class="exercicio">
		
		<div class="form-row" style="justify-content: center; align-items: center; ">
				<div style=" text-align: center;">
					<label for="nome">Nome do Treino</label>
					<input name="nome" type="text" class="form-control campo-texto-arredondado" id="nome" Value="<?php echo ((isset($treino)) ? $treino[0]->nome_treino : ""); ?>">
				</div>
		</div>
		
		<br>
		<hr />
		<br>
		
		<div id="Nova_Coluna" <?php echo ( !(isset($treino)) ? "" : ( (isset($editar_treino)) ? "" : "style='display: none;'")); ?> >
			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="exercicio">Exercicio</label>
					<select name="exercicio" id="exercicio" class="form-control" style="border-radius: 20px 0px 0px 20px;" required>
						<option value="">escolher</option>
						<option>exercicio1</option>
						<option>exercicio2</option>
						<option>exercicio3</option>
						<option>exercicio4</option>
						<option>exercicio5</option>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label for="series">Series</label>
					<input name="series" type="text" class="form-control campo-texto-arredondado" id="series">
				</div>
				<div class="form-group col-md-3">
					<label for="repeticoes">Repetições</label>
					<input name="repeticoes" type="text" class="form-control campo-texto-arredondado" id="repeticoes">
				</div>
				
				<div class="form-row ml-3" style="justify-content: center; align-items: center;"> 
					<div class="" style="">
						<button type="submit" id="btnAddColumn" class="btn btn-outline-primary" onclick="AddTableRow(this)" ><i class="fa fa-plus" style="font-size:24px"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Fim-->

	<br><br><br><br>
	
	
<div id="main" class="main mt-3">
		
	<div class="col-md-12">
		<table id="myTable" class="table">
			<tr>
				<th>Exercicio</th>
				<th>Series</th>
				<th>Repetições</th>
				<?php 
					if( !isset($exercicios) || isset($editar_treino)){ 
						echo "<th class='actions'>Ações</th>";
					}
				?>
			</tr>
			
			<tbody>
				<?php 
				
					if(isset($exercicios)){ 
						
						foreach($exercicios as $ex){
							echo '<tr><td>' . $ex->nome_exercicio . '</td><td>' . $ex->series . '</td><td>' . $ex->repeticoes . '</td>';
							
							if((isset($editar_treino))){
								echo "<td class='actions'><button class='btn btn-outline-danger' onclick='RemoveTableRow(this)' type='button'><i class='fa fa-trash' style='font-size:24px'></i></button></td>";
							}
							
							echo '</tr>';
						}
					}
					
				?>
			</tbody>

		</table>
	</div>
	
	
	<div class="form-row mt-3" style="justify-content: center; align-items: center;">
			<div class="" style="">
				<form method="post" action="salvarTreino?id_treino=<?php echo ((isset($editar_treino)) ? "{$treino[0]->id_treino}" : ""); ?>&acao=<?php echo ((isset($editar_treino)) ? "atualizar" : "adicionar"); ?>" >
				
					<input type="hidden" id="treino" name="treino" value="" />
					<input type="hidden" id="nome_treino" name="nome_treino" value="" />
					<input type="hidden" id="matricula_aluno" name="matricula_aluno" value="<?php echo $_GET['matricula']; ?>" />
					<input type="hidden" id="professor" name="professor" value="<?php echo $_SESSION['Nome']; ?>" />
					

<br><br><br><br>

					<input type="submit" id="btnAddColumn" class="btn btn-primary btn-lg" onclick="RecuperarValores(this)" value="Salvar Treino" 
					<?php echo ( !(isset($treino)) ? "" : ( (isset($editar_treino)) ? "" : "style='display: none;'")); ?> />
				</form> 
				
			</div>
		</div>
	
</div>
