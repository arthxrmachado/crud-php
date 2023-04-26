<?php

    include("conexao_servidor.php");
	
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

	$result_produto = "SELECT * FROM produtos WHERE id = '$id'";
	
	$resultado_produto = mysqli_query($conn, $result_produto);
	
	$row_produto = mysqli_fetch_assoc($resultado_produto);

?>

<!DOCTYPE html>

	<html lang="pt-br">
	
		<head>
			<meta charset="utf-8">
			
			<title> Cadastro de Produtos </title>
			
		</head>

		<body>
		
			<form>
			
				<label> Nome: </label>
				
				<input type="text" name="nome"><br><br>

				<label> Fabricante: </label>
				
				<input type="text" name="fabricante"><br><br>
			
				<label> Código de Barras: </label>
				
				<input type="text" name="codigo" p><br><br>

				<label> Categoria: </label>
				
				<select name="id_categoria" id="id_categoria">
					<option value=""> Categoria: </option>
					
					<?php
					
						$result_categoria="SELECT * FROM categorias ORDER BY nome_categoria";
						
						$resultado_categoria = mysqli_query($conn, $result_categoria);
						
						while($row_cat=mysqli_fetch_assoc($resultado_categoria)){
							
							echo '<option value="' .$row_cat['id'].'">'.$row_cat['nome_categoria'].'</option>'; 
							
						}
						
					?>
					
				</select><br><br>

				<label> Tipo de Produto: </label>
				
				<select value="id_tipo" id="id_tipo">
				
					<option value=""> Tipo de Produto: </option>
					
				</select>br><br>

				<label> Preço de Venda: </label>
				
				<input type="text" name="preco"><br><br>

				<label> Quantidade em Estoque: </label>
				
				<input type="text" name="quantidade"><br><br>

				<label> Peso(em gramas): </label>
				
				<input type="text" name="peso"><br><br>

				<label> Descrição</label>
				
				<input type="text" name="descricao"><br><br>

				<label> Data de Inclusão: </label>
				
				<input type="text" name="data"><br><br>

				<input type="submit" value="Cadastrar Produto"><br><br>
				
			</form>
			
			<!DOCTYPE html>

	<html lang="pt-br">
	
		<head>
			<meta charset="utf-8">
			
			<title> Cadastro de Produtos </title>
			
		</head>

		<body>
		
			<form>
			
				<label> Nome: </label>
				
				<input type="text" name="nome"><br><br>

				<label> Fabricante: </label>
				
				<input type="text" name="fabricante"><br><br>
			
				<label> Código de Barras: </label>
				
				<input type="text" name="codigo" p><br><br>

				<label> Categoria: </label>
				
				<select name="id_categoria" id="id_categoria">
					<option value=""> Categoria: </option>
					
					<?php
					
						$result_categoria="SELECT * FROM categorias ORDER BY nome_categoria";
						
						$resultado_categoria = mysqli_query($conn, $result_categoria);
						
						while($row_cat=mysqli_fetch_assoc($resultado_categoria)){
							
							echo '<option value="' .$row_cat['id'].'">'.$row_cat['nome_categoria'].'</option>'; 
							
						}
						
					?>
					
				</select><br><br>

				<label> Tipo de Produto: </label>
				
				<select value="id_tipo" id="id_tipo">
				
					<option value=""> Tipo de Produto: </option>
					
				</select>br><br>

				<label> Preço de Venda: </label>
				
				<input type="text" name="preco"><br><br>

				<label> Quantidade em Estoque: </label>
				
				<input type="text" name="quantidade"><br><br>

				<label> Peso(em gramas): </label>
				
				<input type="text" name="peso"><br><br>

				<label> Descrição</label>
				
				<input type="text" name="descricao"><br><br>

				<label> Data de Inclusão: </label>
				
				<input type="text" name="data"><br><br>

				<input type="submit" value="Cadastrar Produto"><br><br>
				
			</form>
			
			<?php
						
				$sql = "UPDATE `produtos` SET `nome`='$nome', `fabricante`='$fabricante', `codigo`='$codigo', `id_categoria`='$categoria', `id_tipo`='$tipo', `preco`='$preco', `quantidade`='$quantidade', `peso`='$peso', `descricao`='$descricao', `data`='$data' WHERE `id` = '$id'";

					if ($conn -> query($sql) === TRUE){
							
						echo "<br>Produto cadastrado com sucesso.<br>";
							
					}
					
					else{
							
						echo "<br>Erro! Tente novamente.<br>";
							
					}
			?>

			<a href="menu.html"><br>Retornar ao Menu Principal</a> 
			
		</body>
	
	</html>

			<a href="menu.html"><br>Retornar ao Menu Principal</a> 
			
		</body>
	
	</html>