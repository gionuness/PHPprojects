<?php
// o índice é case sensitive
	$alunos = ["Maria das Graças" => 6.5, 
	"Paulo de Almeida" => 7.8,
	"Rogério da Silva" => 4.2, 
	"Jerusa Fontes" => 8.5, 
	"Alícia Marques" => 9.0, 
	"Zenon Mendes"=> 4.1];	
	
	/*pré formatação para exibir valores do vetor
	echo "<pre>";
	
	para exibir o vetor 
	print_r($alunos);
	
	para vetores será utilizado o método post 
	*/
		?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Processamento Alunos 📚 </title>
		<link rel="stylesheet" href="processamento-alunos.css" >
</head>
 
<body> 
    <h1> Vetores e matrizes com PHP </h1>
		<form action= "#" method = "post">
<fieldset>
<legend> Processamento de notas dos alunos </legend>

<label class="alinha">Selecione o nome do aluno: </label>
<select name="aluno">

<?php
//percorrendo o vetor
	foreach($alunos as $nome => $nota)
	{echo "<option> $nome </option>";}
	?>
	
</select> <br> <br>

<label class="alinha">  Forneça o nome de um aluno: </label>
<input type ="text" name="outro-aluno" autofocus>

<br> <br>

<label> Selecione uma operação: </label> 
<br>

<input type="radio" name="operacao" value="1"> 
a) Mostrar a nota do aluno escolhido no select <br>
<input type="radio" name="operacao" value="2"> 
b) Mostrar informações do aluno no formato tabular, ordenadas decrescentemente pelo nome do aluno <br>
<input type="radio" name="operacao" value="3"> 
c) Mostrar a nota do aluno no formato tabular, ordenadas crescentemente pela nota do aluno <br>
<input type="radio" name="operacao" value="4"> 
d) Mostrar a nota do aluno cujo nome foi fornecido na caixa de texto <br>
<input type="radio" name="operacao" value="5"> 
e)  Mostrar a média das notas de todos os alunos <br>
<input type="radio" name="operacao" value="6"> 
f) Mostrar quantos alunos tem a nota acima da média <br> 
<input type="radio" name="operacao" value="7"> 
g) Mostrar a menor nota e o respectivo nome do aluno <br> 
<input type="radio" name="operacao" value="8"> 
h) Converter vetor em uma string e mostra-la na página web <br> 
<input type="radio" name="operacao" value="9"> 
i) Adicionar alunos ao vetor e mostrar vetor no formato tabular <br> 
<br>
<button type="submit" name="enviar"> Enviar </button>
</fieldset>
		</form>	
