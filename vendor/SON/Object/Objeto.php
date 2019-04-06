<?php

namespace SON\Object;

class Objeto {
	
	public function __construct($method = null){		//echo "<br>-> Instanciou Objeto.php <br>";
		
		if($method == 'POST'){					//echo "<br>-> Entrou no if( method == post )de Objeto.php <br>";
			foreach ($_POST as $ind => $val){
				
				if($ind == 'cpf' || $ind == 'cep'){
					$val = str_replace('.', '', $val);
					$val = str_replace('-', '', $val);
				}
				if($ind == 'nascimento'){
					$val = str_replace('/', '-', $val);
				}
				if($ind == 'telefone'){
					$val = str_replace('(', '', $val);
					$val = str_replace(')', '', $val);
					$val = str_replace('-', '', $val);
				}
				
				if($ind == 'sexo' || $ind == 'estado'){
					if($val == 'escolher'){
						$val = '';
					}
				}
				
				if($ind == 'senha'){
					$val = md5($val);
				}
				
				
				$this->$ind = $this->testar_entrada($val);
				
				//echo "<br>" . $ind. ": " . $this->$ind . "<br>"; 
			}
		}
		
	}

	function testar_entrada($data) {
		$data = trim($data);
		//$data = stripslashes($data);
		//$data = htmlspecialchars($data);
		return $data;
	}	
}
