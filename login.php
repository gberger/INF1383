<?php
    require_once "CadVolHelper.class.php";


    $loginError = CadVolHelper::handleLogin( );
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Sistema CadVol</title>

    <!-- Bootstrap core CSS -->
    <link href="/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/dist/css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <img id="logo" src="/dist/img/logocvb.jpg"/>

      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Sistema CadVol</h2>
        <input type="text" name="username" class="form-control" placeholder="Nome de usuário" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Senha" required>
        <?php if($loginError): ?>
          <span style="color: #d00;">Usuário/senha inválidos</span>
        <?php endif; ?>
        <label class="checkbox">
          <input type="checkbox" name="rememberMe" value="remember-me"> Mantenha-me conectado
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
