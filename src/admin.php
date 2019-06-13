<!doctype html>
<html lang="pt-br">
<head>
  <?php require_once "header-admin.php" ?>
  <?php include('database_functions.php');
  session_start();
  if ((!isset($_SESSION['nome']) == true)) {
    unset($_SESSION['nome']);
    header('location:index.php');
  }
  $login =  $_SESSION['nome'];

  $pdo = connect_to_database("park");

  $sql1 = "SELECT idcliente, nome, placa, modelo, cor  FROM veiculos JOIN clientes ON clientes.idcliente = veiculos.clientes_idcliente";
  $sql2 = "SELECT * FROM registros JOIN veiculos ON veiculos.placa = registros.veiculos_placa";
  $veiculos = $pdo->query($sql1);
  $registros = $pdo->query($sql2);


  ?>
  

</head>

  <body>
    <div class="container bg-dark text-white mt-2 mb-2 pb-2">
    
    <?php
      echo $login;
    ?>

      <div class="pull-right">
        <button type="button" class="btn btn-xs btn-success mt-2 mb-2" data-toggle="modal" data-target="#ModalNovoReg">Novo Registro</button>
      </div>
      <!-- Inicio Modal Registro -->
      <div class="modal fade text-dark" id="ModalNovoReg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Registo de Entrada</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="insere-registro.php" method="POST">
                <div class="form-group">
                  <label>Veículo</label>
                  <select name="placa" id="placa" class="form-control">
                    <?php while ($row = $veiculos->fetch()) { ?>
                      <option value="<?php echo $row['placa']; ?>"><?php echo $row['placa']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group" style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                  <button type="submit" class="btn btn-primary btn-block mb-3" style="width:25%;"> Salvar </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Fim Modal -->

      <!-- Início Table -->
      <div class="table-responsive-sm ">
        <div class="col-md-12">
          <h3 style="text-align:center">REGISTROS</h3>
          <table class="table bg-light table-striped" style="text-align:center">
            <thead>
              <tr>
                <th>Nº</th>
                <th>Veiculo</th>
                <th>Entrada/Saídas</th>
                <th>Valor (R$)</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($rowReg = $registros->fetch()) { ?>
                <tr>
                  <td class="align-middle"><?php echo $rowReg['idregistro']; ?></td>
                  <td class="align-middle"><?php echo $rowReg['placa'];
                                            echo "<br>";
                                            echo $rowReg['marca'];
                                            echo "<br>";
                                            echo $rowReg['modelo'];
                                            echo "<br>";
                                            echo $rowReg['cor']; ?></td>
                  <td class="align-middle"><?php echo $rowReg['entrada'];
                                            echo "<br>";
                                            echo $rowReg['saida'];
                                            ?></td>
                  <td class="align-middle"><?php echo $rowReg['valor']; ?></td>
                  <td class="align-middle">
                    <a href="insere-saida.php?placa=<?php echo $rowReg['placa']; ?>"><button type="button" class="btn btn-xs btn-primary"> <img src="open-iconic/png/clock-2x.png"> </button></a>
                    <a href="delete-veic.php?placa=<?php echo $rowReg['placa']; ?>"><button type="button" class="btn btn-xs btn-warning"> <img src="open-iconic/png/give-money.png"> </button></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Fim Table -->

    </div>

    <!-- popup informativos -->
    <?php if (isset($_GET['sucesso'])) { ?>
      <script>
        Swal.fire({
          type: 'success',
          title: 'Sucesso!',
          text: 'Ação Concluída!!',
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