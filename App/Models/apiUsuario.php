<?php

namespace App\Models;

use SON\Db\Table;
use App\Controllers\UsuarioController;

class apiUsuario extends Table{
	
		public function salvar($obj){
			
			$erros = array();
			$sucesso = "true";
			$retorno = "";
			
			$cpfVerif = $this->Select("SELECT cpf FROM usuarios WHERE cpf = " . $obj->cpf);
			
			if(!empty($cpfVerif)){
				$sucesso = "false";
				$erros[] = 1;			
			}
			
			$loginVerif = $this->Select("SELECT email FROM login WHERE email = '" . $obj->email . "'");
			
			if(!empty($loginVerif)){
				$this->sucesso = "false";
				$erros[] = 2;
			}
			
			$senhaVerif = $this->Select("SELECT senha FROM login WHERE senha = '" . $obj->senha . "'");
			
			if(!empty($senhaVerif)){
				$sucesso = "false";
				$erros[] = 3;
			}
			
			$usuarioVerif = $this->Select("SELECT usuario FROM usuarios WHERE usuario = '" . $obj->usuario . "'");
			
			if(!empty($usuarioVerif)){
				$sucesso = "false";
				$erros[] = 4;
			}
			
			if($sucesso == "true"){
				
				//preenchendo primeiro a tabela login
				$login = array("email"=>$obj->email, "senha"=>$obj->senha, "nivel_acesso"=>$obj->nivel_acesso);
				$this->Insert($login, 'login');
				
				$imagem = array('nome_imagem'=>null);
				$this->Insert($imagem, 'imagem');
				$id_imagem = $this->Last("imagem");

				$id_login = $this->Select("SELECT id_login FROM login WHERE email = '" . $obj->email . "'");
				

				$usuario = array(	"nome"=>$obj->nome,
									"usuario"=>$obj->usuario,
									"cpf"=>$obj->cpf,
									"rg"=>$obj->rg,
									"nascimento"=>$obj->nascimento,
									"sexo"=>$obj->sexo,
									"endereco"=>$obj->endereco,
									"bairro"=>$obj->bairro,
									"cidade"=>$obj->cidade,
									"estado"=>$obj->estado,
									"cep"=>$obj->cep,
									"telefone"=>$obj->telefone,
									"contato"=>$obj->contato,
									"data_cadastro"=>$obj->data_cadastro,										
									"login"=>$id_login[0]->id_login,
									'id_imagem'=>$id_imagem
								);
					
				$this->Insert($usuario, 'usuarios');
					
				$retorno = "&sucess=true";
				
			} else {
				$retorno = "&sucess=false&qtd=" . count($erros) . "&" .  http_build_query($erros);
			}			
					
			return $retorno;
		}
		
		
		
		
		
		public function listar($tipoUsuario){
			
			$where = "";
			
			if(!($tipoUsuario == "")){
				$where = "WHERE nivel_acesso = {$tipoUsuario}";
			}
			
			$usuarios = array();

			
			$logins = $this->Select("SELECT id_login, email, nivel_acesso FROM login {$where}");
			
			foreach($logins as $log){
			
				$u = array();
			
				foreach($log as $atributoL => $valorL){
					
					if(!($atributoL == "id_login") && !($atributoL == "nivel_acesso")){
						$u[$atributoL] = $valorL;
					}
				}
			
				$tabelaUsuario = $this->Select("SELECT matricula, nome, usuario, id_imagem FROM usuarios WHERE login = {$log->id_login}");
				
				foreach($tabelaUsuario as $tabUsr){
					foreach($tabUsr as $atributoT => $valorT){
						$u[$atributoT] = $valorT;
					}
				}

				$tipo = $this->Select("SELECT tipo_usuario FROM nivel_usuario WHERE nivel_acesso = {$log->nivel_acesso}");
				$u['tipo_usuario'] = $tipo[0]->tipo_usuario;
				
				$nome_imagem = $this->Select("SELECT nome_imagem FROM imagem WHERE id_imagem = {$tabelaUsuario[0]->id_imagem}");
				$u['nome_imagem'] = $nome_imagem[0]->nome_imagem;

				$usuarios[] = $u;
			}

			return $usuarios;
		}
		
		
		