<?php
	//testando o botão submit
		if(isset($_POST["enviar"]))
	{
		if (isset($_POST["operacao"]))
	{
	$operacao = $_POST['operacao'];
	// a)testar qual operação o usuário selecionou
		if ($operacao == "1")
	{
	//receber nome do aluno no Select
		$nome = $_POST ['aluno'];
	
	//acessando a célula com o nome do aluno e recuperando sua nota no vetor 	
		$nota = $alunos[$nome];

		echo "<p> Dados do aluno pesquisado: <br> 
		Aluno: $nome <br>
		Nota: $nota </p>";
	}
	//b) implementando operação no item
	if ($operacao == "2"){
		
	//ordenar o vetor pelo nome do aluno (indice), na ordem inversa
		krsort($alunos);
		
		/*echo "<pre>";
		print_r($alunos);
		echo"</pre>;
		
		antes de mais nada, vamos gerar o cabeçalho da 
		tabela na página web via PHP*/
		
		echo "<table>
		<caption> Rendimento do aluno, ordenado decrescentemente pela nota </caption>
		<tr>
		<th> Aluno </th>
		<th> Nota </th>
		</tr>";
		
		//vamos usar um laço de repetição para que o PHP percorra todo o vetor
		//retire seus dados e os coloque na tabela na página Web
		foreach ($alunos as $nome => $nota)
		{
			echo "<tr> 
			<td> $nome </td>
			<td> $nota </td>
			</tr>";
		}
		//fim do laço foreach - fechamos a tabela
		echo "</table>";
		}
		
		//c) implementando operação no item
	if ($operacao == "3"){
		
		//ordenar o vetor pela nota do aluno (indice), na ordem inversa
		asort($alunos);
		
		/*echo "<pre>";
		print_r($alunos);
		echo"</pre>;*/
		
		//antes de mais nada, vamos gerar o cabeçalho da 
		//tabela na página web via PHP
		
		echo "<table>
		<caption> Rendimento do aluno, ordenado decrescentemente pelo nome </caption>
		<tr>
		<th> Aluno </th>
		<th> Nota </th>
		</tr>";
		
		//vamos usar um laço de repetição para que o PHP percorra todo o vetor
		//retire seus dados e os coloque na tabela na página Web
		foreach ($alunos as $nome => $nota)
		{
			echo "<tr> 
			<td> $nome </td>
			<td> $nota </td>
			</tr>";
		}
		//fim do laço foreach - fechamos a tabela
		echo "</table>";
		}
		
		//d) implementar operação de receber nome de aluno e mostrar nota
		if($operacao =="4"){
			$alunoPesquisado = $_POST['outro-aluno'];
		/* fazendo o PHP encontrar o nome do aluno fornecido (indice do vetor)
		por meio da função array_key_exists () */
			$encontrou = array_key_exists ($alunoPesquisado, $alunos);
		if($encontrou){
			/* o nome está correto. Fazemos o PHP, por meio do índice I, acessar
			a célula com nota do respectivo aluno*/
			
			$nota = $alunos[$alunoPesquisado];
			
			echo "<p> O aluno $alunoPesquisado obteve nota igual a $nota. </p>";
		}
		else {
			echo "<p> Nosso sistema não conseguiu localizar o aluno de nome $alunoPesquisado
			no vetor. </p>";
	         }	
		}
		//e) calcular a média de notas dos alunos:
		if ($operacao=="5"){
			
			$media = array_sum ($alunos)/count($alunos);
			$mediaFormatada = number_format ($media, 1, " ,", '.');
			echo "<p> A média de notas dos alunos cadastrados no vetor é igual a $mediaFormatada</p>";
					}
		//f) quantos alunos tem nota acima da média
		if ($operacao == "6"){
			$media = array_sum ($alunos) / count ($alunos);
			
			$contagem =0;
			foreach ($alunos as $nome => $nota) 
			{
				if ($nota> $media)
				{
					$contagem++;
				}
		}//fim do laço
		$mediaFormatada = number_format ($media, 1, ",", '.');
		echo "<p> Dados relacionados ao cômputo da média: <br>
			Média da turma = $mediaFormatada <br>
			Número de alunos com nota acima da média = $contagem aluno(s).</p>";
	}
	
		//g) descobrir o maior e menor valor de um vetor numérico
		if ($operacao == "7") {
			//para acessar o maior (ou menor) valor de um vetor usamos:
			$menorNota = min ($alunos);
			
			//para recuperarmos o nome que está associado a menor nota, usamos
			//a função array_search()
			$alunoMenorNota = array_search($menorNota, $alunos);
			
			echo "<p> Dados do aluno com a menos rnota cadastrado no vetor: <br>
			Nome =  $alunoMenorNota <br>
			Menor nota = $menorNota </p>";
		}
		//h) converter o vetor em uma string 
		if($operacao == "8"){
			//usamos a função implode ()
			$vetorConvertidoEmTexto = implode (" // ", $alunos);
			
			echo "<p> Vetor de alunos convertido em texto = 
			$vetorConvertidoEmTexto </p>";
		}
		/*item g) adicionar, manualmente, mais dois alunos ao vetor
		e mostra-lo no formato tabular*/
		
		if($operacao =="9")
		{
			$alunos ['Carlos de Araújo'] = 7.5;
			$alunos ['Carla de Almeida'] = 9.7;
			
		echo "<table>
		<caption> Nova relação de alunos e respectivas notas </caption>
		<tr> 
		<th> Aluno </th>
		<th> Nota </th> 
		</tr>";
		
		foreach ($alunos as $nome => $nota)
		{
			echo"<tr>
			<td> $nome </td>
			<td> $nota </td>
			</tr>";
		}
		echo "</table>";
		}
		
	}
	else {
		echo "<p> Você deve selecionar um botão de rádio e escolher a operação apropriada. </p>";
	}
	}
?>
		</body> 
</html> 