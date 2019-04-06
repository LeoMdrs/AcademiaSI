<script type="text/javascript">
	document.getElementById("tituloPagina").innerHTML = "Treinos de ";
	document.getElementById("title").innerHTML = "Treinos de ";
</script>

<!-- Modal de Delete-->
<div class="modal fade" id="delete-modal-treino" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
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
	<h1 class="all-tittles">Sistema Academia <small>Treinos do aluno</small></h1><hr><hr><br>
</div>

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
	 
		<div class="col-md-3">
			<a href="treino?matricula=<?php echo $_GET['matricula']; ?>" class="btn btn-outline-success" style="width: 200px;">Novo Treino</a>
		</div>
	</div>
	
	<hr />
	
	<div class="col-md-12">
		<table class="table">
			<tr>
				<th>Treino</th>
				<th>Professor</th>
				<th>Data</th>

				<th class="actions"></th>
			</tr>
		

			<?php $treinos = $_SESSION['Treinos']; unset($_SESSION['Treinos']);
				  $campos = array('id_treino', 'professor', 'data_treino');

					
					foreach($treinos as $usu) {?>			
						<tr>
						<?php foreach($campos as $c) {?>
						
							<td><?= $usu->$c ?></td>
						
						<?php }?>
						
						<td style="text-align: right;">						
							<a href="verTreino?id_treino=<?php echo $usu->id_treino; ?>" class="btn btn-outline-primary" ><i class="fa fa-eye"></i></a>
							
							<a href="editarTreino?id_treino=<?php echo $usu->id_treino; ?>&matricula=<?php echo $_GET['matricula']; ?>" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></a>
							
							<a  href="#" class="btn btn-outline-danger"
							data-treino = "<?php echo $usu->id_treino; ?>" data-toggle="modal" data-target="#delete-modal-treino"><i class="fa fa-trash" style="font-size:24px"></i></a>
						</td>
					</tr>
			<?php }?>
		</table>
	</div>
</div>