		public function selecionar($matricula){

			$usuario = array();
			
			$sqlUser = "SELECT * FROM usuarios WHERE matricula =" . $matricula;
			
			$user = $this->Select($sqlUser);				
			
			foreach($user[0] as $atributou => $valorou){
				
				$usuario[$atributou] = $valorou;	
				
			}
							
			$sqlLog = "SELECT * FROM login WHERE id_login =" . $usuario['login'];
			
			$login = $this->Select($sqlLog);
			
			foreach($login[0] as $atributol => $valorol){
				$usuario[$atributol] = $valorol;
			}
			
			$sqlImg = "SELECT nome_imagem FROM imagem WHERE id_imagem =" . $usuario['id_imagem'];
			$imagem = $this->Select($sqlImg);

			$usuario['nome_imagem'] = $imagem[0]->nome_imagem;

			return $usuario;
		}
		
		public function remover($matricula){
			
			$log = $this->Select("SELECT login FROM usuarios WHERE matricula =" . $matricula['matricula']);
			
			$login = array();
			$login['id_login'] = $log[0]->login;
			
			$this->Delete($matricula, "usuarios");
						
			$this->Delete($login, "login");
		}
		
		
		
		
		public function atualizar($obj){
			
			$erros = array();
			$sucesso = "true";
			$retorno = "";
			
			$usr = $this->Select("SELECT login, matricula FROM usuarios WHERE cpf = " . $obj->cpf);
			
			$sqlcpf = "SELECT cpf FROM usuarios WHERE cpf = " . $obj->cpf . " AND matricula <> " . $usr[0]->matricula;
			
			$cpfVerif = $this->Select($sqlcpf);
			
			if(!empty($cpfVerif)){
				$sucesso = "false";
				$erros[] = 1;			
			}
			
			$loginVerif = $this->Select("SELECT email FROM login WHERE email = '" . $obj->email . "'"  . " AND id_login <> " . $usr[0]->login);
			
			if(!empty($loginVerif)){
				$this->sucesso = "false";
				$erros[] = 2;
			}
			
			$senhaVerif = $this->Select("SELECT senha FROM login WHERE senha = '" . $obj->senha . "'"  . " AND id_login <> " . $usr[0]->login);
			
			if(!empty($senhaVerif)){
				$sucesso = "false";
				$erros[] = 3;
			}
			
			$usuarioVerif = $this->Select("SELECT usuario FROM usuarios WHERE usuario = '" . $obj->usuario . "'"  . " AND matricula <> " . $usr[0]->matricula);
			
			if(!empty($usuarioVerif)){
				$sucesso = "false";
				$erros[] = 4;
			}
			
			if($sucesso == "true"){
				
				$matricula = array();
				$matricula['matricula'] = $usr[0]->matricula;
				
				$usuario = array(	"nome"=>$obj->nome,
									"usuario"=>$obj->usuario,
									"cpf"=>$obj->cpf,
									"rg"=>$obj->rg,
									"nascimento"=>$obj->nascimento,
									"sexo"=>$obj->sexo,
									"endereco"=>$obj->endereco,
									"bairro"=>$obj->bairro,
									"cidade"=>$obj->cidade,
									"estado"=>$obj->estado,
									"cep"=>$obj->cep,
									"telefone"=>$obj->telefone,
									"contato"=>$obj->contato,
								);
								
					
				$this->Update($usuario, $matricula, 'usuarios');
				
				
				$id_login = array();
				$id_login['id_login'] = $usr[0]->login;
				
				$login = array("email"=>$obj->email, "senha"=>$obj->senha);
				
				$this->Update($login, $id_login, 'login');
					
				$retorno = "&sucess=true";
				
			} else {
				$retorno = "&sucess=false&qtd=" . count($erros) . "&" .  http_build_query($erros);
			}			
					
			return $retorno;
		}
		

