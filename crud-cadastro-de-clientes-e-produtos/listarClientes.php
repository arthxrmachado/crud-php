<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "prova3daw";
	
    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    
    if ($conn->connect_error){
		
        die("<br>Não foi possível conectar! Tente novamente.<br>" . $conn->connect_error);
		
    }

    $sql = "SELECT * FROM `cliente`";
	
    $result = $conn->query($sql);
	
    if ($result->num_rows > 0){
		
        while ($linha = $result->fetch_assoc()){
			
			echo "<br>";
			
            echo "Nome: " . $linha["nome"]
				
            . "<br>CPF: " . $linha["cpf"]
			
			. "<br>Endereço: " . $linha["endereco"]
				
            . "<br>CEP: " . $linha["cep"]
				
			. "<br>Cidade: " . $linha["cidade"]
				
			. "<br>Estado: " . $linha["estado"]

			. "<br>ID: " . $linha["id"];
				
            echo "<br>";
        }
    }
	
?>

<html>  

	<a href="menu.html"><br>Retornar ao Menu Principal</a> 

</html>