<?php
    require 'database_functions.php';
    $databasename = "park";
    $conn = connect_to_database($databasename);

    echo "connect";

    exit;
    //Recebendo dados do login
    //$login = $_POST["usuario"];
    //$senha   = $_POST["senha"];
    $usuario = $pdo->mysqli_real_escape_string($_POST['usuario']);
    $senha = $pdo->mysqli_real_escape_string($_POST['senha']);
    //$senha = md5($_POST['senha']);

    echo $usuario;
    echo"<br>";
    echo $senha;
    exit;
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

    //Consultar o banco de dados para uso
    $result = $pdo->mysqli_query($query);
    //Isolar Perfil
    $dados = $result->fetch_assoc();

    //verificar quantas linha a query retornou (0 não encontrou | 1 encontrou)
    $row = mysqli_num_rows($result);

    if ($row == 0){
        //trata usuário ou senha inválidos
        header('location: index.php?erro');
                
    }elseif ($row == 1){
        //trata encontrado
        switch ($dados['perfil']) {
            case "admin":
                header("Location: admin.php");
                session_start();
                $_SESSION['idusuario'] = $dados['idusuario'];
                exit();
                break;

            case "funcionario":
                header("Location: funcionario.php");
                session_start();
                $_SESSION['idusuario'] = $dados['idusuario'];
                exit();
                break;

            default;
                //trata usuário com perfil inválido
                header('location: index.php?erro');
                break;
        }
    }
