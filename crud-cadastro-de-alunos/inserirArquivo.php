<!DOCTYPE html>
	<html lang="pt-br">
	
		<head>
			
			<meta charset="UTF-8">
			<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
			<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
			
		<title>Inserir arquivo</title>
		
		</head>
		
		<body>
		
			<form action="inserirArquivo.php" method="POST" enctype="multipart/form-data">
		
				<input type="file" name="arquivo"><br><br>	
			
				<input type="submit" value="Importar">
			
			</form>
		
	</body>
	
</html>

<?php

if (($_POST) && (!empty($_POST["csv"])))
{
    $conn = mysqli_connect("localhost", "root", "", "3daw");

    $arquivo = fopen($_POST["csv"], 'r');
	
	$valor = fgetcsv($arquivo, 0, ';', '"');

    if ($arquivo)
    {
        while (!feof($arquivo))
        {
            $valor = fgetcsv($arquivo, 0, ';', '"');

            if (!$valor) continue;
			
			$query = mysqli_query($con, "INSERT INTO `cadastro` (`nome`, `email`, `matricula`) VALUES ('$valor[0]','$valor[1]','$valor[2]')");
			
			$sql = "INSERT INTO `cadastro` (`nome`, `email`, `matricula`) VALUES ('$valor[0]','$valor[1]','$valor[2]')";
			
        }

        if ($conn -> query($sql) === TRUE){
				
			echo "Aluno $nome, de e-mail: $email e matrícula: $matricula inserido com sucesso.<br><br>";
				
        }
        
		else{
				
                echo "Erro! Tente novamente.";
				
        }

        fclose($arquivo);
    }
	
}
?>

<html>  

	<a href="menu.html">Retornar ao Menu Principal</a> 

</html>