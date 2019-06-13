<?php

include('database_functions.php');

$placa = $_POST['placa'];

echo $placa; exit;

$pdo = connect_to_database("park");
//PAREI AQUI
$sql_ins = "INSERT INTO resgistros (entrada, saida, valor, veiculos_placa) VALUES (NULL, NULL, NULL, '')";
$stmt_ins = $pdo->prepare($sql_ins);
$stmt_ins->bindParam(':placa', $placa);
$stmt_ins->bindParam(':marca', $marca);
$stmt_ins->bindParam(':modelo', $modelo);
$stmt_ins->bindParam(':cor', $cor);
$stmt_ins->bindParam(':cliente', $cliente);

try {
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
