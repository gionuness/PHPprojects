<?php
	$habitantes = ["Florianópolis" => 477000, 
	"São Paulo" => 12100000,
	"João Pessoa" => 720950, 
	"Salvador" => 2670000, 
	"Porto Alegre" => 1480000];	
		?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Processamento populacional </title>
		<link rel="stylesheet" href="style-processamento.css" >
</head>
 
<body> 
    <h1> Vetores e matrizes com PHP </h1>
		<form action= "#" method = "post">
<fieldset>
<legend> Processamento populacional </legend>

<label class="alinha"> Selecione uma capital: </label> <br>

<?php
	
	foreach($habitantes as $cidade => $numeroPessoas)
	{echo "<input type='radio' name='capital' value='$cidade'> $cidade <br>";}
	?>
	
<br> <br>

<label class="alinha">  Forneça o nome de uma capital: </label>
<input type ="text" name="outra-capital" autofocus>

<br> <br>

<label> Selecione uma operação: </label> 
<br>
<select name="operacao">

<option value="1"> Mostrar a populacão da capital selecionada </option> <br> 
<option value="2"> Mostrar em formato tabular os dados do vetor em ordem crescente da capital </option> <br> 
<option value="3"> Mostrar em formato tabular os dados do vetor em ordem decrescente pelo número de habitantes </option> <br> 
<option value="4"> Receber o nome de uma capital na caixa de texto e mostrar sua população </option> <br> 
<option value="5"> Calcular e mostrar a média da população das capitais </option> <br> 
<option value="6"> Calcular e mostrar quantas capitais tem populacão abaixo da média </option> <br> 
<option value="7"> Mostrar qual a maior população e sua capital </option> <br> 
<option value="8"> Converter o vetor em uma string e exibir </option> <br> 
<option value="9"> Adicionar mais capitais e população ao vetor exibir em formato tabular </option> <br> 

</select>

<br> <br>
<button type="submit" name="enviar"> Enviar </button>
</fieldset>

<fieldset>
	<legend> Cadastro de cidades no vetor </legend>
	<label class="alinha"> Cidade: </label>
	<input type="text" name="nova-cidade1"> <br> <br>
	
	<label class="alinha"> Habitantes: </label>
	<input type="number" name="novo-hab1" min=0 > <br> <br>
	
	<label class="alinha"> Cidade: </label>
	<input type="text" name="nova-cidade2"> <br> <br>
	
	<label class="alinha"> Habitantes: </label>
	<input type="number" name="novo-hab2" min=0 > <br> <br>
	
	<button type="submit" name="cadastro"> Cadastrar ➕ </button>
	</fieldset>
	
	</form>
