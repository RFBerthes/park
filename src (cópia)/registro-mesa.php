<?php
    include_once("conexao.php");

    //Recebendo dados 
    $idmesa  = $_GET['idmesa'];

    //verificar quantas linhas foram alteradas
    if($idmesa == 1){
      $insere_mesa = "INSERT INTO `mesas` (`idmesa`, `lugares`) VALUES ('', NULL)";	
      $resultado_mesa = mysqli_query($conexao, $insere_mesa);	
      header('location:mesas.php?sucesso1');       
    }else{
      header('location:mesas.php?erro1');      
    }
?>

