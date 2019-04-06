<?php

namespace App\Models;

use SON\Db\Table;
use App\Controllers\SistemaController;

use Dompdf\Dompdf;
class apiRelatorios extends Table{
	
	public function gerarRelatorio($relatorio){
	
		/*Geramento de pdf - melhorar isso depois */

		require_once 'pdf/dompdf/autoload.inc.php';

		$dompdf = new DOMPDF();

		$dompdf->load_html($this->$relatorio());

		$dompdf->render();

		$dompdf->stream(

			"relatorio.pdf",
			array(
				"Attachment" => false
			)
		);

	}
	
	public function listaTodosAlunos(){
		return $this->listaTodos(3);
	}

	public function listaTodosProfessores(){
		return $this->listaTodos(2);
	}

	private function listaTodos($tipo){
	
		$listaLogins = $this->Select("SELECT id_login FROM login WHERE nivel_acesso = " . $tipo);

		$html = "
			<h1>Lista alunos cadastrados no sistema</h1>
			<br>
			<table>
				<tr>
					<th>Matricula</th>
					<th>Nome</th>
					<th>Cpf</th>
					<th>Telefone</th>
					<th>Data cadastro</th>
				</tr>
		";

		foreach($listaLogins as $login){
			$aluno = $this->Select("SELECT matricula, nome, cpf, telefone, data_cadastro FROM usuarios WHERE login =" . $login->id_login);
			
			$html .= "
						<tr>
				";
			
			foreach($aluno[0] as $valor){
				$html .= "
					<td>" . $valor . "</td>
				";
			}

			$html .= "
				</tr>
			";
		}
		
		$html .= "
			</table>
		";

		
		return $html;
	}


}