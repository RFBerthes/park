<?php

include('database_functions.php');

//Recebendo dados 
$idclientes = $_GET['idclientes'];

$pdo = connect_to_database("park");

$sql_del = "DELETE FROM clientes WHERE idclientes = :idclientes";
$stmt_del = $pdo->prepare($sql_del);
$stmt_del->bindParam(':idclientes', $idclientes);

try {
        $stmt_del->execute();

        if ($stmt_del->rowCount() == 0) {
            header("Location: clientes.php?erro");
            exit();
        } else {
            header("Location: clientes.php?sucesso");
            exit();
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."\n";
  exit('\nOooops...');
}

?>