<?php

	if(isset($_SESSION['TelaUsuario'])){
		
		$usuario = $_SESSION['TelaUsuario'];
		unset($_SESSION['TelaUsuario']);
	}

?>

<!-- Modal de Delete-->
<div class="modal fade" id="imagem-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="modalLabel">Editar Imagem</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times</span></button>
			</div>
		
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" action="imagemUpload?matricula=<?php echo $_GET['matricula']; ?>">
					<h5>Selecione uma imagem: </h5><br />
					<input name="arquivo" type="file" /><br /><br />

					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value="Salvar" />
						<a id="cancel" class="btn btn-default" data-dismiss="modal">Cancelar</a>
					</div>
				</form>
			</div>

			
		</div>
	</div>
</div> <!-- Fim Modal de Delete -->

<div class="page-header">
	<h1 class="all-tittles">Sistema Academia <small>Tela do usuário</small></h1><hr><hr><br>
</div>




<div class="container">
	
	<!-- Dados -->
	<div> 
		<div style="" >
			<div class="row" style="justify-content: center; align-items: center;">
				<img src='Imagens/<?php echo ( (isset($usuario)) ? ( ( $usuario['nome_imagem'] != null) ? ("Perfil/" . $usuario['nome_imagem']) : 'sem_foto.png') : "" ) ; ?>' alt="person" class="img-circular" style="" data-toggle="modal" data-target="#imagem-modal"> <!-- img-fluid rounded-circle mCS_img_loaded -->
			</div>	
		</div>

		
		<br><br>

		
		<div class="m-auto" >
			<!-- Informações Pessoais -->
			<div class="">
				<div class="row mt-4" > 
					<div class="col-md-3">
						<i class="fa fa-smile-o" style="font-size:25px"></i>
						<label  for="nome"><?php echo ((isset($usuario)) ? $usuario['nome'] : ""); ?></label>
					</div>
					<div class=" col-md-3">
						<i class="fa fa-id-card" style="font-size:25px"></i>
						<label for="cpf"><?php echo ((isset($usuario)) ? $usuario['cpf'] : ""); ?></label>
					</div>
				
					<div class="col-md-3">
						<i class="fa fa-id-card-o" style="font-size:25px"></i>
						<label for="rg"><?php echo ((isset($usuario)) ? $usuario['rg'] : ""); ?></label>
					</div>
					<div class="col-md-3">
						<i class="fa fa-birthday-cake" style="font-size:25px"></i>
						<label for="nascimento"><?php echo ((isset($usuario)) ? $usuario['nascimento'] : ""); ?></label>
					</div>
					
				</div>
			</div>
			
			<br>
			
			<!-- Localização -->	
			<div class="mt-4">				
				<div class="row mt-4">
					<div class="col-md-3">
						<i class='fa fa-venus-mars' style='font-size:25px;'></i>
						<label for="sexo"><?php echo ((isset($usuario)) ? $usuario['sexo'] : ""); ?></label>
					</div>
				
					<div class="col-md-3">
						<i class="fa fa-home" style="font-size:25px"></i>
						<label for="endereco"><?php echo ((isset($usuario)) ? $usuario['endereco'] : "");
													echo ((isset($usuario)) ? " - {$usuario['bairro']}" : ""); ?></label>
					</div>
					<!--<div class="col-md-3">
						<i class="fa fa-map-marker" style="font-size:36px"></i>
						
						<label for="bairro"><?php //echo ((isset($usuario)) ? $usuario['bairro'] : ""); ?></label>
					</div>-->
					<div class="col-md-3">
						<i class="fa fa-map-o" style="font-size:25px"></i>
						<label for="cidade"><?php echo ((isset($usuario)) ? $usuario['cidade'] : "");
											echo ((isset($usuario)) ? " , {$usuario['estado']}" : "");?></label>
					</div>
					<div class="col-md-2">
						<i class="fa fa-map-pin" style="font-size:25px"></i>
						<label for="cep"><?php echo ((isset($usuario)) ? $usuario['cep'] : ""); ?></label>
					</div>
					<!--<div class="col-md-1">
						<i class="fa fa-map-pin" style="font-size:36px"></i>
						<label for="estado"><?php //echo ((isset($usuario)) ? $usuario['estado'] : ""); ?></label>
					</div>-->
					
				</div>
			</div>
			
			<br>

			<!-- Contato -->
			<div class="mt-4">
				<div class="row mt-4">
					<div class="col-md-3">
						<i class="fa fa-phone" style="font-size:25px"></i>
						<label for="telefone"><?php echo ((isset($usuario)) ? $usuario['telefone'] : ""); ?></label>
					</div>
					<div class=" col-md-3">
						<i class="fa fa-envelope" style="font-size:25px"></i>
						<label for="email"><?php echo ((isset($usuario)) ? $usuario['email'] : ""); ?></label>
					</div>
					<div class="col-md-3">
						<i class="fa fa-at" style="font-size:25px"></i>
						<label for="usuario"><?php echo ((isset($usuario)) ? $usuario['usuario'] : ""); ?></label>
					</div>
					<div class="col-md-3">
						<i class="fa fa-paperclip" style="font-size:25px;"></i>
						<label for="contato"><?php echo ((isset($usuario)) ? $usuario['contato'] : ""); ?></label>
					</div>
				</div>
			</div>
		</div> <!-- Fim Dados -->
	</div>
	
	<br><br>
	<hr>
	<br><br>
	<!-- Dados -->
	<div>
		<div>
	
			<div class="row" style="justify-content: center; align-items: center;">
				<a class="btn btn-primary btn-lg ml-5" href="treinos?matricula=<?php echo $_GET['matricula'];?>">Treinos</a>		
				<a class="btn btn-primary btn-lg ml-5" href="avaliacoesFisicas?matricula=<?php echo $_GET['matricula'];?>">Avaliações Físicas</a>		
			</div>	
		</div>
	</div>
	
	

</div>

