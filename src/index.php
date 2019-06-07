<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <title>Park&Lave</title>


  </head>
  <body>
      <div class="container bg-dark text-white mt-2 mb-2" style="width:500px">
        <div class="card card-signin my-5 text-white bg-dark">
          <div class="card-body">
            <h5 class="card-title text-center">Bem vindo ao Park&Lave</h5>
            <h5 class="card-title text-center">Identifique-se</h5>
              <form action="login.php" method="post" class="form-signin">
                <div class="form-label-group">
                  <!-- <label for="usuario">Usuário</label> -->
                  <input type="text" name="nome" id="nome" class="form-control mb-3" placeholder="Usuário" required autofocus>
                </div>
                <div class="form-label-group">
                  <!-- <label for="senha">Senha</label> -->
                  <input type="password" name="senha" id="senha" class="form-control mb-3" placeholder="Senha" required>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Lembrar de mim</label>
                </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase my-2" type="submit">ENTRAR</button>
              </form>
              <?php if (isset($_GET['erro'])) { ?>
                <script>
                  Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Usuário ou senha inválidos!!',
                    // footer: 'Tente novamente'
                  })
                </script>
                <!-- <div class="alert alert-danger" role="alert" style="text-align:center">
                  <strong>Ops..Usuário ou senha inválidos</strong>
                </div> -->
              <?php }elseif (isset($_GET['erro'])) { ?>
                <script>
                    Swal.fire({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Usuário cadastrado com função inválida, procure o adminstrador!',
                      // footer: 'Tente novamente'
                    })
                </script>

              <?php } ?>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>