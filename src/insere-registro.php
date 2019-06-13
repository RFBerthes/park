<?php

include('database_functions.php');

$placa = $_POST['placa'];
$valor = 5;
$status = "Estacionado";
//echo $placa; exit;

$pdo = connect_to_database("park");

$sql_ins = "INSERT INTO registros (entrada, saida, valor, veiculos_placa, status) VALUES (CURRENT_TIMESTAMP, NULL, :valor, :placa, :status)";
$stmt_ins = $pdo->prepare($sql_ins);
$stmt_ins->bindParam(':valor', $valor);
$stmt_ins->bindParam(':placa', $placa);
$stmt_ins->bindParam(':status', $status);

try {
        $stmt_ins->execute();
        if ($stmt_ins->rowCount() == 0) {
            header("Location: inicial.php?erro");
        } else {
            header("Location: inicial.php?sucesso");
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."<br>";
  exit('Oooops...');
}

?>
