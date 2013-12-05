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
      <div class="row">
        <div class="col-md-6">
          <a class="btn btn-default btn-primary btn-block" href="/voluntario/cadastrar.php" role="button">Cadastrar &raquo;</a>
        </div>
        <div class="col-md-6">
          <a class="btn btn-default btn-success btn-block" href="/voluntario/visualizar.php" role="button">Visualizar &raquo;</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <h2>Atividades</h2>
      <p>Registre aqui as atividades promovidas pela Cruz Vermelha Brasileira.</p>
      <div class="row">
        <div class="col-md-6">
          <a class="btn btn-default btn-primary btn-block" href="/atividade/cadastrar.php" role="button">Cadastrar &raquo;</a>
        </div>
        <div class="col-md-6">
          <a class="btn btn-default btn-success btn-block" href="/atividade/visualizar.php" role="button">Visualizar &raquo;</a>
        </div>
      </div>
   </div>
    <div class="col-md-4">
      <h2>Estatísticas</h2>
      <p>Acesse estatísticas e relatórios sobre os dados de voluntários e atividades cadastrados no sistema.</p>
      <p><a class="btn btn-default btn-warning btn-block" href="/estatisticas.php" role="button">Acessar &raquo;</a></p>
    </div>
  </div>

  <hr>

  <footer>
    <!-- <p>&copy; Company 2013</p> -->
  </footer>
</div> 

<?php require "layout/layoutBottom.php" ; ?>