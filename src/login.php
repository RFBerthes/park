<?php
    include('database_functions.php');

    $pdo = connect_to_database("park");

    //Recebendo dados do login
    // resgata variáveis do formulário
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $senhaHasch = make_hash($senha);

    $sql = "SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nome', $usuario);
    $stmt->bindParam(':senha', $senha);

    $stmt->execute();
    $usuarios = $stmt->fetchAll();

    if (count($usuarios) <= 0)
    {
        header('location: index.php?erro');
        exit;
    }else{
    
        // pega o primeiro usuário
        $user = $usuarios[0];
        
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['idusuario'] = $usuario['idusuario'];
        $_SESSION['nome'] = $usuario['nome'];
        
        header('Location: admin.php');
    }

    ?>