<?php
	//criamos a consulta específica para a criação do banco de dados ifsc
	$sql = "CREATE DATABASE IF NOT EXISTS $nomeDoBanco";
	
	$resultado = $conexao->query($sql) or die($conexao->error);
?>