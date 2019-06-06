<?php
  session_start();
  include('database_functions.php');

  $pdo = connect_to_database("park");

  $sql2 = "SELECT * FROM clientes";
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
                <button type="button" class="btn btn-xs btn-success mt-2 mb-2" data-toggle="modal" data-target="#ModalNovoCli">Novo Cliente</button>
            </div>

            <!-- Inicio Modal Cliente -->
            <div class="modal fade text-dark" id="ModalNovoCli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Cadastrar Cliente</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="insere-cliente.php" method="POST">
                                <div class="form-group">
                                  <label>Nome</label>
                                  <input type="text" id="nome" name="nome" required class="form-control" placeholder="Nome" >
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
        <h3 style="text-align:center">CLIENTES</h3>
        <table class="table bg-light table-striped" style="text-align:center">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $clientes->fetch()){ ?>
            <tr>
              <td><?php echo $row['nome']; ?></td>
              <td>
                <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal" data-whatever="<?php echo $row['idcliente']; ?>" data-whatevernome="<?php echo $row['nome']; ?>" >Editar</button>
                <a href="delete-cliente.php?idcliente=<?php echo $row['idcliente']; ?>"><button type="button"
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
              <form method="POST" action="edit-cliente.php" enctype="multipart/form-data">
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