<?php   
		if(isset($_POST["enviar"]))
	{
		if (isset($_POST["operacao"]))
	{
	$operacao = $_POST['operacao'];
	
	//a) MOSTRAR A POPULAÇÃO DA CAPITAL SELECIONADA NO RADIO
		if ($operacao == "1")
	{
		$cidade = $_POST ['capital'];
	 	
		$numeroPessoas = $habitantes[$cidade];

		echo "<p> <b> Dados da cidade pesquisada: </b> <br> 
		Cidade: $cidade 🏙️ <br>
		Habitantes: $numeroPessoas 👩‍👩‍👦‍👦 </p>";
	}
	//b) MOSTRAR NO FORMATO TABULAR A RELAÇÃO CAPITAIS X POPULAÇÃO
	if ($operacao == "2"){
		
			asort($habitantes);
		
		echo "<table>
		<caption> <b> Número de habitantes, ordenado crescentemente pelo nome da cidade 📊 </b> </caption>
		<tr>
		<th> Cidade 🏙️ </th>
		<th> Habitantes 👩‍👩‍👦‍👦 </th>
		</tr>";
		
		foreach ($habitantes as $cidade => $numeroPessoas)
		{
			echo "<tr> 
			<td> $cidade </td>
			<td> $numeroPessoas </td>
			</tr>";
		}

		echo "</table>";
		}
		
		// c) MOSTRAR NO FORMATO TABULAR A RELAÇÃO CAPITAIS X POPULAÇÃO (DECRESCENTEMENTE PELA POPULAÇÃO) 
	if ($operacao == "3"){
		
		krsort($habitantes);
		
		echo "<table>
		<caption> <b> Cidades, ordenadas crescentemente pelo número de habitantes 📈 </b> </caption>
		<tr>
		<th> Cidade 🏙️ </th>
		<th> Habitantes 👩‍👩‍👦‍👦 </th>
		</tr>";
		
		foreach ($habitantes as $cidade => $numeroPessoas)
		{
			echo "<tr> 
			<td> $cidade </td>
			<td> $numeroPessoas </td>
			</tr>";
		}
		
		echo "</table>";
		}
		// d) RECEBER O NOME DE UMA CAPITAL, SE EXISTE NO VETOR DEVE-SE EXIBIR A POPULAÇÃO
		if($operacao =="4"){
			$cidadePesquisada = $_POST['outra-capital'];
			$encontrou = array_key_exists ($cidadePesquisada, $habitantes);
		if($encontrou){
			$numeroPessoas = $habitantes[$cidadePesquisada];
			
			echo "<p> A cidade <b> $cidadePesquisada </b> possui número de habitantes igual a <b> $numeroPessoas. </b> 📈 </p>";
		}
		else {
			echo "<p> ⚠️ Nosso sistema não conseguiu localizar a cidade de nome <b> $cidadePesquisada </b> no vetor. </p>";
	         }	
		}
		// e) CALCULAR E MOSTRAR A MÉDIA POPULACIONAL
		if ($operacao=="5"){
			
			$media = array_sum ($habitantes)/count($habitantes);
			$mediaFormatada = number_format ($media, 1, " ,", '.');
			echo "<p> A média populacional das cidades cadastradas no vetor é igual a <b> $mediaFormatada </b> 📊 </p>";
					}
		// f) CONTAR E MOSTRAR QUANTAS CAPITAIS TEM POPULAÇÃO ABAIXO DA MÉDIA
		if ($operacao == "6"){
			$media = array_sum ($habitantes) / count ($habitantes);
			
			$contagem =0;
			foreach ($habitantes as $cidade => $numeroPessoas) 
			{
				if ($numeroPessoas < $media)
				{
					$contagem++;
				}
		}
		$mediaFormatada = number_format ($media, 1, ",", '.');
		echo "<p> Dados relacionados ao cômputo da média: <br>
			<b> Média do número de habitantes = </b> $mediaFormatada  📊 <br>
			<b> Número de cidades com número de habitantes abaixo da média = </b> $contagem cidade(s). 📈</p>";
	}
	
		// g) MOSTRAR A MAIOR POPULAÇÃO E SUA CAPITAL
		if ($operacao == "7") {
			$maiorHab = min ($habitantes);
			
			$cidadeMaiorHab = array_search($maiorHab, $habitantes);
			
			echo "<p> <b> Dados da cidade com o maior número de habitantes cadastrado no vetor: </b> 📈 <br>
			<b> Cidade = </b> $cidadeMaiorHab  🏙️  <br>
			<b> Número de Habitantes = </b> $maiorHab 👩‍👩‍👦‍👦  </p>";
		}
		// h) CONVERTER O VETOR EM UMA STRING
		if($operacao == "8"){
		
			$vetorConvertidoEmTexto = implode (" • ", $habitantes);
			
			echo "<p> Vetor de habitantes convertido em texto = 
			$vetorConvertidoEmTexto </p>";
		}
		// g) ADICIONAR, MANUALMENTE, CAPITAIS AO VETOR E SUAS POPULAÇÕES
		
		if($operacao =="9")
		{
		echo "<table> 
		<caption> Nova relação de Cidades e Habitantes </caption>
		<tr>
		<th> Cidade: 🏙️  </th>
		<th> Habitantes: 👩‍👩‍👦‍👦 </th>
		</tr>";
		
		foreach ($habitantes as $cidade => $numeroPessoas)
		{
			echo "<tr> 
			<td> $cidade </td>
			<td> $numeroPessoas </td>
			</tr>";
		}
		echo "</table>";
	}
	}
	}
	if (isset($_POST["cadastro"]))
	{
		
		$novaCidade1 = $_POST["nova-cidade1"];
		$novaCidade2 = $_POST["nova-cidade2"];
		
		$novoHab1 = $_POST["novo-hab1"];
		$novoHab2 = $_POST["novo-hab2"];
		
		$habitantes[$novaCidade1] = $novoHab1;
		$habitantes[$novaCidade2] = $novoHab2;
	
	echo "<table> 
		<caption> Nova relação de Cidades e Habitantes </caption>
		<tr>
		<th> Cidade 🏙️  </th>
		<th> Habitantes 👩‍👩‍👦‍👦 </th>
		</tr>";
		
		foreach ($habitantes as $cidade => $numeroPessoas)
		{
			echo "<tr> 
			<td> $cidade </td>
			<td> $numeroPessoas </td>
			</tr>";
		}
	echo "</table>";	
	}
?>
		</body> 
</html> 