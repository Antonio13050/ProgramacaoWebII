<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Banco de dados MySQL com PHP </title> 
		<link rel="stylesheet" href="formata-banco.css">
</head> 

<body>
	<h1> PHP + MySQL + POO - cadastro e processamento de PIs </h1>
	
	<form action="" method="post">
		<fieldset>
			<legend> Projetos integradores - controle </legend>
			
			<label class="alinha"> Título/Tema do PI: </label> 
			
			<input type="text" name="tema" autofocus class="maior"> <br>
			
			<label class="alinha"> Número de participantes: </label> 
			
			<input type="number" name="numero-participantes" min="1" max="3"> <br>
			
			<label class="alinha"> Data de apresentação: </label> 
			
			<input type="date" name="data-apresentacao"> <br>
			
			<label class="alinha"> Terminalidade do projeto: </label>
			<select name="terminalidade">
				<option> Aplicação para a web </option>
				<option> Pesquisa teórica somente </option>
			</select> <br> <br>
			
			<label> Professor coorientador: </label> <br>
			
			<input type="radio" name="coorientador" value="Sim"> Sim <br>
			<input type="radio" name="coorientador" value="Não"> Não <br> <br>
						
			
			<label> Metodologia utilizada: </label> <br>
			<input type="checkbox" name="metodologia" value="Plano de ação"> Plano de ação <br>
			<input type="checkbox" name="metodologia" value="Pesquisa de campo"> Pesquisa de campo <br> <br>


			<button type="submit" name="cadastrar"> Cadastro de dados </button>
			<button type="submit" name="outras-operacoes"> Executar demais operações </button>
		</fieldset>
	</form>
<?php 
//inserindo as includes de conexão do PHP com MySQL
	require "dados-conexao.inc.php";
	require "conectar.inc.php";
	require "criar-banco.inc.php";
	require "selecionar-banco.inc.php";
	require "definir-charset.inc.php";
	require "criar-tabela.inc.php";
	
//testar o botão submit de cadastro
if(isset($_POST["cadastrar"]))
	{
		require "cadastrar.inc.php";
	}

//testar o botaõ submit outras operações
if(isset($_POST["outras-operacoes"]))
	{
		require "outras-operacoes.inc.php";
	}

	require "desconectar.inc.php";


?>
</body>
</html>