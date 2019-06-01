<?php
	include_once("conexao.php");
	
	$usuario = $_GET['usuario'];
	
	$result_usuarios = "DELETE FROM usuarios WHERE usuario = '$usuario'";
	$resultado_usuarios = mysqli_query($conexao, $result_usuarios);	


	if(mysqli_affected_rows($conexao) != 0){
		header('location:usuarios.php?sucesso3');

	}else{
		echo "erro1";
		header('location:usuarios.php?erro3');
	}
	
	$conexao->close();
 ?>