<?php
    require_once "CadVolHelper.class.php";

    if(!CadVolHelper::handleLogin( ) === false){
      CadVolHelper::addAlert('Usu&aacute;rio ou senha inv&aacute;lidos.', 'danger');
    }
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

    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.css" rel="stylesheet">

    <script src="/assets/js/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
      }

      div.container {
        margin-top: 80px;
      }
    </style>
  </head>

  <body>

    <div class="container">
      
      <div id="alerts"></div>
  
      <div class="row">
        
        <div class="col-md-4">
          <img id="logo" src="/assets/img/logocvb.jpg"/>
        </div>

        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Entre com suas credenciais</h3>
            </div>

            <div class="panel-body">
              <form role="form" method="POST">
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" type="text" name="username" placeholder="Nome de usu&aacute;rio" required autofocus>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input name="rememberMe" type="checkbox" value="remember-me"> Mantenha-me conectado
                    </label>
                  </div>
                  <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                </fieldset>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  
  <?php require "layout/alerts.php" ; ?>
  </body>
</html>
