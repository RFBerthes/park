<?php
  session_start();
  include('database_functions.php');

  $pdo = connect_to_database("park");

  $sql1 = "SELECT * FROM veiculos";
  $sql2 = "SELECT * FROM clientes";
  $veiculos = $pdo->query($sql1);
  $clientes = $pdo->query($sql2);

?>
    <!doctype html>
    <html lang="pt-br">

    <head>
        <?php require_once "header-admin.php" ?>
    </head>

    <body>
        <div class="container bg-dark text-white mt-2 mb-2 pb-2">

            <div class="pull-right">
                <button type="button" class="btn btn-xs btn-success mt-2 mb-2" data-toggle="modal" data-target="#ModalNovoVeic">Novo Veículo</button>
            </div>

            <!-- Inicio Modal Veiculo -->
            <div class="modal fade text-dark" id="ModalNovoVeic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Cadastrar Veículo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="insere-veiculo.php" method="POST">
                                <div class="form-group">
                                  <label>Cliente</label>
                                  <select name="cliente" id="cliente" class="form-control">
                                    <?php while ($row = $clientes->fetch()) { ?>
                                      <option value="<?php echo $row['idclientes']; ?>"><?php echo $row['nome']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Placa</label>
                                  <input type="text" id="placa" name="placa" required class="form-control" placeholder="Placa" maxlength="7">
                                </div>
                                <div class="form-group">
                                  <label>Marca</label>
                                  <select name="marca" id="marca" class="form-control">
                                        <option value="CHEVROLET">CHEVROLET</option>
                                        <option value="FIAT">FIAT</option>
                                        <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                                        <option value="FORD">FORD</option>
                                        <option value="RENAULT">RENAULT</option>
                                        <option value="HYUNDAI">HYUNDAI</option>
                                        <option value="TOYOTA">TOYOTA</option>
                                        <option value="HONDA">HONDA</option>
                                        <option value="CITROËN">CITROËN</option>
                                        <option value="AUDI">AUDI</option>
                                        <option value="PEUGEOT">PEUGEOT</option>
                                        <option value="NISSAN">NISSAN</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label>Modelo</label>
                                    <input type="trext" name="modelo" id="modelo" class="form-control">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Cor</label>
                                    <select name="cor" id="cor" class="form-control">
                                      <option value="Branco">Branco</option>
                                      <option value="Prata">Prata</option>
                                      <option value="Preto">Preto</option>
                                      <option value="Azul">Azul</option>
                                      <option value="Vermelho">Vermelho</option>
                                      <option value="Amarelo">Amarelo</option>
                                      <option value="Marrom">Marrom</option>
                                      <option value="Verde">Verde</option>
                                      <option value="Bordô">Bordô</option>
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
        <h3 style="text-align:center">VEÍCULOS</h3>
        <table class="table bg-light table-striped" style="text-align:center">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Placa</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Cor</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $veiculos->fetch()){ ?>
            <tr>
              <td><?php echo $row['clientes_idclientes']; ?></td>
              <td><?php echo $row['placa']; ?></td>
              <td><?php echo $row['marca']; ?></td>
              <td><?php echo $row['modelo']; ?></td>
              <td><?php echo $row['cor']; ?></td>
              <td>
                <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal" data-whatever="<?php echo $row['placa']; ?>" >Editar</button>
                <a href="delete-veic.php?placa=<?php echo $row['placa']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Fim Table -->

    <!-- Inicio editModal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-dark" id="editModalLabel">Editar Veículo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="edit-veic.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Cliente</label>
                    <select name="cliente" id="cliente" class="form-control">
                      <?php while ($row = $clientes->fetch()) { ?>
                        <option value="<?php echo $row['idcliente']; ?>"><?php echo $row['nome']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Placa</label>
                    <input type="text" id="placa" name="placa" required class="form-control" placeholder="Placa" maxlength="7">
                  </div>
                  <div class="form-group">
                    <label>Marca</label>
                    <select name="marca" id="marca" class="form-control">
                          <option value="CHEVROLET">CHEVROLET</option>
                          <option value="FIAT">FIAT</option>
                          <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                          <option value="FORD">FORD</option>
                          <option value="RENAULT">RENAULT</option>
                          <option value="HYUNDAI">HYUNDAI</option>
                          <option value="TOYOTA">TOYOTA</option>
                          <option value="HONDA">HONDA</option>
                          <option value="CITROËN">CITROËN</option>
                          <option value="AUDI">AUDI</option>
                          <option value="PEUGEOT">PEUGEOT</option>
                          <option value="NISSAN">NISSAN</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label>Modelo</label>
                      <input type="trext" name="modelo" id="modelo" class="form-control">

                      </select>
                  </div>
                  <div class="form-group">
                      <label>Cor</label>
                      <select name="cor" id="cor" class="form-control">
                        <option value="Branco">Branco</option>
                        <option value="Prata">Prata</option>
                        <option value="Preto">Preto</option>
                        <option value="Azul">Azul</option>
                        <option value="Vermelho">Vermelho</option>
                        <option value="Amarelo">Amarelo</option>
                        <option value="Marrom">Marrom</option>
                        <option value="Verde">Verde</option>
                        <option value="Bordô">Bordô</option>
                      </select>
                  </div>

                  <input type="hidden" id="recepient-idcliente" name="placa">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Alterar</button>
                  </div>
              </form>
            </div>			  
          </div>
        </div>
      </div>
      <!-- Fim ModalExcluir -->


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
          <?php }elseif (isset($_GET['erro'])) { ?>
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

        <!-- Modal JavaScript -->
        <script type="text/javascript">
        $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Placa do Veículo: ' + recipient)
        modal.find('#recepient-placa').val(recipient)

    })
  </script>
    </body>

    </html>