		public function uploadImagem($matricula){

			echo $_FILES[ 'arquivo' ][ 'name' ];

			if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {

				$erro = array();
				$sucesso = "true";

				$arquivo = $_FILES[ 'arquivo' ];
				$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
				$nome = $_FILES[ 'arquivo' ][ 'name' ];
			 
				// Pega a extensão
				$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
			 
				// Converte a extensão para minúsculo
				$extensao = strtolower ( $extensao );
				echo  "<br>" . $extensao . "<br>";
			 
				// Somente imagens, .jpg;.jpeg;.png
				// Aqui eu enfileiro as extensões permitidas e separo por ';'
				// Isso serve apenas para eu poder pesquisar dentro desta String
				if ( !(strstr ( '.jpg;.jpeg;.png', $extensao )) ) {
					echo 'Entrou extensao<br>';
					$erro[] = "Você poderá enviar apenas arquivos *.jpg;*.jpeg;*.png";
					$sucesso = "false";
				}

				// Cria um nome único para esta imagem
				// Evita que duplique as imagens no servidor.
				// Evita nomes com acentos, espaços e caracteres não alfanuméricos
				$novoNome = uniqid ( time () ) . '.' . $extensao;
			
				// Concatena a pasta com o nome
				$destino = 'Imagens/Perfil/' . $novoNome;
			 

				// Tamanho máximo do arquivo (em bytes)
				$config["tamanho"] = 106883;
				// Largura máxima (pixels)
				$config["largura"] = 500;
				// Altura máxima (pixels)
				$config["altura"] = 500;

				if($arquivo["size"] > $config["tamanho"]) {
					echo 'Entrou tamanho<br>';
					$erro[] = "Arquivo em tamanho muito grande! A imagem deve ser de no máximo " . $config["tamanho"] . " bytes. Envie outro arquivo";
					$sucesso = "false";
				}

				// Para verificar as dimensões da imagem
				$tamanhos = getimagesize($arquivo["tmp_name"]);
				// Verifica largura
				
				if($tamanhos[0] > $config["largura"]) {
					echo 'Entrou largura<br>';
					$erro[] = "Largura da imagem não deve ultrapassar " . $config["largura"] . " pixels";
					$sucesso = "false";
				} 
					
				// Verifica altura
				if($tamanhos[1] > $config["altura"]) {
					echo 'Entrou altura<br>';
					$erro[] = "Altura da imagem não deve ultrapassar " . $config["altura"] . " pixels";
					$sucesso = "false";
				}

echo "<br>" . $sucesso . "<br>";
print_r(array_values($erro));

				if($sucesso == 'true'){
					echo "entrou";
					// tenta mover o arquivo para o destino
					if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
						echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
						echo '<img src = "' . $destino . '" />';


						$diretorio = "Imagens/Perfil/";
						$id_img = $this->Select("SELECT id_imagem FROM usuarios WHERE matricula =" . $matricula);
						$imagem = $this->Select("SELECT nome_imagem FROM imagem WHERE id_imagem=" . $id_img[0]->id_imagem);
						$imagemQueVaiDeletada = $diretorio . $imagem[0]->nome_imagem;
						$deleta = unlink($imagemQueVaiDeletada);
						
						print_r(array_values($imagem));

						$imagem = array("nome_imagem"=>$novoNome);
						//$this->Insert($imagem, 'imagem');
						$this->Update($imagem, $id_img[0], 'imagem');


						
					}
					else
						echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';

				}
			}
			else
				echo 'Você não enviou nenhum arquivo ou ocorreu um erro desconhecido!';




			/*echo $nomeArquivo;

			$imagem = array("nome_imagem"=>$nomeArquivo);
			$this->Insert($imagem, 'imagem');

			$usuario = array('id_imagem'=> $this->Last("imagem") );
			echo $this->Last("imagem");
			$mat = array('matricula'=>$matricula);
			$this->Update($usuario, $mat, 'usuarios');*/
		}

}