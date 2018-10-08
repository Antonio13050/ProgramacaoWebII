<?php
	//include com a consulta da criação da tabela projeto_integração - note que estamos utulizando, como chave primaria da tabela, um campo de autoincremento
	$sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela(
	id INT PRIMARY KEY AUTO_INCREMENT,
	tema VARCHAR(200),
	participantes TINYINT,
	data DATE,
	terminalidade VARCHAR(50),
	coorientador VARCHAR(5),
	metodologia VARCHAR(100)
	)";
														
	$resultado = $conexao->query($sql) or die($conexao->error);
?>