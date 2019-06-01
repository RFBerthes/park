<?php
include_once("conexao.php");
session_start();
// puxar produtos do banco
$consulta1 = "SELECT * FROM `clientes`";
$consulta2 = "SELECT * FROM `mesas`";
$consulta3 = "SELECT * FROM `comandas`";
$consulta4 = "SELECT * FROM `bebidas`";
$result_clientes = mysqli_query($conexao, $consulta1) or die($conexao->error);
$result_mesas = mysqli_query($conexao, $consulta2) or die($conexao->error);
$result_comandas = mysqli_query($conexao, $consulta3) or die($conexao->error);
$result_bebidas = mysqli_query($conexao, $consulta4) or die($conexao->error);
//echo $_SESSION['idusuario'];

?>
<!doctype html>
<html lang="pt-br">

<head>
  <?php require_once "header-atendente.php" ?>
</head>

<body>
  <div class="container bg-dark text-white mt-2 mb-2 pb-2">

    <div class="pull-right">
      <button type="button" class="btn btn-xs btn-success mt-2 mb-2" data-toggle="modal" data-target="#ModalNovaComanda">Nova Comanda</button>
    </div>
    <div class="row">
      <?php while ($comandas = mysqli_fetch_assoc($result_comandas)) { ?>
        <div class="card text-dark mt-2 ml-3" id="cadr_@VALOR@" style="width:19%">
          <div class="card-body ">
            <h6 class="card-title" style="text-align:center">Comanda nº <?php echo $comandas['idcomanda']; ?></h6>
            <p class="card-text">Mesa: <?php echo $comandas['mesa_idmesa']; ?></p>
            <?php
            $consulta_cli = "SELECT nome FROM `clientes` WHERE idcliente='$comandas[cliente_idcliente]' ";
            $cli = mysqli_query($conexao, $consulta_cli);
            $nome = mysqli_fetch_assoc($cli); ?>
            <p class="card-text">Cliente: <?php echo $nome['nome']; ?></p>
            <div class="float-right">
              <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#ModalNovoPedido">Pedido</button>
            </div>

            <a href="apagar-comanda.php?idcomanda=<?php echo $comandas['idcomanda']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
          </div>
        </div>
      <?php } ?>
    </div>


    <!-- Inicio Modal Comanda -->
    <div class="modal fade text-dark" id="ModalNovaComanda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Nova Comanda</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form action="registro-comanda.php" method="POST">

              <label>Mesa</label>
              <select name="mesa" id="mesa" class="form-control">
                <?php while ($mesas = mysqli_fetch_assoc($result_mesas)) { ?>
                  <option value="<?php echo $mesas['idmesa']; ?>"><?php echo $mesas['idmesa']; ?></option>
                <?php } ?>
              </select>

              <label>Cliente</label>
              <select name="cliente" id="cliente" class="form-control">
                <?php while ($clientes = mysqli_fetch_assoc($result_clientes)) { ?>
                  <option value="<?php echo $clientes['idcliente']; ?>"><?php echo $clientes['nome']; ?></option>
                <?php } ?>
              </select>

              <input type="hidden" id="atendente" name="atendente" value="<?php echo $_SESSION['idusuario']; ?>">

              <div class="form-group mt-2" style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                <button type="submit" class="btn btn-primary btn-block mb-3" style="width:25%;"> Salvar </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Fim Modal -->

    <!-- Inicio Modal Pedido -->
    <div class="modal fade text-dark" id="ModalNovoPedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Nova Comanda</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form action="registro-comanda.php" method="POST">

              <label>Mesa</label>
              <select name="mesa" id="mesa" class="form-control">
                <?php while ($mesas = mysqli_fetch_assoc($result_mesas)) { ?>
                  <option value="<?php echo $mesas['idmesa']; ?>"><?php echo $mesas['idmesa']; ?></option>
                <?php } ?>
              </select>

              <label>Cliente</label>
              <select name="cliente" id="cliente" class="form-control">
                <?php while ($clientes = mysqli_fetch_assoc($result_clientes)) { ?>
                  <option value="<?php echo $clientes['idcliente']; ?>"><?php echo $clientes['nome']; ?></option>
                <?php } ?>
              </select>

              <input type="hidden" id="atendente" name="atendente" value="<?php echo $_SESSION['idusuario']; ?>">

              <div class="form-group mt-2" style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                <button type="submit" class="btn btn-primary btn-block mb-3" style="width:25%;"> Salvar </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Fim Modal -->

  </div>

  <!-- popup informativos -->
  <?php if (isset($_GET['sucesso'])) { ?>
    <script>
      Swal.fire({
        type: 'success',
        title: 'Feito!',
        text: 'Sucesso!!',
      })
    </script>
  <?php } elseif (isset($_GET['erro'])) { ?>
    <script>
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Erro, tente novamente',
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