<?php
	include_once("conexao.php");
	$idbebida = mysqli_real_escape_string($conexao, $_POST['idbebida']);
	$estoque = mysqli_real_escape_string($conexao, $_POST['estoque']);
	$valor = mysqli_real_escape_string($conexao, $_POST['valor']);
	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
	
	$result_bebidas = "UPDATE bebidas SET estoque='$estoque', nome='$nome', valor='$valor' WHERE idbebida = '$idbebida'";	
	$resultado_bebidas = mysqli_query($conexao, $result_bebidas);	

	if(mysqli_affected_rows($conexao) != 0){
		header('location:bebidas.php?sucesso2');

	}else{
		header('location:bebidas.php?erro2');
	}
	
	$conexao->close(); 
?>