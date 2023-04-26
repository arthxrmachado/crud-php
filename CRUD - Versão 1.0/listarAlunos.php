<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "3daw";
	
    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    
    if ($conn->connect_error)
    {
		
        die("Não foi possível conectar! Tente novamente." . $conn->connect_error);
		
    }

    $sql = "SELECT * FROM `cadastro`";
	
    $result = $conn->query($sql);
	
    if ($result->num_rows > 0)
    {
        while ($linha = $result->fetch_assoc())
        {
			echo "<br>";
			
            echo "ID: " . $linha["id"]
			
                . " Nome: " . $linha["nome"]
				
                . " E-mail: " . $linha["email"]
				
                . " Matrícula: " . $linha["matricula"];
				
            echo "<br>";
        }
    }
	
?>

<html>  

	<a href="menu.html">Retornar ao Menu Principal</a> 

</html>