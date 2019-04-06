<?php

namespace App;

use SON\init\Bootstrap;
use PDO;

class Init extends Bootstrap{
		
	protected function initRoutes(){
		
		$ar['home'] = array('route'=>'/', 'controller'=>'UsuarioController', 'action'=>'telaInicial');
		
		$ar['telaInicial'] = array('route'=>'/telaInicial', 'controller'=>'UsuarioController', 'action'=>'telaInicial');
		
		$ar['cadastrarUsuario'] = array('route'=>'/cadastrarUsuario', 'controller'=>'UsuarioController', 'action'=>'cadastrarUsuario');
		
		$ar['salvarUsuario'] = array('route'=>'/salvarUsuario', 'controller'=>'UsuarioController', 'action'=>'salvarUsuario');
		
		$ar['buscarUsuario'] = array('route'=>'/buscarUsuario', 'controller'=>'UsuarioController', 'action'=>'buscarUsuario');
		
		$ar['removerUsuario'] = array('route'=>'/removerUsuario', 'controller'=>'UsuarioController', 'action'=>'removerUsuario');
		
		$ar['editarUsuario'] = array('route'=>'/editarUsuario', 'controller'=>'UsuarioController', 'action'=>'editarUsuario');
		
		
		
		
		$ar['telaAluno'] = array('route'=>'/telaAluno', 'controller'=>'AlunoController', 'action'=>'telaAluno');
		
		$ar['avaliacoesFisicas'] = array('route'=>'/avaliacoesFisicas', 'controller'=>'AlunoController', 'action'=>'avaliacoesFisicas');
		
		$ar['novaAvaliacaoFisica'] = array('route'=>'/novaAvaliacaoFisica', 'controller'=>'AlunoController', 'action'=>'novaAvaliacaoFisica');
		
		$ar['salvarAvaliacao'] = array('route'=>'/salvarAvaliacao', 'controller'=>'AlunoController', 'action'=>'salvarAvaliacao');
		
		$ar['removerAvaliacao'] = array('route'=>'/removerAvaliacao', 'controller'=>'AlunoController', 'action'=>'removerAvaliacao');
		
		$ar['verAvaliacaoFisica'] = array('route'=>'/verAvaliacaoFisica', 'controller'=>'AlunoController', 'action'=>'verAvaliacaoFisica');
		
		$ar['pagamentos'] = array('route'=>'/pagamentos', 'controller'=>'AlunoController', 'action'=>'pagamentos');
		
		$ar['realizarPagamento'] = array('route'=>'/realizarPagamento', 'controller'=>'AlunoController', 'action'=>'realizarPagamento');


		
		$ar['treinos'] = array('route'=>'/treinos', 'controller'=>'AlunoController', 'action'=>'treinos');
		
		$ar['treino'] = array('route'=>'/treino', 'controller'=>'AlunoController', 'action'=>'treino');
		
		$ar['verTreino'] = array('route'=>'/verTreino', 'controller'=>'AlunoController', 'action'=>'verTreino');
		
		$ar['salvarTreino'] = array('route'=>'/salvarTreino', 'controller'=>'AlunoController', 'action'=>'salvarTreino');
		
		$ar['editarTreino'] = array('route'=>'/editarTreino', 'controller'=>'AlunoController', 'action'=>'editarTreino');
		
		$ar['removerTreino'] = array('route'=>'/removerTreino', 'controller'=>'AlunoController', 'action'=>'removerTreino');
		
		
		
		
		$ar['sessao'] = array('route'=>'/sessao', 'controller'=>'SessaoController', 'action'=>'login');
		
		$ar['validacaoLogin'] = array('route'=>'/validacaoLogin', 'controller'=>'SessaoController', 'action'=>'validacaoLogin');
		
		$ar['logout'] = array('route'=>'/logout', 'controller'=>'SessaoController', 'action'=>'logout');
		


		$ar['imagemUpload'] = array('route'=>'/imagemUpload', 'controller'=>'UsuarioController', 'action'=>'imagemUpload');


		//Sistema

		$ar['relatorios'] = array('route'=>'/relatorios', 'controller'=>'SistemaController', 'action'=>'relatorios');
		
		$ar['gerarRelatorio'] = array('route'=>'/gerarRelatorio', 'controller'=>'SistemaController', 'action'=>'gerarRelatorio');


		$this->setRoutes($ar);


	}

}