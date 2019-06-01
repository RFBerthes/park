<?php
include_once("conexao.php");
session_start();
// puxar produtos do banco
$consulta1 = "SELECT * FROM `usuarios`";
$consulta2 = "SELECT * FROM `mesas`";
$consulta3 = "SELECT * FROM `sabores`";
$consulta4 = "SELECT * FROM `bebidas`";
$result_usuarios = mysqli_query($conexao, $consulta1) or die($conexao->error);
$result_mesas = mysqli_query($conexao, $consulta2) or die($conexao->error);
$result_sabores = mysqli_query($conexao, $consulta3) or die($conexao->error);
$result_bebidas = mysqli_query($conexao, $consulta4) or die($conexao->error);

?>
<!doctype html>
<html lang="pt-br">

<head>
  <?php require_once "header-admin.php" ?>
  <script>
  </script>
</head>

<body class="bg-dark text-white">


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>