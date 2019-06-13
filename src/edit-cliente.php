<?php

include('database_functions.php');

$nome = $_POST['nome'];
$idcliente = $_POST['idcliente'];
$cpf = $_POST['cpf'];

$pdo = connect_to_database("park");

$sql_upd = "UPDATE clientes SET nome = :nome, cpf = :cpf  WHERE idcliente = :idcliente";
$stmt_upd = $pdo->prepare($sql_upd);
$stmt_upd->bindParam(':nome', $nome);
$stmt_upd->bindParam(':idcliente', $idcliente);
$stmt_upd->bindParam(':cpf', $cpf);

try {
        $stmt_upd->execute();

        if ($stmt_upd->rowCount() == 0) {
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