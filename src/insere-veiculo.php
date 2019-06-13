<?php

include('database_functions.php');

$placa = $_POST['placa'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$cor = $_POST['cor'];
$cliente = $_POST['cliente'];

//echo "$placa $marca $modelo $cor $cliente"; exit;

$pdo = connect_to_database("park");

$sql_search = "SELECT placa FROM veiculos WHERE placa = :placa";
$stmt_search = $pdo->prepare($sql_search);
$stmt_search->bindParam(':placa', $placa);

$sql_ins = "INSERT INTO veiculos (placa, marca, modelo, cor, clientes_idcliente) VALUES (:placa,  :marca, :modelo, :cor, :cliente ); ";
$stmt_ins = $pdo->prepare($sql_ins);
$stmt_ins->bindParam(':placa', $placa);
$stmt_ins->bindParam(':marca', $marca);
$stmt_ins->bindParam(':modelo', $modelo);
$stmt_ins->bindParam(':cor', $cor);
$stmt_ins->bindParam(':cliente', $cliente);

try {
        $stmt_search->execute();

        if ($stmt_search->rowCount() > 0) {
            header("Location: veiculos.php?erro");
        } else {
            $stmt_ins->execute();
            header("Location: veiculos.php?sucesso");
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."<br>";
  exit('Oooops...');
}

?>
