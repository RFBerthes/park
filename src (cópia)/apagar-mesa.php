<?php
    include_once("conexao.php");

    //Recebendo dados 
    $idmesa = $_GET['idmesa'];
    // echo $idmesa;
    // exit;
	
    $del_mesa = "DELETE FROM mesas WHERE idmesa = '$idmesa'";
    $result = mysqli_query($conexao, $del_mesa);	
  
  
    if(mysqli_affected_rows($conexao) != 0){
      header('location:mesas.php?sucesso3');
  
    }else{
      echo "erro1";
      header('location:mesas.php?erro3');
    }
    
    $conexao->close();
   ?>