<?php
	require_once dirname(__FILE__)."/../CadVolHelper.class.php";

	CadVolHelper::validateSession();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Sistema CadVol</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.css" rel="stylesheet">
    <link href="/assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/assets/css/chosen-bootstrap.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">

    <script src="/assets/js/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  	<div class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
		  <a class="navbar-brand" href="/"><i class="fa fa-lg fa-plus cruz-vermelha"></i> Sistema CadVol</a>
		</div>
		<div class="navbar-collapse collapse">
		  <ul class="nav navbar-nav">
		    <!-- <li class="active"><a href="#">Link</a></li> -->
		    <li class="dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Voluntários <b class="caret"></b></a>
		      <ul class="dropdown-menu">
		        <li><a href="/voluntario/cadastrar.php">Cadastrar</a></li>
		        <li><a href="/voluntario/visualizar.php">Visualizar</a></li>
		      </ul>
		    </li>
		    
		    <li class="dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades <b class="caret"></b></a>
		      <ul class="dropdown-menu">
		        <li><a href="/atividade/cadastrar.php">Cadastrar</a></li>
		        <li><a href="/atividade/visualizar.php">Visualizar</a></li>
		      </ul>
		    </li>
		  </ul>

		  <ul class="nav navbar-nav navbar-right">
		    <li><div style=" padding: 15px"><?php echo $_SESSION['funcionario']['nome'];?></div></li>
		    <li><a style="padding-left: 5px; padding-right: 5px;" href="#"><span class="glyphicon glyphicon-cog"></span></a></li>
		    <li><a href="/login.php?action=logout">Sair</a></li>
		</div>
    
	</div>
    

    <div class="container">
    
    <div id="alerts"></div>
      