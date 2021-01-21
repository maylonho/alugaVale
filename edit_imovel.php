<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_imovel = "SELECT * FROM imovel WHERE id = '$id'";
$resultado_imovel = mysqli_query($conn, $result_imovel);
$row_imovel = mysqli_fetch_assoc($resultado_imovel);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>AlugaVale - Editar</title>		
	</head>
	<body>
		<a href="cad_imovel.php">Cadastrar</a><br>
		<a href="index.php">Listar</a><br>
		<h1>Editar imovel</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_imovel.php">
			<input type="hidden" name="id" value="<?php echo $row_imovel['id']; ?>">
			
			<label>Tipo: </label>
			<select name="tipo">
				<option value="<?php echo $row_imovel['tipo']; ?>" ><?php echo $row_imovel['tipo']; ?></option>
				<option value="venda" >Venda</option>
				<option value="aluga" >Aluga</option>
			</select><br><br>
			
			<label>Imagem: </label>
			<input type="text" name="imagem" placeholder="link da imagem" value="<?php echo $row_imovel['imagem']; ?>"><br><br>
			
			<label>Título: </label>
			<input type="text" name="titulo" placeholder="Título" value="<?php echo $row_imovel['titulo']; ?>"><br><br>
			
			
			<label>Descrição: </label><br>
			<textarea rows="10" cols="40" maxlength="500" name="descricao" placeholder="<?php echo $row_imovel['descricao']; ?>"></textarea><br><br>
			
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>