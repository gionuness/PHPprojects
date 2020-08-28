<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Progração em PHP </title> 
</head> 

<body>
	<h1> Fundamentos da linguagem PHP - exercício 1 da listaL1 </h1>
	
	<?php
		echo "Alô, mundo!";
		echo '<p> Alô, mundo, com parágrafo! </p>';
		
		//comandos do PHP embutidos dentro de um documento web
		
		/*comentário
		de
		várias linhas*/
		
		//trabalhando com variáveis e constantes do PHP
		
		$nomeDoAluno = "Maria das Graças.";
		
		echo "<p> Nome do aluno = $nomeDoAluno </p>";
		
		echo '<p> Nome do aluno = $nomeDoAluno </p>';
		
		$idadeDoAluno = 53;
		$temCarro = true;
		$saldoBancarioInicialEmDolares = 6700.35;
		
		//criar uma constante em PHP
		define('TAXA_DE_CAMBIO', 4.30);
		
		//conversão
		$quantiaConvertidaEmReais = $saldoBancarioInicialEmDolares * TAXA_DE_CAMBIO;
		
		//atualizar saldo bancário
		$saldoBancarioFinal = $quantiaConvertidaEmReais + 1000;
		
		//escrevendo alguns destes dados na página web
		echo "<p> Resultado final do processamento: <br>
							Nome do aluno: $nomeDoAluno <br>
							Saldo bancário final: R$$saldoBancarioFinal <br>
							Valor da taxa de câmbio: ", TAXA_DE_CAMBIO, " <br>
							O aluno tem carro? $temCarro </p>";
	
	?>    
</body> 
</html> 