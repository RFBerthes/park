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
                            <form action="registro-cliente.php" method="POST">
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
                                  <input type="text" id="placa" name="placa" required class="form-control" placeholder="Placa" maxlength="8">
                                </div>
                                <div class="form-group">
                                  <label>Marca</label>
                                  <select name="marca" id="marca" class="form-control">
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
                                <div class="form-group">
                                    <label>Modelo</label>
                                    <select name="modelo" id="modelo" class="form-control">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Cor</label>
                                    <select name="cor" id="cor" class="form-control">
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
              <td><?php echo $row['cliente']; ?></td>
              <td><?php echo $row['placa']; ?></td>
              <td><?php echo $row['marca']; ?></td>
              <td><?php echo $row['modelo']; ?></td>
              <td><?php echo $row['cor']; ?></td>
              <td>
                <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal" data-whatever="<?php echo $clientes['idcliente']; ?>" data-whatevernome="<?php echo $clientes['nome']; ?>" >Editar</button>
                <a href="apagar-cliente.php?idcliente=<?php echo $clientes['idcliente']; ?>"><button type="button"
                    class="btn btn-xs btn-danger">Apagar</button></a>
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
              <h4 class="modal-title text-dark" id="editModalLabel">Editar Cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="edita-cliente.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" id=recepient-nome name=nome required class="form-control" placeholder="Nome">
                  </div>
                <input type="hidden" id="recepient-idcliente" name="idcliente">
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

        <!-- Modal JavaScript -->
        <script type="text/javascript">
        $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientnome = button.data('whatevernome')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID do Cliente: ' + recipient)
        modal.find('#recepient-idcliente').val(recipient)
        modal.find('#recipient-name').val(recipientnome)
    })
  </script>
    </body>

    </html>