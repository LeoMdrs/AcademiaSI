<?php

namespace SON\Db;
use SON\Db;
use PDO;

abstract class Table extends Conexao{

	protected $con;
	protected $table = "usuarios";
	
	//Faz a conexão com o BD ao instanciar a classe. Por padrão está para ser usado o BD mysql
	public function __construct($driver = 'mysql'){
        try {
            switch($driver){
                case 'mysql':
                    $this->con = new PDO("mysql:host=" . self::Myhost . ";dbname=" . self::Mydbname, self::Myuser, self::Mypass);
										
					$this->con->exec("set names " . self::charset);
					break;
                case 'firebird':
                    $this->con = new PDO("firebird:dbname=" . self::Firedbname . ";host=" . self::Firehost . ";charset=". self::charset, self::Fireuser, self::Firepass);
                    break;
            }
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $ex){
            
			foreach(PDO::getAvailableDrivers() as $driver) {
                echo $driver . "<br>";
            }
            die($ex->getMessage());
        }
	}
	
	
	public function Insert($object, $table){
        try {
            $sql = "INSERT INTO {$table} (".implode(",",array_keys((array)$object)).") VALUES ('".implode("','",array_values((array)$object))."')";
			
            $state = $this->con->prepare($sql);
			
            $state->execute();
        } catch(PDOException $ex){
            $this->Log($ex->getMessage(), $sql);
            die($ex->getMessage() .  $sql);
        }
       return array('sucess'=>true, 'feedback'=>'Inserido', 'codigo'=>$this->Last($table));
    }
	
	public function Select($sql){
		
        try {
            		
            $state = $this->con->prepare($sql);
			$state->execute();
			
        } catch(PDOException $ex){
            $this->Log($ex->getMessage(), $sql);
            die($ex->getMessage() . ' ' . $sql);
        }
        $array = array();
        while($row = $state->fetchObject()){
            $array[] = $row;
        }

        return $array;
    }
	
	
	public function Delete($condition, $table){
        try {
            foreach ($condition as $ind => $val) {
                $where[] = "{$ind} = {$val}";
            }
			echo $condition;
            $sql = "DELETE FROM {$table} WHERE " . implode(' AND ', $where);
				echo $sql;
            $state = $this->con->prepare($sql);
            $state->execute();
        } catch(PDOException $ex){
            $this->Log($ex->getMessage(), $sql);
            die($ex->getMessage());
        }
        return array('sucess'=>true, 'feedback'=> '');
    }
	
	
	
	public function Update($object, $condition, $table){
		
        try {
            foreach ($object as $ind => $val) {
				
				
					$dados[] = "{$ind} = " . "'{$val}'";

            }
            foreach ($condition as $ind => $val) {

					$where[] = "{$ind} = " . "{$val}";

            }
			
            $sql = "UPDATE {$table} SET " . implode(', ', $dados) . " WHERE " . implode(' AND ', $where);
echo($sql);
            $state = $this->con->prepare($sql);
            $state->execute();
			
        } catch(PDOException $ex){
            $this->Log($ex->getMessage(), $sql);
            die($ex->getMessage() .  $sql);
        }

        return array('sucess'=>true, 'feedback'=> 'Atualizado');
    }
	
	
	
	
	//Recupera a ultima inserção do banco
	public function Last($table){
        try {
            $state = $this->con->prepare("SELECT last_insert_id() as last FROM {$table}");
            $state->execute();
            $state = $state->fetchObject();

			
        } catch(PDOException $ex){
            die($ex->getMessage() . $table);
        }
        return isset($state->last) ? $state->last : null;
    }
	
}