<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

echo "Nome: $imagem <br>";
echo "E-mail: $descricao <br>";

$result_imovel = "UPDATE imovel SET tipo='$tipo', imagem='$imagem', titulo='$titulo', descricao='$descricao', modificado=NOW() WHERE id='$id'";
$resultado_imovel = mysqli_query($conn, $result_imovel);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Imóvel editado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Imóvel não foi editado com sucesso</p>";
	header("Location: editar.php?id=$id");
	
	
}
