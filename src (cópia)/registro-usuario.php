<?php
    include('conexao.php');

    //Recebendo dados do login
    $perfil  = $_POST["perfil"];
    $nome    = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha   = $_POST["senha"];
    
    $query = "SELECT usuario FROM `usuarios` WHERE usuario = '$usuario' ";
    
    //Consultar o banco de dados para uso
    $result = mysqli_query($conexao, $query);

    //verificar quantas linha a query retornou (0 não encontrou | 1 encontrou)
    $row = mysqli_num_rows($result);

    if ($row == 1){
       echo "erro1";
       header('location:usuarios.php?erro1');
       
    }else{
       $inserirdados = mysqli_query($conexao, "INSERT INTO `usuarios` (`idusuario`, `perfil`, `nome`, `usuario`, `senha`) VALUES (NULL, '$perfil', '$nome', '$usuario', '$senha')");
       header('location:usuarios.php?sucesso1');
       
    }
    
    $conexao->close();
?>

