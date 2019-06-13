<?php

include('database_functions.php');

$idregistro = $_GET['idregistro'];
$status = "Saindo";


//echo $idregistro; exit;

$pdo = connect_to_database("park");

$sql_upd = "UPDATE registros SET saida = CURRENT_TIMESTAMP WHERE registros.idregistro = :idregistro";
$stmt_upd = $pdo->prepare($sql_upd);
$stmt_upd->bindParam(':idregistro', $idregistro);

try {
        $stmt_upd->execute();
        if ($stmt_upd->rowCount() == 0) {
            header("Location: inicial.php?erro");
        } else {

            $sql = "SELECT TIMESTAMPDIFF(MINUTE, entrada, saida ) FROM registros WHERE registros.idregistro =  :idregistro";
            $stmt_sql = $pdo->prepare($sql);
            $stmt_sql->bindParam(':idregistro', $idregistro);
            
            $stmt_sql->execute();
            
            $row = $stmt_sql->fetch();
            $dif = $row['TIMESTAMPDIFF(MINUTE, entrada, saida )'];
            
            //$valor= ($dif/30)*5; //5 reais a cada 30 min.
            $valor = $dif*5;  //Teste em aula 5 reais por min.
            
            // echo $dif;
            // echo "<br>";
            // echo $valor; exit;

            $sql_updvlr = "UPDATE registros SET valor = :valor, status = :status WHERE registros.idregistro = :idregistro";
            $stmt_updvlr = $pdo->prepare($sql_updvlr);
            $stmt_updvlr->bindParam(':idregistro', $idregistro);
            $stmt_updvlr->bindParam(':status', $status);
            $stmt_updvlr->bindParam(':valor', $valor);
            $stmt_updvlr->execute();

            header("Location: inicial.php?sucesso");
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."<br>";
  exit('Oooops...');
}

?>
