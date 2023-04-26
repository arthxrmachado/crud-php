<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
        $id = $_POST["id"];
    
        if ($id != "" and is_numeric($id)){
			
            $idValido = 1;
        }
        else{
			
            $idValido = 0;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
	
        <meta charset="UTF-8">
		
        <title>Excluir cliente por ID</title>
		
    </head>
	
    <body>
	
        <p> Informe a ID do cliente a ser excluído do banco de dados:</p>
		
        <form action="excluir.php" method="POST">
		
            ID: <input type="text" name="id"><br><br>
			
            <input type="submit" value="Enviar">
			
        </form>

    </body>
	
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "prova3daw";

        if ($idValido == 1){
			
            $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);

            if ($conn->connect_error){
				
                die("<br>Não foi possível conectar! Tente novamente.<br>" . $conn->connect_error);
				
            }

            $sql = "SELECT * FROM `cliente` WHERE `id` = '$id'";
			
            $result = $conn->query($sql);

            if ($result->num_rows == 0){
				
                echo "<br>Cliente não encontrado.<br>";
				
            }
            else{
				
                $sql = "DELETE FROM `cliente` WHERE `id` = '$id'";
				
                $conn->query($sql);
				
                echo "<br>Cliente excluído com sucesso.<br>";
				
            }
        }
    }
?>

<html>  

	<a href="menu.html"><br>Retornar ao Menu Principal</a> 

</html>