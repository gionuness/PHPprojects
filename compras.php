<!DOCTYPE html> 
<html lang="pt-BR"> 
	<head> 
		<meta charset="utf-8" > 
			<title> Compras mercado </title> 
		</head> 

		<body> 
			<h3> Compras </h3>
			<?php
		$total = $_GET["total"];
		
		$cartao = ($total - $total*0.05);
		$entrega = ($total + $total*0.02);
		$entregacartao = ($total - $total*0.03);
		
		$cartaoFormat = number_format ($cartao, 2, ",",".");
		$totalFormat = number_format ($total, 2, ",",".");
		$entregaFormat = number_format ($entrega, 2, ",",".");
		$entregacartaoFormat = number_format ($entregacartao, 2, ",",".");
		echo "<p> <b> 🛒 Total das compras  = </b> R$$totalFormat 
<br> 
<br> 
		</p>";
		
		if (isset ($_GET['entrega']) && isset($_GET['cartao'])) {
		echo "Compra com entrega domiciliar 🚚 ✔ 
<br>
		Pagamento em cartão 💳 ✔ 
<br>
		<b> Total com descontos e acréscimos = </b> R$$entregacartaoFormat
<br> 
<br> ";
	}
	
	elseif (isset($_GET['entrega']))
	{
		echo "Pagamento com entrega 🚚 ✔ 
<br> 
<br>
		<b> Pagamento com entrega = </b> R$$entregaFormat 
<br> 
<br>";
	}
	elseif (isset($_GET['cartao']))
	{
		echo "Pagamento em cartão 💳 ✔ 
<br> 
<br>
		<b> Pagamento em cartão = </b> R$$cartaoFormat 
<br> 
<br>";
	}
		?>
		</body> 
	</html> 