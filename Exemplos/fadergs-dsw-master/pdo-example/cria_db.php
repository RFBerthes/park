<?php

require('database_functions.php');

# Conecta no DB
$pdo = connect_to_database("postgres");

# Executa query de criacao do banco de dados.
$sql = "CREATE DATABASE alunos";
$pdo->exec($sql);

# Fecha a conexao com o banco de dados.
$pdo = null;

/**
 * Devido a uma característica do PostgreSQL, o arquivo abre duas conexoes.
 * Da forma como está aqui, funciona no PostgreSQL e no MariaDB.
 */

# Conecta no DB
$pdo = connect_to_database('alunos');

# Executa query para criar tabela.
$sql = "CREATE TABLE alunos (".
               "nome varchar(100) NOT NULL,".
               "m1 int,".
               "m2 int,".
               "g2 int,".
               "PRIMARY KEY (nome))";
$pdo->exec($sql);

# Toda conexao com o banco de dados e fechada quando o script termina.
?>
