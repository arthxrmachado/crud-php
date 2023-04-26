<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
		$endereco = $_POST["endereco"];
        $cep = $_POST["cep"];
		$cidade = $_POST["cidade"];
		$estado = $_POST["estado"];
    
        if ($nome != "" and !is_numeric($nome)){
			
            $nomeValido = 1;
        }
		
        else{
			
            $nomeValido = 0;
        }

        if ($cpf != "" and is_numeric($cpf)){
			
            $cpfValido = 1;
        }
		
        else{
			
            $cpfValido = 0;
        }
		
		if ($endereco != ""){
			
            $enderecoValido = 1;
        }
		
        else{
			
            $enderecoValido = 0;
        }

        if ($cep != "" and is_numeric($cep)){
			
            $cepValido = 1;
        }
		
        else{
			
            $cepValido = 0;
        }
		
		if ($cidade != "" and !is_numeric($cidade)){
			
            $cidadeValido = 1;
        }
		
        else{
			
            $cidadeValido = 0;
        }
		
		if ($estado != "" and !is_numeric($estado)){
			
            $estadoValido = 1;
        }
		
        else{
			
            $estadoValido = 0;
        }

    }

?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
	
        <meta charset="UTF-8">
		
        <title>Formulário para Cadastrar Cliente</title>
		
    </head>
	
    <body>
	
        <form action="cadastrar.php" method="POST">
		
            Nome: <input type="text" name="nome"><br><br>
			
            CPF: <input type="text" name="cpf"><br><br>
			
			Endereço: <input type="text" name="endereco"><br><br>
			
            CEP: <input type="text" name="cep"><br><br>
			
			Cidade: <input type="text" name="cidade"><br><br>
			
			Estado: <input type="text" name="estado"><br><br>
			
            <input type="submit" value="Enviar">
			
        </form>

    </body>
	
</html>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
        if($nomeValido == 1 and $cpfValido == 1 and $enderecoValido == 1 and $cepValido == 1 and $cidadeValido == 1 and $estadoValido == 1){

            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $nomeBanco = "prova3daw";
			
			$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
            
            if ($conn->connect_error){
				
                die("<br>Não foi possível conectar! Tente novamente.<br>" . $conn->connect_error);
				
            }
			
			$sql = "INSERT INTO `cliente`(`nome`, `cpf`, `endereco`, `cep`, `cidade`, `estado`) VALUES ('$nome', '$cpf', '$endereco', '$cep', '$cidade', '$estado')";

            if ($conn -> query($sql) === TRUE){
				
				echo "<br>Cliente cadastrado com sucesso.<br>";
				
            }
            else{
				
                echo "<br>Erro! Tente novamente.<br>";
				
            }
        }
        else{
			
            echo "<br>Algum dado foi inserido incorretamente! Insira novamente.<br>";
			
        }
    }
?>

<html>  

	<a href="menu.html"><br>Retornar ao Menu Principal</a> 

</html>