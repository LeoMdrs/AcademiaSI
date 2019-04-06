<?php

namespace App\Models;

use SON\Db\Table;
use App\Objects\Sessao;

class apiSessao extends Table{
	
		
		public function verificarLogin(Sessao $sessao){

			$return = "telaInicial";
			
			$login = $this->Select("SELECT id_login, senha, nivel_acesso FROM login WHERE email = '" . $sessao->email . "'");
				
			if(!empty($login)){
				
				if( $login[0]->senha == $sessao->senha ){
					
					$matricula = $this->Select("SELECT matricula, nome, usuario, id_imagem FROM usuarios WHERE login = " . $login[0]->id_login);
					$nivel_acesso = $this->Select("SELECT tipo_usuario FROM nivel_usuario WHERE nivel_acesso = " . $login[0]->nivel_acesso);
					$imagem = $this->Select("SELECT nome_imagem FROM imagem WHERE id_imagem = " . $matricula[0]->id_imagem);

					$_SESSION['Email'] = $sessao->email;
					$_SESSION['Senha'] = $sessao->senha;
					$_SESSION['NivelAcesso'] = $nivel_acesso[0]->tipo_usuario;
					$_SESSION['Nome'] = $matricula[0]->nome;
					$_SESSION['Matricula'] = $matricula[0]->matricula;
					$_SESSION['UsuarioLogado'] = $matricula[0]->usuario;
					$_SESSION['Imagem'] = $imagem[0]->nome_imagem;

				} else {
					$return = "sessao?sucess=false&erro=Senha";
				}
					
			} else {
				$return = "sessao?sucess=false&erro=Email";
			}
			
			return $return;
		}

}