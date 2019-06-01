<?php

include('database_functions.php');

if (!isset($_POST['nome'])) {
    echo "<p>Um nome é necessário.</p>";
    exit();
}

$nome = $_POST['nome'];
$m1 = $_POST['m1'] == "" ? NULL : $_POST['m1'];
$m2 = $_POST['m2'] == "" ? NULL : $_POST['m2'];
$g2 = $_POST['g2'] == "" ? NULL : $_POST['g2'];

$pdo = connect_to_database("alunos");

$sql_search = "SELECT nome FROM alunos WHERE nome = :nome";
$stmt_search = $pdo->prepare($sql_search);

$sql_ins = "INSERT INTO alunos (nome, m1, m2, g2) VALUES(:nome, :m1, :m2, :g2)";
$stmt_ins = $pdo->prepare($sql_ins);

$sql_upd = "UPDATE alunos SET m1 = :m1, m2 = :m2, g2 = :g2 WHERE nome = :nome";
$stmt_upd = $pdo->prepare($sql_upd);

try {
    if ($stmt_search->execute(array(":nome"=>$nome))) {
        $dados = array(
            ":nome" => $nome,
            ":m1" => $m1,
            ":m2" => $m2,
            ":g2" => $g2
        );
        if ($stmt_search->rowCount() > 0) {
            $stmt_upd->execute($dados);
        } else {
            $stmt_ins->execute($dados);
        }
        header("Location: lista.php");
    } else {
        echo "<p>Got no SEARCH results...</p>";
        echo "<p>Erro no SEARCH.</p>";
        exit();
    }
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."\n";
  exit('\nOooops...');
}

?>
