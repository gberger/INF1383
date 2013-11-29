<?php require "../layout/layoutTop.php" ; ?>

<?php
	$handlerReturn = FormHelper::handleActivityForm();
?>

<?php if($handlerReturn === true && isset($_POST['ActivityForm'])): ?>
	<div class="alert alert-success">
		Atividade <?php echo (!isset($_GET['codigo'])) ? 'cadastrada' : 'editada'; ?> com sucesso
	</div>
<?php elseif (is_array($handlerReturn) && isset($_POST['ActivityForm'])): ?>
	<div class="alert alert-danger">
		Ocorreu um erro ao cadastrar a atividade, por favor verifique os dados digitados	
	</div>
<?php endif; ?>

<div class="well">
	<form class="form-horizontal" role="form" method="POST">

    <input type="hidden" name="newRecord" value="<?php echo isset($_GET['codigo']) ? $_GET['codigo'] : 0; ?>">

		<div class="form-group">
			<label for="inputFilial" class="col-sm-2 control-label">Filial</label>
			<div class="col-sm-10">
				<select name="ActivityForm[cod_filial]" id="inputFilial" class="form-control" required>
            <?php
              $filiais = CadVolHelper::obterFiliais();
              foreach($filiais as $est=>$nome)
                echo "<option value='$est'>$nome</option>";
            ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="inputResponsavel" class="col-sm-2 control-label">Responsavel</label>
			<div class="col-sm-10">
				<select name="ActivityForm[cpf_responsavel]" id="inputResponsavel" class="form-control" required>
            <option value="">(não há)</option>
            <?php
              $funcionarios = CadVolHelper::obterFuncionariosParaDropdown();
              foreach($funcionarios as $matr=>$nome)
                echo "<option value='$matr'>$nome</option>";
            ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="inputNome" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputNome" name="ActivityForm[nome]" required>
			</div>
		</div>

		<div class="form-group">
			<label for="inputData" class="col-sm-2 control-label">Data</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="inputData" name="ActivityForm[data]" required>
			</div>
		</div>

		<div class="form-group">
			<label for="inputEndereco" class="col-sm-2 control-label">Endereço</label>
			<div class="col-sm-10">
         <textarea class="form-control" id="inputEndereco" name="ActivityForm[endereco]" required></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="inputDescricao" class="col-sm-2 control-label">Descriçao</label>
			<div class="col-sm-10">
         <textarea class="form-control" id="inputDescricao" name="ActivityForm[descricao]" required></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-success">Enviar</button>
			</div>
		</div>

	</form>
</div>

<script>
	<?php if(is_array($handlerReturn)): ?>
		var attributes = <?php echo json_encode($handlerReturn); ?>

		jQuery.each(attributes, function(i, value) {
			$('[name="ActivityForm['+i+']"]').val(value);
		});		
	<?php endif; ?>
</script>

<?php require "../layout/layoutBottom.php" ; ?>