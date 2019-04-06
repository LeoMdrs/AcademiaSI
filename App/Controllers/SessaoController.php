<?php

namespace App\Controllers;

use SON\Controller\Action;
use \SON\Di\Container;
use SON\init\Seguranca;
use \App\Models\apiSessao;

class SessaoController extends Action{
	
	public function login(){						//echo "<br> ENtrou login de Sessao <br>";
		
		//renderizando a view
		$this->render('login');
	}
	
	public function logout(){						//echo "<br> ENtrou logout de Sessao <br>";
		
		unset($_SESSION['Email']);
		unset($_SESSION['Senha']);
		unset($_SESSION['NivelAcesso']);
		unset($_SESSION['Nome']);
		unset($_SESSION['Matricula']);
		unset($_SESSION['Imagem']);
		unset($_SESSION['UsuarioLogado']);
		
		header('location: sessao');
	}
	
	public function validacaoLogin(){					//echo "<br>Entrou validar<br>";
		
		$sessao = new \App\Objects\Sessao('POST');
		$apiSessao = new apiSessao();
		header("location: " . $apiSessao->verificarLogin($sessao) . "");
	}
}