<?php
	use App\Objects\Sessao;
	$sessao = $_SESSION['UsuarioLogado'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title id="title"></title>
	
    <!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	
	<!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/estilo/estiloSidebar.css">
	<link rel="stylesheet" href="css/estilo/estiloAdmin.css">
	 
	<!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<!-- Icones -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	
	<script type="text/javascript" src="js/comportamento/funcao.js"></script> 	

	
</head>

<body>


    <div class="whaper">

		<!-- Sidebar  -->
        <nav id="sidebar" style="box-shadow: 5px 5px 20px 0 rgba(0, 0, 0, 0.2);">

			<div class="sidebar-header">
				<!-- Nome do sistema -->
				<nav class="navbar mb-4" style="line-height: 66px; background-color: #ff8000; justify-content: center; ">
					<a class="navbar-brand" style="color: white; font-weight:bold;" href="#" style="">SISTEMA ACADEMIA</a>
				</nav>

				<div class="sidenav-header-inner text-center">
					<img src='Imagens/logo2.jpg' alt="person" class="img-circular" style="width:160px; height:160px">
					<h2 class="mt-2 h5" style="color: #ff8000;">ACADEMIA X</h2><span>slogan</span>
				</div>
			</div>
			
            <ul class="list-unstyled components">
				<li class="active">
                    <a href="telaInicial"><i class="fa fa-tachometer mr-2" style="font-size:24px"></i> Início</a>
                </li>
                <li>
					<a href="telaAluno?matricula=<?php echo $_SESSION['Matricula']; ?>"><i class="fa fa-smile-o mr-2" style="font-size:24px"></i>  Perfil</a>
                </li>
                <li>
					<a href="buscarUsuario?tipo=3" ><i class="fa fa-search mr-2" style="font-size:24px"></i> Buscar Aluno</a>
				</li>
				<li>
					<a href="cadastrarUsuario?tipo=aluno"><i class="fa fa-plus mr-2" style="font-size:24px"></i> Adicionar Aluno</a>
				</li>
				<li>
					<a href="buscarUsuario?tipo=2"><i class="fa fa-search mr-2" style="font-size:24px"></i> Buscar Professor</a>
				</li>
				<li>
					<a href="cadastrarUsuario?tipo=professor"><i class="fa fa-plus mr-2" style="font-size:24px"></i> Adicionar Professor</a>
				</li>
                <li>
                    <a href="pagamentos"><i class="fa fa-money mr-2" style="font-size:24px"></i> Pagamentos</a>
                </li>
                <li>
					<a href="relatorios"><i class="fa fa-bar-chart mr-2" style="font-size:24px"></i> Relatorios e Estatísticas</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book mr-2" style="font-size:24px"></i> Sobre</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
            </ul>
        </nav>
				
		<!-- Page Content  -->
		<div id="content">

			<nav class="navbar" style="background-color: #243e56; ">
			<div class="form-inline">
				<div id="sidebarCollapse" class="">
					<a class="nav-link icone-nav pl-0 mr-3" style="color:rgba(255, 255, 255, 0.7);"><i class="fa fa-reorder" style="font-size:36px;"></i></a>
				</div>
			
				<form class="mt-2 mt-md-0 input-group">
					<input name="pesquisar"  class="form-control campo-texto-arredondado" style="border: none;" type="text" placeholder="Pesquisa" aria-label="Search">
					<a href="buscarUsuario" class="btn btn-outline-success botao-pesquisa" ><i class="fa fa-search"></i></a>
				</form>


			</div>
			<div class="form-inline" style="">
				
				<a class="nav-link icone-nav" style="color:rgba(255, 255, 255, 0.7); text-align: center;" href="#" ><i class="fa fa-question-circle-o" style="font-size:36px;"></i></a>
				<a class="nav-link icone-nav" href="logout" style="color:rgba(255, 255, 255, 0.7);"><i class="fa fa-power-off" style="font-size:36px;"></i></a>

				<a class="nav-link" href="#" style="color: white; font-size: 20px"><?php echo "@" . $_SESSION['UsuarioLogado'] ?></a>
				<a class="nav-link" href="#"><img src='Imagens/Perfil/<?php echo $_SESSION['Imagem'] ?>' alt="person" class="img-circular" style="width:50px; height:50px"></a>
			</div>	
		</nav>

			<!-- Conteudo -->
			<div id="page">
				<?php $this->content(); ?>
			</div>

			
		</div>
	</div>

	<!-- JQuery, Jquery Mask
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>-->
	<script src="js/jquery.mask.min.js" type="text/javascript"></script>
	
    <!-- Popper.JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Bootstrap JS-->
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

    <!-- jQuery Custom Scroller-->
	<script src="js/jquery.mCustomScrollbar.js" type="text/javascript"></script>

    <!-- Nossos JS's customizados-->
	<script src="js/comportamento/comportamentoMascara.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	
		$('#delete-modal-avaliacao').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var avaliacao = button.data('avaliacao');
			var modal = $(this);
			modal.find('.modal-title').text('Excluir avaliacao #' + avaliacao);
			modal.find('#confirm').attr('href', 'removerAvaliacao?avaliacao=' + avaliacao + "&matricula=<?php echo (isset($_GET['matricula']) ? $_GET['matricula'] : ""); ?>" );
		})
		
		$('#delete-modal-treino').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var treino = button.data('treino');
			var modal = $(this);
			modal.find('.modal-title').text('Excluir treino #' + treino);
			modal.find('#confirm').attr('href', 'removerTreino?id_treino=' + treino + "&matricula=<?php echo (isset($_GET['matricula']) ? $_GET['matricula'] : ""); ?>" );
		})
		
		
	</script>
	
</body>

</html>