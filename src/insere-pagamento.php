<?php

include('database_functions.php');

$idregistro = $_GET['idregistro'];


//echo $idregistro; exit;

$pdo = connect_to_database("park");

$sql_upd = "UPDATE registros SET status = 'Pago' WHERE registros.idregistro = :idregistro";
$stmt_upd = $pdo->prepare($sql_upd);
$stmt_upd->bindParam(':idregistro', $idregistro);

try {
        $stmt_upd->execute();
        if ($stmt_upd->rowCount() == 0) {
            header("Location: inicial.php?erro");
        } else {
            header("Location: inicial.php?sucesso");
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."<br>";
  exit('Oooops...');
}

?>
