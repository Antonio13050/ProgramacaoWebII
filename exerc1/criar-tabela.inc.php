<?php
	//include com a consulta da criação da tabela alunos
	$sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela(
														matricula VARCHAR(20) PRIMARY KEY,
														uc VARCHAR(100),
														nota1 DECIMAL(3,1),
														nota2 DECIMAL(3,1)
														)";
														
	$resultado = $conexao->query($sql) or die($conexao->error);
?>