<?php
    include('conexao.php');

    //Recebendo dados
    $tamanho  = $_POST["tamanho"];
    $sabor  = $_POST["sabor"];
    $valor  = $_POST["valor"];
    $nsabor  = $_POST["nsabor"];
    
    $inserirdados = mysqli_query($conexao, "INSERT INTO `pizzas` (`idpizza`, `tamanho`, `nsabor`, `valor`) VALUES (NULL, '$tamanho', '$nsabor', '$valor')");

   if ($inserirdados == false){
         header('location:pizzas.php?erro1');       
      }else{
         
         header('location:pizzas.php?sucesso1');
      }
    
?>

