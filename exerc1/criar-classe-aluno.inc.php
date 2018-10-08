<?php
	class Aluno 
		{
		var $matricula;
		var $uc;
		var $nota1;
		var $nota2;

		//método para receber os dados do formulário
		function receberDadosForm($conexao)
			{
			//CUIDADO AO RECEBER DADOS DE UM FORMULÁRIO, DE AGORA EM DIANTE: use, sempre, os métodos de prevenção de injeção SQL, fornecidos pelo PHP
			$matricula = $_POST["matricula"];
			$matricula = trim($matricula);
			$matricula = $conexao->escape_string($matricula);
			
			$uc = trim($conexao->escape_string($_POST["uc"]));
			
			$nota1 = trim($conexao->escape_string($_POST["nota1"]));
			
			$nota2 = trim($conexao->escape_string($_POST["nota2"]));
			
			//após recebermos os dados do formulário, para que eles não se percam, inserimos cada valor dentro dos atributos de cada objeto aluno
			
			$this->matricula = $matricula;
			$this->uc = $uc;
			$this->nota1 = $nota1;
			$this->nota2 = $nota2;			
		}
		
	//====================================
	
	//método para inserção dos dados de cada aluno no banco de dados
	function cadastrar($conexao, $nomeDaTabela)
		{
		//consulta de inserção de dados na tabela
		$sql = "INSERT $nomeDaTabela VALUES(
										'$this->matricula',
										'$this->uc',
										$this->nota1,
										$this->nota2)";
										
		$resultado = $conexao->query($sql) or die($conexao->error);
		echo "<p> Dados do aluno cadastrado com sucesso no banco de dados.</p>";
		}
	//vamos implementar o método que faz o PHP calcular a média de cada aluno no banco de dados
	function calcularMedia($conexao, $nomeDaTabela)
	{
		//criando a consulta que faz o MySQL devolver, da tabela no banco de dados, a matrícula e a média de cada aluno
		$sql = "SELECT matricula, uc, (nota1 + nota2)/2 FROM $nomeDaTabela";
		
		$resultado = $conexao ->query($sql) or die($conexao->error);
		
		//desenhar o cabeçalho da tabela na página we
		echo"<table>
					<caption> Alunos do CTI - matrícula e média final </caption>
					<tr>
						<th> Matrícula </th>
						<th> Unidade curriculr </th>
						<th> Média </th>
					</tr>";
		//vamos criar um laço que percorre o objeto $resultado, extrai seus dados e mostra na tabela na página web
		while($registro = $resultado->fetch_array())
		{
			/*retiramos os dados do vetor registro e inserimos na tabela na página web - lembrar que, sempre que o PHP recuperar 
      dados de uma tabela e mostrar na página web, devemos garantir que estes dados não sejam utilizados para a invasão do computador do usuário. Olhe abaixo:*/

			$matric = htmlentities($registro[0],ENT_QUOTES, "UTF-8");
			$uc = htmlentities($registro[1],ENT_QUOTES, "UTF-8");
			$media = htmlentities($registro[2],ENT_QUOTES,"UTF-8");
			
			$mediaFormatada = number_format($media,1, ",", ".");
			
			echo"<tr>
						<td> $matric </td>
						<td> $uc </td>
						<td> $mediaFormatada</td>
					</tr>";
					
		}
		echo "</table>";//fora do enquanto
	}
	//vamos implementar o método que conta o número de alunos com média acima de 6 no banco de dados
	function contar($conexao, $nomeDaTabela)
	{
		$sql = "SELECT COUNT(*) FROM $nomeDaTabela WHERE (nota1 + nota2)/2 > 6";
		$resultado = $conexao -> query($sql) or die($conexao->error);
		//retirar a informação devolvida pelo banco de dados do objeto $registro e inserir no vetor, com o método fetch_array()
		$registro = $resultado->fetch_array();
		//sanitizar ou desenfectar
		$conta =  htmlentities($registro[0],ENT_QUOTES, "UTF-8");
		return $conta;
	}
}

?>