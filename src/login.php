<?php
    include('database_functions.php');

    $pdo = connect_to_database("park");

    //Recebendo dados do login
    // resgata variáveis do formulário
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $senhaHasch = make_hash($senha);

    $sql = "SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha";
    $usuario = $pdo->prepare($sql);

    $usuario->bindParam(':nome', $nome);
    $usuario->bindParam(':senha', $senha);

    $usuario->execute();

    

    if ($usuario->rowCount() == 1)
    {
        //trata encontrado
        $row = $usuario->fetch();
        switch ($row['perfil']) {
            case "Administrador":
                session_start();
                $_SESSION['nome'] = $nome;
                header('Location: admin.php');
                break;
            case "Funcionário": 
                session_start();
                $_SESSION['nome'] = $nome;
                header('Location: func.php');
                exit();
                break;
            default;
                //trata usuário com perfil inválido
                header('location: index.php?erro');
                break;
    }   
    }else{
        //trata usuário ou senha inválidos
        header('location: index.php?erro');
    } 

    ?>