<?php
session_start();
include_once("conexao.php");

$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);
$local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

echo "tipo: $tipo <br>";
echo "imagem: $imagem <br>";
echo "titulo: $titulo <br>";
echo "descricao: $descricao <br>";



$result_imovel = "INSERT INTO imovel (tipo, imagem, local, titulo, valor, descricao, criado) VALUES ('$tipo', '$imagem', '$local', '$titulo', '$valor', '$descricao', NOW())";
$resultado_imovel = mysqli_query($conn, $result_imovel);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cad_imovel.php");
	
	
	
}
