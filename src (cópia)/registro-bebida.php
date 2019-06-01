<?php
    include_once('conexao.php');

    //Recebendo dados do login
    $nome  = $_POST["nome"];
    $valor  = $_POST["valor"];
    $estoque  = $_POST["estoque"];

    $query = "SELECT `nome`  FROM `bebidas` WHERE nome = '$nome'";
    
    //Consultar o banco de dados para uso
    $result = mysqli_query($conexao, $query);

    //verificar quantas linha a query retornou (0 não encontrou | 1 encontrou)
    $row = mysqli_num_rows($result);
    echo $row;

    if ($row == 1){
       header('location:bebidas.php?erro1');
       exit();
       
    }else{
       $inserirdados = mysqli_query($conexao, "INSERT INTO `bebidas` (`idbebida`, `nome`, `valor`, `estoque`) VALUES (NULL, '$nome', '$valor', '$estoque');");
       header('location:bebidas.php?sucesso1');
       exit();
       
    }
    
?>

