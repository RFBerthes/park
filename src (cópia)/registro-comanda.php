<?php
    include_once('conexao.php');

    //Recebendo dados do login
    $mesa  = $_POST["mesa"];
    $cliente  = $_POST["cliente"];
    $atendente  = $_POST["atendente"];

    // echo $mesa;
    // echo "<br>";
    // echo $cliente;
    // echo "<br>";
    // echo $atendente;
    // exit;

    $insert = "INSERT INTO `comandas` (`idcomanda`, `data`, `total`, `cliente_idcliente`, `mesa_idmesa`, `usuarios_idusuario`) VALUES (NULL, CURRENT_TIMESTAMP, NULL, '$cliente', '$mesa', '$atendente')";
 
    //Consultar o banco de dados para uso
    $result = mysqli_query($conexao, $insert);

    //verificar quantas linhas foram alteradas
    if($result){
      header('location:comandas.php?sucesso');       
    }else{
      header('location:comandas.php?erro');     
    }
    
?>

