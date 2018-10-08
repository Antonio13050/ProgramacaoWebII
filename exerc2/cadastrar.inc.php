<?php
//recebe os dados do formulário e desinfecta, evitando injeção de sql
$tema = trim($conexao->escape_string($_POST["tema"]));
$participantes = trim($conexao->escape_string($_POST["numero-participantes"]));
$data = trim($conexao->escape_string($_POST["data-apresentacao"]));
$terminalidade = trim($conexao->escape_string($_POST["terminalidade"]));
$coorientador = trim($conexao->escape_string($_POST["coorientador"]));
$metodologia = trim($conexao->escape_string($_POST["metodologia"]));

//criar a consulta de cadastro
$sql = "INSERT $nomeDaTabela VALUES(
				null,
				'$tema',
				$participantes,
				'$data',
				'$terminalidade',
				'$coorientador',
				'$metodologia')";
$resultado = $conexao->query($sql) or die($conexao->error);
echo "<p> Dados cadastrados com sucesso na tabela $nomeDaTabela </p>";
?>