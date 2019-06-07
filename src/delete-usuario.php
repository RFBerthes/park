<?php

include('database_functions.php');

//Recebendo dados 
$idusuario = $_GET['idusuario'];

$pdo = connect_to_database("park");

$sql_del = "DELETE FROM usuarios WHERE idusuario = :idusuario";
$stmt_del = $pdo->prepare($sql_del);
$stmt_del->bindParam(':idusuario', $idusuario);

try {
        $stmt_del->execute();

        if ($stmt_del->rowCount() == 0) {
            header("Location: usuarios.php?erro3");
            exit();
        } else {
            header("Location: usuarios.php?sucesso3");
            exit();
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."\n";
  exit('\nOooops...');
}

?>