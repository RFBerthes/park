<?php
    include_once("conexao.php");

    //Recebendo dados 
    $idcliente = $_GET['idcliente'];
    //echo $idcliente;
    //exit;
	
    $del_cliente = "DELETE FROM clientes WHERE idcliente = '$idcliente'";
    $result = mysqli_query($conexao, $del_cliente);
  
  
    if(mysqli_affected_rows($conexao) != 0){
      header('location:clientes.php?sucesso3');
  
    }else{
      echo "erro1";
      header('location:clientes.php?erro3');
    }
    
    $conexao->close();
   ?>