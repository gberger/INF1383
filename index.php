<?php require "layout/layoutTop.php" ; ?>

<div class="well">
    <h1>Sistema de Cadastro de Voluntários da Cruz Vermelha Brasileira</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, magni qui quisquam delectus natus ad quibusdam reiciendis corporis cupiditate molestias illo nulla atque repudiandae commodi quaerat rem dolores nemo iusto?
    </p>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h2>Voluntários</h2>
      <p>Nesta área é possível cadastrar novos voluntários, além de visualizar e alterar os já cadastrados.</p>
      <p><a class="btn btn-default btn-primary" href="/voluntario/cadastrar.php" role="button">Cadastrar &raquo;</a></p>
      <p><a class="btn btn-default btn-success" href="/voluntario/visualizar.php" role="button">Visualizar &raquo;</a></p>
    </div>
    <div class="col-md-4">
      <h2>Atividades</h2>
      <p>Registre aqui as atividades promovidas pela Cruz Vermelha Brasileira.</p>
      <p><a class="btn btn-default btn-primary" href="/atividade/cadastrar.php" role="button">Cadastrar &raquo;</a></p>
      <p><a class="btn btn-default btn-success" href="/atividade/visualizar.php" role="button">Visualizar &raquo;</a></p>
   </div>
    <div class="col-md-4">
      <h2>Participações</h2>
      <p>Associe voluntários às atividades de que participou!</p>
      <p><a class="btn btn-default btn-primary" href="/participacao/cadastrar.php" role="button">Cadastrar &raquo;</a></p>
      <p><a class="btn btn-default btn-success" href="/participacao/visualizar.php" role="button">Visualizar &raquo;</a></p>
    </div>
  </div>

  <hr>

  <footer>
    <!-- <p>&copy; Company 2013</p> -->
  </footer>
</div> 

<?php require "layout/layoutBottom.php" ; ?>