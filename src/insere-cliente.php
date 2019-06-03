<?php

include('database_functions.php');

if (!isset($_POST['nome'])) {
    echo "<p>Um nome é necessário.</p>";
    exit();
}

$nome = $_POST['nome'];

$pdo = connect_to_database("park");

$sql_search = "SELECT nome FROM clientes WHERE nome = :nome";
$stmt_search = $pdo->prepare($sql_search);

$sql_ins = "INSERT INTO clientes (idcliente, nome) VALUES('', :nome)";
$stmt_ins = $pdo->prepare($sql_ins);

try {
    if ($stmt_search->execute(array(":nome"=>$nome))) {
        $dados = array(
            ":nome" => $nome,
        );
        if ($stmt_search->rowCount() > 0) {
            header("Location: clientes.php?erro");
        } else {
            $stmt_ins->execute($dados);
            header("Location: clientes.php?sucesso");
        }
    } else {
        header("Location: clientes.php?erro");
        exit();
    }
} catch (Exception $e) {
    header("Location: clientes.php?erro");
    exit();
}

?>
