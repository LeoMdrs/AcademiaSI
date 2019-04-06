<?php

namespace App\Models;

use SON\Db\Table;
use App\Controllers\AlunoController;

class apiAluno extends Table{
	
		public function salvarAvaliacao($avaliacao){
			
			$a = array();
			
			foreach($avaliacao as $atributo => $valor){
				$a[$atributo] = $valor;
			}
			
			$this->Insert($a, 'avaliacao');
		}
		
		

		public function listarAvaliacao($matricula){
			
			
			$avaliacoes = $this->Select("SELECT id_avaliacao, professor, realizacao FROM avaliacao WHERE matricula_aluno = {$matricula}");

			return $avaliacoes;
		}
		
		
		public function removerAvaliacao($avaliacao){
			
			$id_avaliacao['id_avaliacao'] = $avaliacao;
			
			$this->Delete($id_avaliacao, "avaliacao");

		}
		
		
		
		
		public function salvarTreino($treino){
			
			// Salvando os dados do treino na tabela Treino
			$trn = array();

			foreach($treino as $atributo => $valor){
				if($atributo != 'treino'){
					$trn[$atributo] = $valor;
				}
			}
			
			$this->Insert($trn, 'treino');
			$id_treino = $this->Last('treino');
			
			
			// Salvando os exercicios na tabela correspondente e passando o id_treino como chave estraeria
			$exercicios = array();
			$exerc = explode("|", $treino->treino);
			
			foreach($exerc as $atributo){
				$exercicio = explode(",", $atributo);
				$exercicios[] = $exercicio;
			}
			
			print_r(array_values($exercicios));
			
			foreach($exercicios as $exe){
				
				if($exe[0] != ""){
					$exercicio = array();
					$exercicio['nome_exercicio'] = $exe[0];
					$exercicio['series'] = $exe[1];
					$exercicio['repeticoes'] = $exe[2];
					$exercicio['id_treino'] = $id_treino;
					
					$this->Insert($exercicio, 'exercicio');
				}
			}
			
			
		}
		
		
		public function atualizarTreino($id_treino, $treino){	
			
			$id_trn['id_treino'] = $id_treino;
						
			// Salvando os dados do treino na tabela Treino
			$trn = array();
echo "entrou aq";
			foreach($treino as $atributo => $valor){
				
				if($atributo != 'treino' && $atributo != 'matricula_aluno'){
					$trn[$atributo] = $valor;
				}
			}
			print_r(($trn));
			$this->Update($trn, $id_trn,'treino');			
			
			
			
			// Salvando os exercicios na tabela correspondente e passando o id_treino como chave estraeria
			$exercicios = array();
			$exerc = explode("|", $treino->treino);
			
			foreach($exerc as $atributo){
				$exercicio = explode(",", $atributo);
				$exercicios[] = $exercicio;
			}
			
			print_r(array_values($exercicios));
			
			$this->Delete($id_trn, "exercicio");
			
			foreach($exercicios as $exe){
				
				if($exe[0] != ""){
					$exercicio = array();
					$exercicio['nome_exercicio'] = $exe[0];
					$exercicio['series'] = $exe[1];
					$exercicio['repeticoes'] = $exe[2];
					$exercicio['id_treino'] = $id_treino;
					echo (" -> ");
					print_r(array_values($exercicios));
					
					$this->Insert($exercicio, 'exercicio');
				}
			}
			
		}
		
		
		public function listarTreinos($matricula){
			
			
			$treinos = $this->Select("SELECT nome_treino, professor, data_treino, id_treino FROM treino WHERE matricula_aluno = {$matricula}");

			return $treinos;
		}

		public function removerTreino($treino){
			
			$id_treino['id_treino'] = $treino;
			
			$this->Delete($id_treino, "exercicio");
			
			$this->Delete($id_treino, "treino");

		}
			
		
		
		public function selecionarAvaliacao($id_avaliacao){

			$sqlAvaliacao = "SELECT * FROM avaliacao WHERE id_avaliacao =" . $id_avaliacao;
			
			$avaliacao = $this->Select($sqlAvaliacao);			
					
			return $avaliacao;
		}
		
		public function selecionarTreino($id_treino){

			$sqlTreino = "SELECT * FROM treino WHERE id_treino =" . $id_treino;
			
			$treino = $this->Select($sqlTreino);			
					
			return $treino;
		}
		
		public function selecionarExercicios($id_treino){

			$sqlExercicios = "SELECT * FROM exercicio WHERE id_treino =" . $id_treino;
			
			$exercicios = $this->Select($sqlExercicios);			
					
			return $exercicios;
		}
		



		public function realizarPagamento($pagamento){


			$erros = array();
			$sucesso = "true";
			$retorno = "";
			
			$sqlMatricula = "SELECT matricula FROM usuarios WHERE matricula =" . $pagamento->matricula;
print_r($sqlMatricula);
			$matricula = $this->Select($sqlMatricula);
print_r(array_values($matricula));

			if(empty($matricula)){
				$sucesso = "false";
				$erros[] = 1;			
			}

			if($sucesso == "true"){
				$p = array();
				
				foreach($pagamento as $atributo => $valor){
					$p[$atributo] = $valor;
				}
				
				$this->Insert($p, 'pagamentos');

				$retorno = "?sucess=true";
			
			} else {
				$retorno = "?sucess=false&qtd=" . count($erros) . "&" .  http_build_query($erros);
			}

			return $retorno;
		}
}