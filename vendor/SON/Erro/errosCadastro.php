<?php // Exibição de erros encontrados no processo

	$erros = array(
		'1'=>'Cpf já está associado à algum usuário.',
		'2'=>'Email já está associado à algum usuário.',
		'3'=>'Senha já está associada à algum usuário.',
		'4'=>'Nome de usuário já está associado à algum usuário.'
	);

	if(isset($_GET['sucess'])){
		if( $_GET['sucess'] == 'true'){
			echo" <div class='alert alert-success alert-dismissible'>";
			echo" <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			if(isset($usuario)){
				echo" <strong>Atualização de dados realizada.</strong> O usuario foi atualizado no banco de dados.";
			} else {
				echo" <strong>Cadastro realizado.</strong> O usuario foi inserido no banco de dados.";
			}
			echo" </div>";
		
		} else if ( $_GET['sucess'] == 'false'){
			echo" <div class='alert alert-danger alert-dismissible'>";
			echo" <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			echo" <strong>Cadastro não realizado.</strong> O usuario não foi inserido no banco de dados.";
			
			$qtderros = $_GET['qtd'];
			for($i = 0; $i <$qtderros; $i++){
				echo "<br>- " . $erros[$_GET[$i]];
				
			}
			echo" </div>";
		}
	}