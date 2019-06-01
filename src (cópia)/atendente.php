<?php
  include_once("conexao.php");
    session_start();
    // puxar produtos do banco
    $consulta1 = "SELECT * FROM `clientes`";
    // $consulta2 = "SELECT * FROM `mesas`";
    // $consulta3 = "SELECT * FROM `sabores`";
    // $consulta4 = "SELECT * FROM `bebidas`";
    $result_clientes = mysqli_query($conexao, $consulta1) or die ($conexao->error);
    // $result_mesas = mysqli_query($conexao, $consulta2) or die ($conexao->error);
    // $result_sabores = mysqli_query($conexao, $consulta3) or die ($conexao->error);
    // $result_bebidas = mysqli_query($conexao, $consulta4) or die ($conexao->error);

?>
<!doctype html>
<html lang="pt-br">

<head>
  <?php require_once "header-atendente.php" ?>
  </head>

<body>
  <div class="container bg-dark text-white mt-2 mb-2 pb-2">

  </div>

  <!-- popup informativos -->
  <?php if (isset($_GET['sucesso1'])) { ?>
  <script>
    Swal.fire({
      type: 'success',
      title: 'Feito!',
      text: 'Cliente cadastrado com sucesso!!',
    })
  </script>
  <?php }elseif (isset($_GET['erro1'])) { ?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Cliente já existe, tente novamente',
    })
  </script>
  <?php }elseif (isset($_GET['sucesso2'])) { ?>
  <script>
    Swal.fire({
      type: 'success',
      title: 'Feito!',
      text: 'Cliente editado com sucesso!!',
    })
  </script>
  <?php }elseif (isset($_GET['erro2'])) { ?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Cliente não foi editado, tente novamente',
    })
  </script>
  <?php }elseif (isset($_GET['sucesso3'])) { ?>
  <script>
    Swal.fire({
      type: 'success',
      title: 'Feito',
      text: 'Cliente excluído com sucesso!!',
    })
  </script>
  <?php }elseif (isset($_GET['erro3'])) { ?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Cliente não foi excluído, tente novamente',
    })
  </script>
  <?php } ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>