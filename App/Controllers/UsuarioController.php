<?php

namespace App\Controllers;

use SON\Controller\Action;
use \SON\Di\Container;
use SON\init\Seguranca;
use App\Models\apiUsuario;

class UsuarioController extends Action{
	
	public function __costruct(){
		
		parent::__construct();

		//$init = new Seguranca;		
	}
	
	
	//Metodos que renderizam as telas
	
	public function telaInicial(){
		
		$init = new Seguranca;
		
		//renderizando a view
		$this->render('telaInicial');
	}
	
	public function cadastrarUsuario(){
		
		$init = new Seguranca;
		
		//renderizando a view
		$this->render('cadastroUsuario');
	}
	
	public function editarUsuario(){
		
		$init = new Seguranca;
		
		$matricula = $_GET['matricula'];	//pega a matricula do usuario a ser editado
				
		$apiUsuario = new apiUsuario();
		$_SESSION['EditarUsuario'] = $apiUsuario->selecionar($matricula);
		
		//renderizando a view
		$this->render('cadastroUsuario');
	}
	
	
	public function buscarUsuario(){
		
		$init = new Seguranca;
		
		$apiUsuario = new apiUsuario();
		
		$tipoUsuario = "";
		if (isset($_GET['tipo'])) {		//se a variavel tipo estiver setada na url, pegar o valor
			$tipoUsuario = $_GET['tipo'];
		}
		
		$_SESSION['USUARIOS'] = $apiUsuario->listar($tipoUsuario);
		
		//renderizando a view
		$this->render('buscaUsuario');
	}
	
	
	
	
	//Metodos que finalizam o processo
	
	public function salvarUsuario(){
		
		if(isset($_GET['tipo'])){
			
			if($_GET['tipo'] == 'aluno'){
				$usuario = new \App\Objects\Aluno('POST');
			} else if ($_GET['tipo'] == 'professor'){
				$usuario = new \App\Objects\Professor('POST');
			} else {
				header("location: telaInicial");
			}
			
			$apiUsuario = new apiUsuario();
			
			if($_GET['acao'] == 'salvar'){
				$usuario->data_cadastro = date('Y-m-d h:m:s');
				header("location: cadastrarUsuario?tipo={$_GET['tipo']}" . $apiUsuario->salvar($usuario));
			
			} else if ($_GET['acao'] == 'atualizar'){
				header("location: cadastrarUsuario?tipo={$_GET['tipo']}" . $apiUsuario->atualizar($usuario));
			
			} else {
				header("location: cadastrarUsuario?tipo={$_GET['tipo']}");
			}
			
			
		} else {
			header("location: telaInicial");
		}
	}
	
	
	public function removerUsuario(){
		$matricula = array();
		$matricula['matricula'] = $_GET['matricula'];
		
		$apiUsuario = new apiUsuario();
		$apiUsuario->remover($matricula);
		
		header("location: buscarUsuario?tipo={$_GET['tipo']}");
	}




	public function imagemUpload(){

		/*$nome_arquivo = $_FILES['arquivo']['name'];
		$destino = 'Imagens/Perfil/' . $nome_arquivo;
		$arquivo_tmp = $_FILES['arquivo']['tmp_name']; 
		move_uploaded_file( $arquivo_tmp, $destino);
*/
		$matricula = $_GET['matricula'];
		
		$apiUsuario = new apiUsuario();
		$apiUsuario->uploadImagem($matricula);

		header("location: telaAluno?matricula=" . $matricula);


	}

}






