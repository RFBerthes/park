<?php
	include_once("conexao.php");
	
	$idpizza = $_GET['idpizza'];
	
	
	$del_sabor = "DELETE FROM pizzas WHERE idpizza = '$idpizza'";
	$result = mysqli_query($conexao, $del_sabor);	


	if(mysqli_affected_rows($conexao) != 0){
		header('location:pizzas.php?sucesso3');

	}else{
		echo "erro1";
		header('location:pizzas.php?erro3');
	}
	
	$conexao->close();
 ?>