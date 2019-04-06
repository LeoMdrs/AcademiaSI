<?php

namespace App\Controllers;

use SON\Controller\Action;
use \SON\Di\Container;
use SON\init\Seguranca;
use App\Models\apiUsuario;
use App\Models\apiAluno;

class AlunoController extends Action{
	
	public function __costruct(){
		
		parent::__construct();

		//$init = new Seguranca;		
	}
	
	
	//Metodos que renderizam as telas
	
	public function telaAluno(){
		
		$init = new Seguranca;
		
		$matricula = $_GET['matricula'];	//pega a matricula do usuario a ser editado
				
		$apiUsuario = new apiUsuario();
		$_SESSION['TelaUsuario'] = $apiUsuario->selecionar($matricula);
		
		//renderizando a view
		$this->render('telaAluno');
	}
	
	public function avaliacoesFisicas(){
		
		$init = new Seguranca;
		
		$matricula = $_GET['matricula'];
		
		$apiAluno = new apiAluno();
		
		$_SESSION['AVALIACOES'] = $apiAluno->listarAvaliacao($matricula);
		
		
		//renderizando a view
		$this->render('avaliacoesFisicas');
	
	}
	
	public function treinos(){
		
		$init = new Seguranca;
		
		$matricula = $_GET['matricula'];
		
		$apiAluno = new apiAluno();
		
		$_SESSION['Treinos'] = $apiAluno->listarTreinos($matricula);
		
		
		//renderizando a view
		$this->render('treinos');
	
	}
	
	public function novaAvaliacaoFisica(){
		
		$init = new Seguranca;
		
		//renderizando a view
		$this->render('novaAvaliacaoFisica');
	}
	
	public function verAvaliacaoFisica(){
		
		$init = new Seguranca;
		
		$id_avaliacao = $_GET['id_avaliacao'];	//pega a id_avaliacao do usuario a ser editado
				
		$apiAluno = new apiAluno();
		$_SESSION['VerAvaliacao'] = $apiAluno->selecionarAvaliacao($id_avaliacao);
		
		//renderizando a view
		$this->render('novaAvaliacaoFisica');
	}	
	
	
	public function treino(){
		 
		$init = new Seguranca;
		
		//renderizando a view
		$this->render('treino');
	}
	
	public function verTreino(){
		
		$init = new Seguranca;
		
		$id_treino = $_GET['id_treino'];	//pega a id_treino do treino a ser editado
				
		$apiAluno = new apiAluno();
		$_SESSION['VerTreino'] = $apiAluno->selecionarTreino($id_treino);
		$_SESSION['VerExercicios'] = $apiAluno->selecionarExercicios($id_treino);

		//renderizando a view
		$this->render('treino');
	}
	
	public function editarTreino(){
		 
		$init = new Seguranca;
		
		$_SESSION['EditarTreino'] = 'true';
		$this->verTreino();
	}
	
	
	public function pagamentos(){
		
		$init = new Seguranca;
				
		
		//renderizando a view
		$this->render('pagamentos');
	
	}


	
	
	//Metodos que finalizam o processo
	
	public function salvarAvaliacao(){
		
		$avaliacao = new \App\Objects\Avaliacao('POST');

		$avaliacao->matricula_aluno = $_GET['matricula'];
		$avaliacao->realizacao = date('Y-m-d h:m:s');
		$avaliacao->professor = $_SESSION['Nome'];
		
		$apiAluno = new apiAluno();
		$apiAluno->salvarAvaliacao($avaliacao);
		
		header("location: avaliacoesFisicas?matricula=" . $_GET['matricula']);

	}
	

	public function removerAvaliacao(){
		
		$id_avaliacao = $_GET['avaliacao'];
		$matricula = $_GET['matricula'];
		$apiAluno = new apiAluno();
		$apiAluno->removerAvaliacao($id_avaliacao);
		
		header("location: avaliacoesFisicas?matricula=" . $matricula);
	}
	
	
	
	
	public function salvarTreino(){

		
		$treino = new \App\Objects\Treino('POST');
		
		$apiAluno = new apiAluno();
		
		$acao = $_GET['acao'];
		if($acao == 'adicionar'){
			$apiAluno->salvarTreino($treino);
		
		} else if ($acao == 'atualizar'){
			$id_treino = $_GET['id_treino'];
			$apiAluno->atualizarTreino($id_treino, $treino);
		}
		
		header("location: treinos?matricula=" . $treino->matricula_aluno);
	}
	
	public function removerTreino(){
		
		$id_treino = $_GET['id_treino'];

		$apiAluno = new apiAluno();
		$apiAluno->removerTreino($id_treino);
		
		header("location: treinos?matricula=" . $_GET['matricula']);
	}



	public function realizarPagamento(){
	
		
		$pagamento = new \App\Objects\Pagamento('POST');
		
		$apiAluno = new apiAluno();
		
		header("location: pagamentos" . $apiAluno->realizarPagamento($pagamento));
	}

}



