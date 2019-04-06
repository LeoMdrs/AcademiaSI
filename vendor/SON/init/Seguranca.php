<?php
namespace SON\init;

class Seguranca{
	
	public function __construct(){
		
		if(!isset($_SESSION['UsuarioLogado']) || empty($_SESSION['UsuarioLogado']) ){
																	
			header('location: sessao');
			//exit();
		}
	
	}
}