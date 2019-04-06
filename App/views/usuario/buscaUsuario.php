<script type="text/javascript">
	document.getElementById("title").innerHTML = "Buscar Usuário";
</script>

<!-- Modal de Delete-->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&timesc;</span></button>
			</div>
		
			<div class="modal-body"> Deseja realmente excluir este item? </div>
			<div class="modal-footer">
				<a id="confirm" class="btn" style="background: #B71C1C; color:white;" href="#">Sim</a>
				<a id="cancel" class="btn btn-default" data-dismiss="modal">N&atilde;o</a>
			</div>
		</div>
	</div>
</div> <!-- Fim Modal de Delete -->


<div class="page-header">
	<h1 class="all-tittles">Sistema Academia <small>Buscar usuários</small></h1><hr><hr><br>
</div>

<div >
	
	<div id="main" class="main mt-3">
		
			<!-- #top -->
			<div id="top" class="row">
				<div class="col-md-3"></div>
			 
				<div class="col-md-6">
					
					<div class="input-group h2">
						<input name="pesquisar"  class="form-control campo-texto-arredondado" type="text" placeholder="Pesquisa" aria-label="Search">
						<a href="buscarUsuario" class="btn btn btn-outline-success botao-pesquisa" ><i class="fa fa-search"></i></a>
						
					</div>
				</div>
			 
				<div class="col-md-3" style="">
					<a href="gerarRelatorio?relatorio=listaTodos<?php if($_GET['tipo'] == '3'){ echo 'Alunos';} else{ echo 'Professores'; }  ?>" class="btn btn-outline-danger" style=""><i class="fa fa-file-pdf-o" style="font-size:36px"></i></a>
				</div>
			</div>
		
		<br>
		
		<div class="col-md-12">
			<table class="table">
				<tr>
					<th>Usuario</th>
					<th>Matricula</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Tipo</th>
					
					<th class="actions"></th>
				</tr>
			

				<?php $usuarios = $_SESSION['USUARIOS']; unset($_SESSION['USUARIOS']);
					  $campos = array('usuario', 'matricula', 'nome', 'email', 'tipo_usuario');

						
						foreach($usuarios as $usu) {?>			
							<tr>
							<?php foreach($campos as $c) {?>
							
								<td><?= ($c == 'usuario') ? "<img src='Imagens/" . (($usu['nome_imagem'] != null) ? "Perfil/{$usu['nome_imagem']}" : "sem_foto.png" ) . "' alt='person' class='img-circular mr-2' style='width:50px; height:50px'/> @". $usu["{$c}"] : $usu["{$c}"] ?></td>
							
							<?php }?>
							
							<td style="text-align: right;">						
								<a href="telaAluno?matricula=<?php echo $usu["matricula"]; ?>" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
								
								<a href="editarUsuario?tipo=<?php echo strtolower($usu["tipo_usuario"]); ?>&matricula=<?php echo $usu["matricula"]; ?>" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></a>
								
								<a  href=#" class="btn btn-outline-danger"
								data-matricula = "<?php echo $usu["matricula"]; ?>" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash" style="font-size:24px"></i></a>
							</td>
						</tr>
				<?php }?>
			</table>
		</div>
	</div>

</div>