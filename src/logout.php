<?php
    session_start();
    include('database_functions.php');
    $pdo = connect_to_database("park");

    $login =  $_SESSION['nome'];
    echo $login;

    //Efetuando logout
    unset ($_SESSION['nome']);

    $login =  $_SESSION['nome'];
    echo $login;
    // exit;


    header('location:index.php');

?>