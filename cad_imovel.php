<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>AlugaVale - Cadastrar</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar</a><br>
		<a href="index.php">Listar</a><br>
		<h1>Cadastrar Imóvel</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_cad_imovel.php">
			<label>Tipo: </label>
			<select name="tipo">
				<option value="" >Selecione o tipo</option>
				<option value="venda" >Venda</option>
				<option value="aluga" >Aluga</option>
			</select><br><br>
			
			<label>Imagem: </label>
			<input type="text" name="imagem" placeholder="link da imagem"><br><br>
			
			<label>Local: </label>
			<input type="text" name="local" placeholder="Local"><br><br>
			
			<label>Título: </label>
			<input type="text" name="titulo" placeholder="Título"><br><br>
			
			<label>Valor: </label>
			<input type="text" name="valor" placeholder="Valor"><br><br>
			
			<label>Descrição: </label><br>
			<textarea rows="10" cols="40" maxlength="500" name="descricao"></textarea><br><br>
			
			
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>