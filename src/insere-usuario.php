<?php

include('database_functions.php');

$nome = $_POST['nome'];
$perfil = $_POST['perfil'];
$senha = $_POST['senha'];

$pdo = connect_to_database("park");

$sql_search = "SELECT nome FROM usuarios WHERE nome = :nome";
$stmt_search = $pdo->prepare($sql_search);
$stmt_search->bindParam(':nome', $nome);

$sql_ins = "INSERT INTO usuarios (nome, senha, perfil) VALUES(:nome, :senha, :perfil)";
$stmt_ins = $pdo->prepare($sql_ins);
$stmt_ins->bindParam(':nome', $nome);
$stmt_ins->bindParam(':senha', $senha);
$stmt_ins->bindParam(':perfil', $perfil);


try {
        $stmt_search->execute();

        if ($stmt_search->rowCount() > 0) {
            header("Location: usuarios.php?erro1");
            exit();
        } else {
            $stmt_ins->execute();
            header("Location: usuarios.php?sucesso1");
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."\n";
  exit('\nOooops...');
}

?>

