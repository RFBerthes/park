<?php
  session_start();
  include('database_functions.php');

  $pdo = connect_to_database("park");

  $sql1 = "SELECT * FROM usuarios";
  // $sql2 = "SELECT * FROM clientes";
  $usuarios = $pdo->query($sql1);
  // $clientes = $pdo->query($sql2);

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php require_once "header-admin.php" ?>
  </head>
  <body>
      <div class="container bg-dark text-white mt-2 mb-2">
      <div class="pull-right">
				<button type="button" class="btn btn-xs btn-success mt-2 mb-2" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
			</div>
			<!-- Inicio Modal -->
			<div class="modal fade text-dark" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Cadastrar Usuário</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
                <form action="insere-usuario.php" method="POST">
                  <div class="form-group">
                    <label>Perfil</label>
                    <select name="perfil" id="perfil" class="form-control">
                        <option value="admin">Administrador</option>
                        <option value="func" selected>Funcionário</option>
                    </select>
                  </div>
  
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" id=nome name=nome required class="form-control" placeholder="Nome">
                  </div>
 
                  <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" id="senha" name="senha" required placeholder="Senha" type="password" minlength="4">
                  </div>
          
                  <div class="form-group" style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                    <button type="submit" class="btn btn-primary btn-block mb-3" style="width:25%;"> Enviar </button>
                  </div>
                </form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim Modal -->
        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
              <h3 style="text-align:center">Usuários</h3>
              <table class="table bg-light table-striped" style="text-align:center">
                <thead>
                  <tr>
                    <th>Perfil</th>
                    <th>Nome</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($row = $usuarios->fetch()){ ?>
                    <tr>
                      <td><?php echo $row['perfil']; ?></td>
                      <td><?php echo $row['nome'];   ?></td>
                      <td>
                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['idusuario']; ?>"  data-whateverperfil="<?php echo $row['perfil']; ?>"  data-whatevernome="<?php echo $row['nome']; ?>" >Editar</button>
                        <a href="delete-usuario.php?idusuario=<?php echo $row['idusuario']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
               </table>
            </div>
          </div>
          <!-- Modal Edit -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-dark" id="exampleModalLabel">Editar Usuário</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="edit-usuario.php" enctype="multipart/form-data">
                
                      <div class="form-group">
                        <label>Perfil</label>
                        <select name="perfil" id="perfil" class="form-control">
                            <option value="admin">Administrador</option>
                            <option value="func" selected>Funcionário</option>
                        </select>
                      </div>
      
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" id=nome name=nome required class="form-control" placeholder="Nome">
                      </div>
     
                      <div class="form-group">
                        <label>Senha</label>
                        <input class="form-control" id="senha" name="senha" required placeholder="Senha" type="password" minlength="4">
                      </div>
              
                      <input type="hidden" id="recepient-idusuario" name="idusuario">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Alterar</button>
                      </div>
                    </form>
                  </div>			  
                </div>
              </div>
            </div>
      </div>

      <!-- popup informativos -->
      <?php if (isset($_GET['sucesso1'])) { ?>
        <script>
          Swal.fire({
            type: 'success',
            title: 'Feito!',
            text: 'Usuário cadastrado com sucesso!!',
          })
        </script>
      <?php }elseif (isset($_GET['erro1'])) { ?>
        <script>
            Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Usuário já existe, tente novamente',
          })
        </script>
      <?php }elseif (isset($_GET['sucesso2'])) { ?>
        <script>
          Swal.fire({
            type: 'success',
            title: 'Feito!',
            text: 'Usuário editado com sucesso!!',
          })
        </script>
      <?php }elseif (isset($_GET['erro2'])) { ?>
        <script>
            Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Usuário não foi editado, tente novamente',
          })
        </script>
        <?php }elseif (isset($_GET['sucesso3'])) { ?>
        <script>
          Swal.fire({
            type: 'success',
            title: 'Feito',
            text: 'Usuário excluído com sucesso!!',
          })
        </script>
      <?php }elseif (isset($_GET['erro3'])) { ?>
        <script>
            Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Usuário não foi excluído, tente novamente',
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
        $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var recipientperfil = button.data('whateverperfil')
          var recipientnome = button.data('whatevernome')
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('ID do Usuario: ' + recipient)
          modal.find('#recepient-idusuario').val(recipient)
          modal.find('#recipient-perfil').val(recipientperfil)
          modal.find('#recipient-name').val(recipientnome)
        })
      </script>
  </body>
</html>

