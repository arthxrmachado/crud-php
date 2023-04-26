<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "prova3daw";
	
    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    
    if ($conn->connect_error){
		
        die("<br>Não foi possível conectar! Tente novamente.<br>" . $conn->connect_error);
		
    }

    $sql = "SELECT * FROM `produto`";
	
    $result = $conn->query($sql);
	
    if ($result->num_rows > 0){
		
        while ($linha = $result->fetch_assoc()){
			
			echo "<br>";
			
            echo "Nome: " . $linha["nome"]
				
            . "<br>Descrição: " . $linha["descricao"]
			
			. "<br>Preço: " . $linha["preco"]
				
            . "<br>Quantidade: " . $linha["quantidade"]
				
			. "<br>Peso: " . $linha["peso"]

			. "<br>ID: " . $linha["id"];
				
            echo "<br>";
        }
    }
	
?>

<html>  

	<a href="menu.php"><br>Retornar ao Menu Principal</a> 

</html>