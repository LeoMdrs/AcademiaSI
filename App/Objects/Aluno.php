<?php

namespace App\Objects;

use SON\Object\Objeto;

class Aluno extends Objeto{

	//public $matricula;
	public $nome;
	public $usuario;
	public $cpf;
	public $rg;
	public $nascimento;
	public $sexo;
	public $endereco;
	public $bairro;
	public $cidade;
	public $estado;
	public $cep;
	public $telefone;
	public $contato;
	
	public $imagem;
	//date_default_timezone_set('UTC');

	public $data_cadastro;
	
	public $email;
	public $senha;
	public $nivel_acesso = 3;
	
}