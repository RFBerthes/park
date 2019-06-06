<?php

include('database_functions.php');

//Recebendo dados 
$placa = $_GET['placa'];

$pdo = connect_to_database("park");

$sql_del = "DELETE FROM veiculos WHERE placa = :placa";
$stmt_del = $pdo->prepare($sql_del);
$stmt_del->bindParam(':placa', $placa);

try {
        $stmt_del->execute();

        if ($stmt_del->rowCount() == 0) {
            header("Location: veiculos.php?erro");
            exit();
        } else {
            header("Location: veiculos.php?sucesso");
            exit();
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."\n";
  exit('\nOooops...');
}

?>