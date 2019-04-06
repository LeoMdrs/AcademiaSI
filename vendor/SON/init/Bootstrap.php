<?php

namespace SON\init;

abstract class Bootstrap{

	private $routes;
	
	public function __construct(){
		$this->initRoutes();
		$this->run($this->getUrl());				//echo "<br>->GetUrl: " . $this->getUrl() ."<br>";
	}
	
	abstract protected function initRoutes();
	
	protected function run($url){  				//Ex: /empresa //echo "<br> Entrou RUN de Bootstrap <br>";
									
		$encontrou = false;
		
		array_walk($this->routes, function($route) use ($url){//echo "<br> Entrou arraywalk de bootstrap <br>";
			//funcao anonima	
			if ($url == $route['route']){				     //echo "<br> Entrou IF de run de bootstrap <br>";
				
				$class = "App\\Controllers\\".ucfirst($route['controller']);
								
				$action = $route['action'];
				$controller = new $class;
				
				$controller->$action();
				
				$encontrou = true;
			}
		});
		
		if($encontrou == false){
			//include("404.php");
		}
	}
	
	protected function setRoutes(array $routes){
		$this->routes = $routes;
	}
	
	protected function getUrl(){
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);						
	}
	
}