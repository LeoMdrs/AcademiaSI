<?php // Exibição de erros encontrados no processo

	$erros = array(
		'1'=>'A matrícula informada não está associado à nenhum usuário.',
	);

	if(isset($_GET['sucess'])){
		if( $_GET['sucess'] == 'true'){
			echo" <div class='alert alert-success alert-dismissible'>";
			echo" <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo" <strong>O pagamento foi realizado com sucesso.</strong>";
			echo" </div>";
		
		} else if ( $_GET['sucess'] == 'false'){
			echo" <div class='alert alert-danger alert-dismissible'>";
			echo" <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			echo" <strong> O pagamento não foi realizado.</strong>";
			
			$qtderros = $_GET['qtd'];
			for($i = 0; $i <$qtderros; $i++){
				echo "<br>- " . $erros[$_GET[$i]];
				
			}
			echo" </div>";
		}
	}