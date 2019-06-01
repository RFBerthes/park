<?php
    include('conexao.php');

    //Recebendo dados do login
    $nome  = $_POST["nome"];

    $query = "SELECT * FROM `clientes` WHERE nome = '$nome' ";
 
    //Consultar o banco de dados para uso
    $result = mysqli_query($conexao, $query);

    //verificar quantas linhas foram alteradas
    if(mysqli_affected_rows($result) == 1){
       header('location:clientes.php?erro1');      
    }else{
      $insere_sabor = "INSERT INTO `clientes` (`idcliente`, `nome`) VALUES (NULL, '$nome')";	
      $resultado_sabor = mysqli_query($conexao, $insere_sabor);	
      header('location:clientes.php?sucesso1');       
    }
    
?>

