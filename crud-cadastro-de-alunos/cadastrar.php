<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $matricula = $_POST["matricula"];
    
        if ($nome != "" and !is_numeric($nome)){
			
            $nomeValido = 1;
        }
		
        else{
			
            $nomeValido = 0;
        }

        if ($email != "" and !is_numeric($email)){
			
            $emailValido = 1;
        }
		
        else{
			
            $emailValido = 0;
        }

        if ($matricula != "" and is_numeric($matricula)){
			
            $matriculaValido = 1;
        }
		
        else{
			
            $matriculaValido = 0;
        }

    }

?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
	
        <meta charset="UTF-8">
		
        <title>Formulario Cadastro de Aluno</title>
		
    </head>
	
    <body>
	
        <form action="cadastrar.php" method="POST">
		
            Nome: <input type="text" name="nome"><br>
			
            E-mail: <input type="text" name="email"><br>
			
            Matricula: <input type="text" name="matricula"><br>
			
            <input type="submit" value="Enviar">
			
        </form>

    </body>
	
</html>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
        if($nomeValido == 1 and $emailValido == 1 and $matriculaValido == 1){

            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $nomeBanco = "3daw";
			
            $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
            
            if ($conn->connect_error){
				
                die("Não foi possível conectar! Tente novamente." . $conn->connect_error);
				
            }

            $sql = "INSERT INTO `cadastro`(`nome`, `email`, `matricula`) VALUES ('$nome','$email','$matricula')";

            if ($conn -> query($sql) === TRUE){
				
				echo "Aluno $nome, de e-mail: $email e matrícula: $matricula inserido com sucesso.";
				
            }
            else{
				
                echo "Erro! Tente novamente.";
				
            }
        }
        else
        {
			
            echo "Algum dado foi inserido incorretamente. Insira novamente!<br>";
			
        }
    }
?>

<html>  

	<a href="menu.html">Retornar ao Menu Principal</a> 

</html>