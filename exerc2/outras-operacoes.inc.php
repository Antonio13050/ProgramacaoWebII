<?php
    //vamos listar, em uma tabela na página web, o tema e o número de participantes de todos os projetos com data anterior a 01/05/2015 E que tenham professor coorientador
    $sql = "SELECT tema, participantes FROM $nomeDaTabela WHERE data < '2015-05-01' AND coorientador = 'Sim'";

    $resultado = $conexao->query($sql) or die($conexao->error);

    // antes de fazermos o desenho do cabeçalho da tabela na página web, devemos testar se o bandco de dados retornou para o PHP algum registro da consulta. Fazemos isso com o comando abaixo;
    if($conexao->affected_rows > 0){
        echo "<table>
                <caption> Lista de PIs com professor coorientador E com data de apresentação anterior a 01/05/2015 </caption>
                <tr> 
                    <th> Tema <th>
                    <th> Participantes <th>
                </tr>";
        //devemos criar um laço de repetição, para que o PHP retire cada linha do objeto $resultado e insira na tabela da página web. Lembrar de desinfectar os dados vindo do MySQL
        while($registro = $resultado->fetch_array()){
            $tema = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
            $participantes = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
            echo "<tr> 
                    <th> $tema <th>
                    <th> $participantes <th>  
                 </tr>";
        }//fim do laço
        echo "</table>";
    }
    else{
        echo "<p> Não foi encontrado no banco de dados, nenhum registro com data anterior a 01/05/2015 ou que tenha professor coorientador</p>";
            
    }

    //Vamos, agora, implementar o código para excluir todos os projetos integradores com mais de 2 aluno no grupo
    $sql = "DELETE FROM $nomeDaTabela WHERE participantes > 2";
    $resultado = $conexao->query($sql) or die($conexao->error);

    $quantoApagados = $conexao->affected_rows;

    echo "<p> Um total de $quantoApagados registros contendo PIs com mais de 2 alunos participantes foi apagado do banco de dados. </p>";

    //Implementar a consulta que altera, para qualquer PI no banco de dados, a data de apresentação para 01/03/2018, mas somente dos registros que contenham, o tema/título, a palavra "web"

    $sql = "UPDATE $nomeDaTabela SET DATA='2018-03-01' WHERE tema LIKE '%web%'";
    $resultado = $conexao->query($sql) or die($conexao->error);

    $quantoModificados = $conexao->affected_rows;

    echo "<p> Um total de $quantoModificados. </p>";

?>