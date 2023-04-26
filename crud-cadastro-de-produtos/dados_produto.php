<?php

    include("conexao_servidor.php");
	
    $codigo = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
	
	$result_produto = "SELECT * FROM produtos WHERE codigo_barras = '$codigo'";

	$resultado_produto = mysqli_query($conn, $result_produto);
	
	$row_produto = mysqli_fetch_assoc($resultado_produto);
?>

<!DOCTYPE html>

	<html lang="pt-br">
	
		<head>
		
			<meta charset="UTF-8">
			
			<title> Detalhes do Produto </title>

			<style>
			
				table, tr, th, td{
					
					border: 2px solid black;
					
				}
				
				th, td{
					
					padding: 7px;
					text-align: left;
				}
				.descricao{
					
					margin-left: 7px;
				}
			</style>
			
		</head>

		<body>
		
			<h3>Detalhes do Produto</h3>
			
			<?php
			
				if(isset($_SESSION['msg'])){
					
					echo $_SESSION['msg'];
					
					unset($_SESSION['msg']);
					
				}
			?>
			
			<div class="descricao">
			
				Código de Barras: 
				
				<?php 
				
					echo $row_produto['codigo_barras'];
					
				?><br>
				
				Nome: 
				
				<?php 
				
					echo $row_produto['nome'];
					
				?><br>
				
				Fabricante: 
				
				<?php 
				
					echo $row_produto['fabricante'];
					
				?><br>
				
				Categoria: 
				
				<?php 
				
					echo $row_produto['categoria'];
					
				?><br>
				
				Tipo de Produto: 
				
				<?php 
				
					echo $row_produto['tipo'];
					
				?><br>
				
				Preço: 
				
				<?php 
				
					echo $row_produto['preco'];
				
				?><br>
				
				Quantidade: 
				
				<?php 
				
					echo $row_produto['quantidade']; 
					
				?><br>
				
				Peso (em gramas): 
				
					<?php echo $row_produto['peso']; 
					
				?><br>
				
				Descrição: 
				
				<?php 
				
					echo $row_produto['descricao']; 
					
				?><br>
				
				Data de Inclusão: 
				
				<?php 
				
					$date = new DateTime($row_produto['data']); echo $date->format('d/m/y'); 
					
				?><br>
				
				Status: 
				
				<?php 
					
					echo $row_produto['status']; 
					
				?><br><br>
				
				<img id="imagem_produto" src="<?php echo $row_produto['link_img']; ?>">

			</div>
			
			<br><br>
		
			<a href="menu.html"><br>Retornar ao Menu Principal</a>
			
		</body>
		
	</html>