<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "prova3daw";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
	
    if ($conn->connect_error){
				
		die("<br>Não foi possível conectar! Tente novamente.<br>" . $conn->connect_error);
				
    }
?>

