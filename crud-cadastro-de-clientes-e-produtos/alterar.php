<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
		$endereco = $_POST["endereco"];
        $cep = $_POST["cep"];
		$cidade = $_POST["cidade"];
		$estado = $_POST["estado"];
		$id = $_POST["id"];
		
		if ($id != "" and is_numeric($id)){
			
            $idValido = 1;
        }
        else{
			
            $idValido = 0;
        }
    
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
		
        <title>Formulário para Alterar Cliente</title>
		
    </head>
	
    <body>
		
        <form action="alterar.php" method="POST">
		
		<p>Informe o ID do cliente a ser alterado: </p>
		
			ID: <input type="text" name="id"><br>
		
		<p>Atualize os dados de acordo com o que deseja ser alterado: </p>
		
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
		
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "prova3daw";

        if($idValido == 1 and $nomeValido == 1 and $cpfValido == 1 and $enderecoValido == 1 and $cepValido == 1 and $cidadeValido == 1 and $estadoValido == 1){
			
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
				
                $sql = "UPDATE `cliente` SET `nome`='$nome', `cpf`='$cpf', `endereco`='$endereco', `cep`='$cep', `cidade`='$cidade', `estado`='$estado' WHERE `id` = '$id'";
				
                $conn->query($sql);
				
                echo "<br>Cliente atualizado com sucesso.<br>";
				
            }
        }
    }
?>

<html>  

	<a href="menu.php"><br>Retornar ao Menu Principal</a> 

</html>