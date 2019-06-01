<?php
  include_once("conexao.php");
    // puxar produtos do banco
    $consulta = "SELECT * FROM `mesas`";
    $result = mysqli_query($conexao, $consulta) or die ($conexao->error);
?>
  
<!doctype html>
<html lang="pt-br">
  <head>
    <?php require_once "header-admin.php" ?>
  </head>
  <body>

      <div class="container bg-dark text-white mt-2 pb-3 pl-3" id="conteudoDinamico">
      
        <a href="registro-mesa.php?idmesa=1"><button type="button" class="btn btn-xs btn-primary mt-3">Adicionar Mesa</button></a>
      
        <div class="row pl-3" id="mesas" >


        <?php while($mesas = mysqli_fetch_assoc($result)){ ?>
          <div class="card text-dark mt-2 mr-2" id="cadr_@VALOR@" style="width:15%" >
              <div class="card-body ">
                <h5 class="card-title" >Mesa nº <?php echo $mesas['idmesa']; ?></h5>
                <p class="card-text">Garçom: ?</p>
                <a href="apagar-mesa.php?idmesa=<?php echo $mesas['idmesa']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
              </div> 
            </div>          
        <?php } ?>



        </div>
      </div>
      

    <?php if (isset($_GET['sucesso1'])) { ?>
      <script>
        Swal.fire({
          type: 'success',
          title: 'Feito',
          text: 'Mesa Adicionada com sucesso!!',
        })
      </script>
    <?php }elseif (isset($_GET['erro1'])) { ?>
      <script>
          Swal.fire({
          type: 'error',
          title: 'Oops...',
          text: 'Mesa não adicionada, tente novamente',
        })
      </script>
    <?php }elseif (isset($_GET['sucesso3'])) { ?>
      <script>
        Swal.fire({
          type: 'success',
          title: 'Feito',
          text: 'Mesa excluída com sucesso!!',
        })
      </script>
    <?php }elseif (isset($_GET['erro3'])) { ?>
      <script>
          Swal.fire({
          type: 'error',
          title: 'Oops...',
          text: 'Mesa não foi excluída, tente novamente',
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


<!-- Inclusão de mesa v1 php-->
  <!-- include('conexao.php');
  $addMesa = "INSERT INTO 'mesa' ('idmesa') VALUES (NULL);";

  //Insere novo registro
  $result = mysqli_query($conexao, $addMesa);
  $mesas = $result->fetch_assoc();
  echo '$mesas['idmesa']';
  exit; -->

