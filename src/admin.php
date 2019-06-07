<?php
  include('database_functions.php');
  session_start();
  if((!isset ($_SESSION['nome']) == true)){
    unset($_SESSION['nome']);
    header('location:index.php');
  }
  $login =  $_SESSION['nome'];
  

  $pdo = connect_to_database("park");



?>
<!doctype html>
<html lang="pt-br">

<head>
  <?php require_once "header-admin.php" ?>
  <script>
  </script>
</head>

<body class="bg-dark text-white">
<?php
  echo $login;
?>
<i class="fas fa-user-edit"></i>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>