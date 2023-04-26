<!DOCTYPE html>
	<html lang="pt-br">
	
		<head>
			
			<meta charset="UTF-8">
			
		<title>Inserir arquivo</title>
		
		</head>
		
		<body>
		
			<form action="inserirProdutos.php" method="POST" enctype="multipart/form-data">
		
				<input type="file" name="arquivo"><br><br>	
			
				<input type="submit" value="Importar">
			
			</form>
		
	</body>
	
</html>

<?php

 if ($_SERVER["REQUEST_METHOD"] == "POST"){
	 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "prova3daw";

		//receber os dados do formulário

		$arquivo_tmp = $_FILES["arquivo"]["tmp_name"];
		
		$nome = $_FILES["arquivo"]["name"];
		
		//quebrando o arquivo a partir do ponto e transformando num array
		$ext = explode(".", $nome);

		//recebe o final do array
		$extensão = end($ext);

		//valida se a extenção do arquivo é CSV
		if($extensão != "csv"){
			
			echo "<br>Arquivo inválido! Tente novamente.<br>";
		
		}
		else{
		
		//ler todo o arquivo para um array

		$dados = file($arquivo_tmp);

		//ler os dados do array
		
		$contador = 0;
		
		foreach($dados as $linha){
			
			//retirar os espaços em branco no inicio e no final da string
		
			$linha = trim($linha);
			
			//colocar em um array cada item separado pelo ponto e vírgula na string
		
			$valor = explode(';', $linha);
		
			//recuperar o valor do array indicando qual posição do array requerido e atribuindo para um variável
		
			$nome = $valor[0];
			$descricao = $valor[1];
			$preco = $valor[2];
			$quantidade = $valor[3];
			$peso = $valor[4];
			
			if ($contador > 0){
		
				//inserir os dados no banco de dados
				
				if($nome != "" && $descricao != "" && $preco != "" and is_numeric($preco) && $quantidade != "" and is_numeric($quantidade) && $peso != "" and is_numeric ($peso)){
			
					$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
					
					if ($conn->connect_error){
						
						die("<br>Não foi possível conectar! Tente novamente.<br>" . $conn->connect_error);
						
					}

						$sql = "INSERT INTO `produto` (`nome`, `descricao`, `preco`, `quantidade`, `peso`) VALUES ('$nome','$descricao','$preco', '$quantidade', '$peso')";
					
						if ($conn -> query($sql) === TRUE){	
						
							echo "<br>Inserção bem sucedida.<br>";
						
						}
						else{
						
							echo "<br>Erro na inserção! Tente novamente.<br>";
						
						}
						
				}
				
				else{
					
					echo "<br>Algum dado foi inserido incorretamente! Insira novamente.<br>";
					
				}
			
			}
			
			$contador++;
		
		}
	
	}
	
 }
 
?>

<html>  

	<a href="listarProdutos.php"><br>Lista de produtos</a><br>
	<a href="menu.php"><br>Retornar ao Menu Principal</a>

</html>