<?php
    include_once("conexao.php");

    //Recebendo dados 
    $idcomanda = $_GET['idcomanda'];
    // echo $idcomanda;
    // exit;
	
    $del_comanda = "DELETE FROM comandas WHERE idcomanda = '$idcomanda'";
    $result = mysqli_query($conexao, $del_comanda);	
  
  
    if(mysqli_affected_rows($conexao) != 0){
      header('location:comandas.php?sucesso');
  
    }else{
      echo "erro1";
      header('location:comandas.php?erro');
    }
    
    $conexao->close();
   ?>