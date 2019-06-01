<?php
	include_once("conexao.php");
	$idcliente = mysqli_real_escape_string($conexao, $_POST['idcliente']);
	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
	
	$result_usuarios = "UPDATE clientes SET nome='$nome' WHERE idcliente = '$idcliente'";	
	$resultado_usuarios = mysqli_query($conexao, $result_usuarios);	

	if(mysqli_affected_rows($conexao) != 0){
		header('location:clientes.php?sucesso2');

	}else{
		header('location:clientes.php?erro2');
	}
	
	$conexao->close(); 
?>