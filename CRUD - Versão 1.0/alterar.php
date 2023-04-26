<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $id = $_POST["id"]; 
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $matricula = $_POST["matricula"];
    
        if ($id != "" and is_numeric($id))
        {
            $idValido = 1;
        }
        else
        {
            $idValido = 0;
        }
    
        if ($nome != "" and !is_numeric($nome))
        {
            $nomeValido = 1;
        }
        else
        {
            $nomeValido = 0;
        }

        if ($email != "" and !is_numeric($email))
        {
            $emailValido = 1;
        }
        else
        {
            $emailValido = 0;
        }

        if ($matricula != "" and is_numeric($matricula))
        {
            $matriculaValido = 1;
        }
        else
        {
            $matriculaValido = 0;
        }
    }
?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
	
        <meta charset="UTF-8">
		
        <title>Alterar Aluno</title>
		
    </head>
	
    <body>
	
        <p>Informe a ID do aluno a ser alterado: </p>
		
        <form action="alterar.php" method="POST">
		
            ID: <input type="text" name="id"><br>
			
            Nome: <input type="text" name="nome"><br>
			
            E-mail: <input type="text" name="email"><br>
			
            Matrícula: <input type="text" name="matricula"><br>
			
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

        if ($idValido == 1 and $nomeValido == 1 and $emailValido == 1 and $matriculaValido == 1)
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
				
                $sql = "UPDATE `cadastro` SET `nome`='$nome',`email`='$email',`matricula`='$matricula' WHERE `id` = '$id'";
				
                $conn->query($sql);
				
                echo "Aluno atualizado com sucesso.";
				
            }
        }
    }
?>

<html>  

	<a href="menu.html">Retornar ao Menu Principal</a> 

</html>