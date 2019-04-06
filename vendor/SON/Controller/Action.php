<?php

namespace SON\Controller;

class Action{

	protected $view;
	protected $action;
	
	public function __costruct(){							//echo "<br> Entrou construtor Action <br>";
		
		if (!isset($res)){
			$this->view = new \stdClass();
		}
	}
	
	public function render($action, $layout=true){			//echo "<br>-> Entrou no Render de Action <br>";
		$this->action = $action;
		
		if($layout == true && file_exists("../App/views/". $this->getArea() ."/layout.php")){		
			include_once '../App/views/'. $this->getArea() .'/layout.php';
		
		} else {
			$this->content();
		}
	}

	private function getArea(){
		$atual = get_class($this);
		$singleClassName = strtolower(str_replace("App\\Controllers\\", "", $atual));
		//retirar a palavra controller do nome da classes
		$singleClassName2 = strtolower(str_replace("controller", "", ($singleClassName)));
		
		return $singleClassName2;
	}
	
	public function content(){
		include_once '../App/views/' . $this->getArea() . '/' . $this->action . '.php';
	}
}