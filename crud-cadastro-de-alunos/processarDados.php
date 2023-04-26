<!DOCTYPE html>
	<html lang="pt-br">
	
		<head>
			
			<meta charset="UTF-8">
			<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
			<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
			
		<title>Inserir arquivo</title>
		
		</head>
		
		<body>
		
			<form action="processarDados.php" method="POST" enctype="multipart/form-data">
		
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
    $nomeBanco = "3daw";

		//receber os dados do formulário

		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

		//ler todo o arquivo para um array

		$dados = file($arquivo_tmp);

		//ler os dados do array

		foreach($dados as $linha){
		
		//retirar os espaços em branco no inicio e no final da string
	
		$linha = trim($linha);
		
		//colocar em um array cada item separado pelo ponto e vírgula na string
	
		$valor = explode(';', $linha);
	
		//recuperar o valor do array indicando qual posição do array requerido e atribuindo para um variável
	
		$nome = $valor[0];
		$email = $valor[1];
		$matricula = $valor[2];
	
		//inserir os dados no banco de dados
		
		if($nome != "" and !is_numeric($nome) && $email != "" and !is_numeric($email) && $matricula != "" and is_numeric($matricula)){
	
		$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
            
            if ($conn->connect_error){
				
                die("Não foi possível conectar! Tente novamente." . $conn->connect_error);
				
            }

            $sql = "INSERT INTO `cadastro` (`nome`, `email`, `matricula`) VALUES ('$nome','$email','$matricula')";
			
			if ($conn -> query($sql) === TRUE){
				
				echo "Aluno $nome, de e-mail: $email e matrícula: $matricula inserido com sucesso.<br><br>";
				
            }
            else{
				
                echo "Erro! Tente novamente.";
				
            }
		}
		
		else{
			
            echo "Algum dado foi inserido incorretamente. Insira novamente!<br>";
			
        }
	}
 }
 
?>

<html>  

	<a href="menu.html">Retornar ao Menu Principal</a> 

</html>