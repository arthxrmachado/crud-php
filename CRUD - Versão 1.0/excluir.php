<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $id = $_POST["id"];
    
        if ($id != "" and is_numeric($id))
        {
            $idValido = 1;
        }
        else
        {
            $idValido = 0;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
	
        <meta charset="UTF-8">
		
        <title>Excluir Aluno</title>
		
    </head>
	
    <body>
	
        <p> Informe a ID do aluno a ser excluído:</p>
		
        <form action="excluir.php" method="POST">
		
            ID: <input type="text" name="id"><br>
			
            <input type="submit" value="Enviar">
			
        </form>

    </body>
	
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "3daw";

        if ($idValido == 1)
        {
            $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);

            if ($conn->connect_error)
            {
				
                die("Não foi possível conectar! Tente novamente." . $conn->connect_error);
				
            }

            $sql = "SELECT * FROM `cadastro` WHERE `id` = '$id'";
			
            $result = $conn->query($sql);

            if ($result->num_rows == 0)
            {
				
                echo "Aluno não encontrado. <br>";
				
            }
            else
            {
				
                $sql = "DELETE FROM `cadastro` WHERE `id` = '$id'";
				
                $conn->query($sql);
				
                echo "Aluno excluído com sucesso.";
				
            }
        }
    }
?>

<html>  

	<a href="menu.html">Retornar ao Menu Principal</a> 

</html>