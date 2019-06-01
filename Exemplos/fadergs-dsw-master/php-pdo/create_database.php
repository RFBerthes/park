<?php

require 'database_functions.php';

function create_database($pdo) {
    $sql = "CREATE DATABASE IF NOT EXISTS mydatabase";
    $pdo->exec($sql);
}

function create_table($pdo) {
    $sql = "CREATE TABLE alunos IF NOT EXISTS (".
               "matricula varchar(10) NOT NULL,".
               "nome varchar(100) NOT NULL,".
               "PRIMARY KEY (matricula))";

    $pdo->exec(sql);
}

function insert_data($pdo) {
    $sql = "INSERT INTO alunos(matricula, nome) VALUES (?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(["1234", "Rafael"]);
    $stmt->execute(["3241", "Andre"]);
}

function insert_more_data($pdo) {

    $dados = array(
        array(":matricula" => "9876", ":nome" => "Patricia"),
        array(":matricula" => "3642", ":nome" => "Maria"),
        array(":matricula" => "9423", ":nome" => "Ana"),
        array(":matricula" => "1024", ":nome" => "Marcela"),
        array(":matricula" => "8943", ":nome" => "Daniela"),
    );

    $sql = "INSERT INTO alunos(matricula, nome) VALUES (:matricula, :nome)";

    $stmt = $pdo->prepare($sql);

    foreach ($dados as $row) {
        $stmt->execute($row);
    }
}

function update_data($pdo, $nome, $matricula) {
    $sql = "UPDATE alunos SET nome = :nome WHERE matricula = :matricula";

    $stmt = $pdo->prepare($sql);
    $stmt = $pdo->execute(array(":matricula" => $matricula, ":nome" => $nome));
}

function delete_data($pdo, $matricula) {
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
    $stmt->execute($matricula);

    // -1 para erro, 0 ou mais para o número de linhas afetadas.
    return $stmt->rowCount();
}

function select_from_pdo($pdo) {
    $sql = "SELECT * FROM alunos";

    $result = $pdo->query($sql);

    while ($row = $result->fetch()) {
        echo "matricula: ".$row['matricula']." - Nome:".$row['nome']."<br>";
    }
}

function select_from_statement($pdo, $like) {

    $like = "%${like}%";

    $sql = "SELECT * FROM alunos WHERE nome LIKE ?";
    $stmt = $pdo->prepare($sql);

    $stmt->execute(array($like));

    while ($row = $stmt->fetch()) {
        echo "matricula: ".$row['matricula']." - Nome:".$row['nome']."<br>";
    }
}

?>
