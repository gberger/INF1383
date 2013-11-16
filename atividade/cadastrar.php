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


<div class="jumbotron-wrapper">
	<h3 class="title"><?php echo (!isset($_GET['codigo'])) ? 'Cadastrar' : 'Editar'; ?> Atividade</h3>
	<div class="jumbotron">
		<form method="POST" class="form-horizontal">

			<input type="hidden" name="newRecord" value="<?php echo (int)(!isset($_GET['codigo'])); ?>">

			<div class="control-group">
				<label class="control-label" for="inputFilial">Filial</label>
				<div class="controls">
					<select class="input-xlarge" id="inputFilial" name="ActivityForm[cod_filial]" required>
						<?php
							$filiais = CadVolHelper::obterFiliais();
							foreach($filiais as $est=>$nome)
								echo "<option value=\"$est\">$nome</option>";
						?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputResp">Responsável</label>
				<div class="controls">
					<select class="input-xlarge" id="inputResp" name="ActivityForm[cpf_responsavel]">
						<option value="">(não há)</option>
						<?php
							$funcionarios = CadVolHelper::obterFuncionariosParaDropdown();
							foreach($funcionarios as $matr=>$nome)
								echo "<option value=\"$matr\">$nome</option>";
						?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputNome">Nome</label>
				<div class="controls">
					<input class="input-xlarge" type="text" id="inputNome" name="ActivityForm[nome]" required>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label" for="inputData">Data</label>
				<div class="controls">
					<input class="input-medium" type="text" id="inputData" name="ActivityForm[data]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputEndereco">Endereço</label>
				<div class="controls">
					<textarea class="input-xxlarge" id="inputEndereco" name="ActivityForm[endereco]" required></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputEndereco">Descrição</label>
				<div class="controls">
					<textarea class="input-xxlarge" id="inputEndereco" name="ActivityForm[descricao]" required></textarea>
				</div>
			</div>

			
			<br>
			<button type="submit" class="btn btn-success btn-submit">
				Enviar
			</button>
		</form>
	</div>
</div>

<script>
	$("#inputData").mask("99/99/9999");

	<?php if(is_array($handlerReturn)): ?>
		var attributes = <?php echo json_encode($handlerReturn); ?>

		jQuery.each(attributes, function(i, value) {
			$('[name="ActivityForm['+i+']"]').val(value);
		});		
	<?php endif; ?>
</script>

<?php require "../layout/layoutBottom.php" ; ?>