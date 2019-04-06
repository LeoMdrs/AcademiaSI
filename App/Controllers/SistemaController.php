<?php

namespace App\Controllers;

use SON\Controller\Action;
use \SON\Di\Container;
use SON\init\Seguranca;
use App\Models\apiSistema;
use App\Models\apiRelatorios;

class SistemaController extends Action{
	
	public function __costruct(){
		
		parent::__construct();

		//$init = new Seguranca;		
	}
	
	
	//Metodos que renderizam as telas
	
	public function relatorios(){
		
		$init = new Seguranca;
		
		//renderizando a view
		$this->render('relatorios');
	}
	
	public function gerarRelatorio(){
		
		$init = new Seguranca;
		
		$relatorio = $_GET['relatorio'];

		$apiRelatorios = new apiRelatorios();
		$apiRelatorios->gerarRelatorio($relatorio);
		/*header("location: telaInicial");*/
	}

}



