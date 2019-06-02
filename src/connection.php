<?php

/**
 * 
 * @return \PDO
 */

function getConnection() {
  
  $dbname = "park";
  $dsn = "mysql:host=localhost;dbname=$dbname";
  $user = "root";
  $pass = "";
  $options = [
    // desliga emulação para PreparedStatements
    PDO::ATTR_EMULATE_PREPARES   => false,
    // força exceções em caso de erros
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // define o retorno padrão dos dados em um array associativo
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ];

  try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    return $pdo;
  } catch (PDOException $ex) {
    echo "ERROR: ".$ex->getMessage();
    exit('Oooops...');
  }
}

/**
 * Cria o hash da senha, usando MD5 e SHA-1
 */
function make_hash($str)
{
    return sha1(md5($str));
}

function close_connection(&$pdo) {
    $pdo = null;
}

?>
