<?php
	include_once("conexao.php");
	$idusuario = mysqli_real_escape_string($conexao, $_POST['idusuario']);
	$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
	$perfil = mysqli_real_escape_string($conexao, $_POST['perfil']);
	
	$result_usuarios = "UPDATE usuarios SET nome='$nome', perfil = '$perfil', usuario = '$usuario' WHERE idusuario = '$idusuario'";	
	$resultado_usuarios = mysqli_query($conexao, $result_usuarios);	

	if(mysqli_affected_rows($conexao) != 0){
		header('location:usuarios.php?sucesso2');

	}else{
		header('location:usuarios.php?erro2');
	}
	
	$conexao->close(); 
?>