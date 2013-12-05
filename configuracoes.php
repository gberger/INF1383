<?php require "layout/layoutTop.php" ; ?>

<?php
  $handlerReturn = FormHelper::handleConfigForm();
?>

<?php if($handlerReturn === true && isset($_POST['oldPassword'])): ?>
  <div class="alert alert-success">
    Dados alterados com sucesso.
  </div>
<?php elseif ($handlerReturn === false || (is_array($handlerReturn) && isset($_POST['oldPassword']))): ?>
  <div class="alert alert-danger">
    Ocorreu um erro, por favor verifique os dados digitados.
  </div>
<?php endif; ?>

<h3 class="title">Configurações de Usuário</h3>

<div class="well">
  <form method="POST" class="form-horizontal" role="form">

    <div class="form-group">
      <label class="col-sm-2 control-label" for="inputCpf">CPF</label>
      <div class="col-sm-6">
        <input class="form-control" type="text" id="inputCpf" value="<?php echo $_SESSION['funcionario']['cpf'] ?>" required disabled>
        <span class="help-block">Para mudar seu CPF e outros dados cadastrais, entre em contato com seu administrador.</span>
      </div>
    </div>

    <h4>Alterar Senha</h4>

    <div class="form-group">
      <label class="col-sm-2 control-label" for="oldPassword">Senha antiga</label>
      <div class="col-sm-6">
        <input class="form-control" type="password" id="oldPassword" name="oldPassword" value="" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label" for="newPassword">Nova senha</label>
      <div class="col-sm-6">
        <input class="form-control" type="password" id="newPassword" name="newPassword" value="" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label" for="newPassword2">Confirmar nova senha</label>
      <div class="col-sm-6">
        <input class="form-control" type="password" id="newPassword2" name="newPassword2" value="" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-2">
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
    </div>

  </form>
  </div>
</div>


<?php require "layout/layoutBottom.php" ; ?>