<?php
    include('database_functions.php');

    $pdo = connect_to_database("park");

    //Recebendo dados do login
    // resgata variáveis do formulário
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha";
    $usuario = $pdo->prepare($sql);

    $usuario->bindParam(':nome', $nome);
    $usuario->bindParam(':senha', $senha);

    $usuario->execute();
  

    if ($usuario->rowCount() == 1)
    {
        //trata encontrado
        $row = $usuario->fetch();
        session_start();
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['perfil'] = $row['perfil'];
        header('Location: inicial.php');

    }else{
        //trata usuário ou senha inválidos
        header('location: index.php?erro');
    } 

    ?>