<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Banco de dados + PHP </title> 
		<link rel="stylesheet" href="formata-banco-de-dados.css">
</head> 

<body> 
	<h1> PHP + MYSQL - controle de hotelaria </h1>
	
	<form action="" method="post">
		<fieldset>
			<legend> Cadastro de hóspede </legend>
			
			<label class="alinha"> Nome: </label>			
			<input type="text" name="nome" class="maior" autofocus> <br>
			
			<label class="alinha"> CPF: </label>
			<input type="text" name="cpf"> <br>
			
			<label class="alinha"> Cartão de crédito: </label>
			<input type="text" name="cartao"> <br>
			
			<label class="alinha"> Previsão do número de diárias: </label>
			<input type="number" name="diarias" min="0.5" step="0.5"> <br>

			<label class="alinha"> Valor da diária: </label>
			<input type="number" name="valor" min="0" step="0.01"> <br> 			
			
			<label> Procedência: </label> <br>			
			<input type="radio" name="origem" value="Brasil" checked> Brasil <br>			
			<input type="radio" name="origem" value="Argentina"> Argentina <br> <br>

			<label> Companhias aéreas usadas: </label> <br>	
			<input type="checkbox" name="aviao[]" value="GOL"> GOL <br>			
			<input type="checkbox" name="aviao[]" value="AVIANCA"> AVIANCA <br> <br>
			
			<button type="submit" name="cadastrar"> Cadastrar hóspede </button>
		</fieldset>
		
		<fieldset>
			<legend> Alteração do número de diárias </legend>
			
			<label class="alinha"> CPF do hóspede: </label>
			<input type="text" name="busca-cpf"> <br>
			
			<label class="alinha"> Novo número de diárias: </label>
			<input type="number" name="altera-diarias" min="0.5" step="0.5"> <br> <br>
			
			<button type="submit" name="alterar"> Alterar diárias </button>
		</fieldset>
			
		<div class="botoes">
			<button type="submit" name="excluir"> Excluir registros </button>				
						
			<button type="submit" name="listar1"> Listar dados 1 </button>
				
			<button type="submit" name="listar2"> Listar dados 2 </button>
				
			<button type="submit" name="totalizar"> Calcular faturamento </button>
		</div>
	</form>

		
</body>
</html>
