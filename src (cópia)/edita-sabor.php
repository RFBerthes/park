<?php
	include_once("conexao.php");
	$idsabor = mysqli_real_escape_string($conexao, $_POST['idsabor']);
	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
	
	$result_usuarios = "UPDATE sabores SET nome='$nome' WHERE idsabor = '$idsabor'";	
	$resultado_usuarios = mysqli_query($conexao, $result_usuarios);	

	if(mysqli_affected_rows($conexao) != 0){
		header('location:cadastros.php?sucesso2');

	}else{
		header('location:cadastros.php?erro2');
	}
	
	$conexao->close(); 
?>