<?php

    include("conexao_servidor.php");
	
?>

<!DOCTYPE html>

	<html lang="pt-br">
	
		<head>
		
			<meta charset="UTF-8">
			
			<title>Produtos Ativos</title>
			
		</head>

		<body>
		
			<h3>Exibir Produtos</h3>
			
			<?php
			
				$sql = "SELECT * FROM `produtos`";
				
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0){
					
					echo "
					
						<br>Código de Barras: 
						<br>Nome:
						<br>Categoria:
						<br>Preço:
						<br>Quantidade
						<br>Status: 
						
						";

					while ($linha = $result->fetch_assoc()){
						
						if($linha["status"] == 'ATIVO'){
							
							echo . $linha["codigo_barras"] ."</td>";
							
							echo "<button><a href='dados_produto.php?id=".$linha['codigo_barras']."'>". $linha["nome"] ."</a></button>";
							
							echo . $linha["categoria"] .;
							
							echo . $linha["preco"] .;
							
							echo . $linha["quantidade"] .;
							
							echo . $linha["status"] .;
							
							echo "<button><a href='alterar_produto.php?id=" . $linha['id'] . "</a></button>";
							
						}

					}
					
				}
				
				else{
					
					echo "Lista Vazia. <br><br>";
					
				}
			?>
			
			<a href="menu.html"><br>Retornar ao Menu Principal</a> 
			
		</body>
		
	</html>