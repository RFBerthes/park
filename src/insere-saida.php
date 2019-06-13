<?php

include('database_functions.php');

$placa = $_POST['placa'];

//echo $placa; exit;

$pdo = connect_to_database("park");

$sql_ins = "INSERT INTO registros (entrada, saida, valor, veiculos_placa) VALUES (CURRENT_TIMESTAMP, NULL, NULL, :placa)";
$stmt_ins = $pdo->prepare($sql_ins);
$stmt_ins->bindParam(':placa', $placa);

try {
        $stmt_ins->execute();
        if ($stmt_ins->rowCount() == 0) {
            header("Location: admin.php?erro");
        } else {
            header("Location: admin.php?sucesso");
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."<br>";
  exit('Oooops...');
}

?>
