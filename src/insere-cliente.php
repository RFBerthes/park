<?php

include('database_functions.php');

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

$pdo = connect_to_database("park");

$sql_search = "SELECT nome FROM clientes WHERE nome = :nome";
$stmt_search = $pdo->prepare($sql_search);
$stmt_search->bindParam(':nome', $nome);

$sql_ins = "INSERT INTO clientes (nome, cpf) VALUES(:nome, :cpf)";
$stmt_ins = $pdo->prepare($sql_ins);
$stmt_ins->bindParam(':nome', $nome);
$stmt_ins->bindParam(':cpf', $cpf);


try {
        $stmt_search->execute();

        if ($stmt_search->rowCount() > 0) {
            header("Location: clientes.php?erro");
            exit();
        } else {
            $stmt_ins->execute();
            header("Location: clientes.php?sucesso");
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."\n";
  exit('\nOooops...');
}

?>
