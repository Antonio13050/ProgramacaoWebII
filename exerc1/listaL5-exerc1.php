<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> PHP + MySQL </title> 
		<link rel="stylesheet" href="formata-banco.css">
</head> 

<body> 
	<h1> Sistema acadêmico em PHP, usando POO e acesso a banco de dados MySQL - exercício 1 </h1>
	
	<form action="#" method="post">
		<fieldset>
			<legend> Sistema acadêmico - dados do aluno </legend>
			
			<label class="alinha"> Matrícula: </label>
			<input type="text" name="matricula" autofocus> <br>
			
			<label class="alinha"> Unidade curricular: </label>
			<input type="text" name="uc"> <br>
			
			<label class="alinha"> Nota 1: </label>
			<input type="number" name="nota1" step="0.1" min="0" max="10"> <br>
			
			<label class="alinha"> Nota 2: </label>
			<input type="number" name="nota2" step="0.1" min="0" max="10"> <br> <br>
			
			<label> Selecione a operação desejada: </label>
					
			<select name="operacao">
				<option value="1"> Cadastrar dados </option>
				<option value="2"> Calcular média </option>
				<option value="3"> Contar alunos com média maior que 6,0 </option> 				
			</select> <br> <br>
			
			<button type="submit" name="enviar-form"> Processar dados </button>	
		</fieldset>	
	</form>
<?php
	//a primeira coisa que fazemos, aqui, é inserir as chamadas às includes que farão todo o trabalho de conexão do PHP com o banco de dados MySQL
	
	require "dados-conexao.inc.php";
	require "conectar.inc.php";
	require "criar-banco.inc.php";
	require "selecionar-banco.inc.php";
	require "definir-charset.inc.php";
	require "criar-tabela.inc.php";
	
	//chamamos a include que implementa a classe Aluno
	require "criar-classe-aluno.inc.php";
	
	//criar um objeto Aluno
	$aluno = new Aluno();
	
	//testar se o botão submit do formulário foi pressionado
	if(isset($_POST["enviar-form"]))
		{
			//após o teste do submit, devemos fazer com que o PHP receba, do select, qual a operação desejada
			$operacao = $_POST["operacao"];
			
			//testar qual a operação foi escolhida pelo usuário
			if($operacao == "1")
				{
					//invocamos o método receberDadosForm()
					$aluno->receberDadosForm($conexao);
					
					//invocamos o método que cadastra os dados no banco
					$aluno->cadastrar($conexao, $nomeDaTabela);
				}
				
			//vamos programar a a segunda o peração que o PHP executa sobre o banco de dados
			if($operacao == "2")//calcular a média
				{
				//invocamos o método receberDadosForm()
					$aluno->calcularMedia($conexao, $nomeDaTabela);
				}
		
			//vamos implementar a terceira operação que o PHP realizará sobre o banco de dados
			if($operacao == "3")
				{
					//aqui, o usua´rio quer que o PHP conte quantos alunos têm média acima de 6,0 - este método tem retorno
					$quantos = $aluno->contar($conexao, $nomeDaTabela);
					echo"<p> Número de alunos com média acima de 6,0: $quantos alunos. </p>";
				}
		}	
		//ao final, encerraremos a conexão do PHP com MySQL
		require "desconectar.inc.php";
		
?>
</body>
</html>
