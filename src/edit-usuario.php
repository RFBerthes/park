<?php

include('database_functions.php');

$nome = $_POST['nome'];
$idusuario = $_POST['idusuario'];
$perfil = $_POST['perfil'];
$senha = $_POST['senha'];

$pdo = connect_to_database("park");
$sql_upd = "UPDATE usuarios SET nome = :nome, senha = :senha, perfil = :perfil WHERE idusuario = :idusuario";
$stmt_upd = $pdo->prepare($sql_upd);
$stmt_upd->bindParam(':idusuario', $idusuario);
$stmt_upd->bindParam(':nome', $nome);
$stmt_upd->bindParam(':senha', $senha);
$stmt_upd->bindParam(':perfil', $perfil);

try {
        $stmt_upd->execute();

        if ($stmt_upd->rowCount() == 0) {
            header("Location: usuarios.php?erro2");
            exit();
        } else {
            header("Location: usuarios.php?sucesso2");
            exit();
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."\n";
  exit('\nOooops...');
}

?>