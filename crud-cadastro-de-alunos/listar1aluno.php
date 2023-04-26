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
		
        <title>Listar 1 Aluno</title>
		
    </head>
	
    <body>
	
        <p>Informe a ID do aluno a ser listado: </p>
		
        <form action="listar1aluno.php" method="POST">
		
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
				
                $linha = $result->fetch_assoc();
				
                echo "<br>";
				
                echo "<br>ID: " . $linha["id"]
				
                    . "<br>Nome: " . $linha["nome"]
					
                    . "<br>E-mail: " . $linha["email"]
					
                    . "<br>Matrícula: " . $linha["matricula"];
					
                echo "<br>";
				
            }
        }
    }
?>

<html>  

	<a href="menu.html">Retornar ao Menu Principal</a> 

</html>