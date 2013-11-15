<?php require "../layout/layoutTop.php" ; ?>

<?php
	$handlerReturn = FormHelper::handleActivityForm();
?>

<?php if($handlerReturn === true && isset($_POST['ActivityForm'])): ?>
	<div class="alert alert-success">
		Atividade <?php echo (is_array($handlerReturn) && !isset($_GET['cpf'])) ? 'cadastrada' : 'editada'; ?> com sucesso
	</div>
<?php elseif (is_array($handlerReturn) && isset($_POST['ActivityForm'])): ?>
	<div class="alert alert-danger">
		Ocorreu um erro ao cadastrar a atividade, por favor verifique os dados digitados	
	</div>
<?php endif; ?>


<div class="jumbotron-wrapper">
	<h3 class="title"><?php echo (is_array($handlerReturn) && !isset($_GET['cpf'])) ? 'Cadastrar' : 'Editar'; ?> Atividade</h3>
	<div class="jumbotron">
		<form method="POST" class="form-horizontal">

			<input type="hidden" name="newRecord" value="<?php echo (int)(!isset($_GET['cpf'])); ?>">

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
				<label class="control-label" for="inputResp">Filial</label>
				<div class="controls">
					<select class="input-xlarge" id="inputResp" name="ActivityForm[matr_responsavel]">
						<option value="">(não há)</option>
						<?php
							$funcionarios = CadVolHelper::obterFuncionarios();
							foreach($funcionarios as $matr=>$nome)
								echo "<option value=\"$matr\">$nome</option>";
						?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputCpf">CPF</label>
				<div class="controls">
					<input class="input-large" type="text" id="inputCpf" name="ActivityForm[cpf]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputNome">Nome</label>
				<div class="controls">
					<input class="input-xxlarge" type="text" id="inputNome" name="ActivityForm[nome]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputNomeMae">Nome da Mãe</label>
				<div class="controls">
					<input class="input-xxlarge" type="text" id="inputNomeMae" name="ActivityForm[nome_mae]">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputNomePai">Nome do Pai</label>
				<div class="controls">
					<input class="input-xxlarge" type="text" id="inputNomePai" name="ActivityForm[nome_pai]">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputEndereco">Endereço</label>
				<div class="controls">
					<textarea class="input-xxlarge" id="inputEndereco" name="ActivityForm[endereco]" required></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputRg">RG</label>
				<div class="controls">
					<input class="input-large" type="text" id="inputRg" name="ActivityForm[num_rg]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputNaturalidade">Naturalidade</label>
				<div class="controls">
					<input class="input-xlarge" type="text" id="inputNaturalidade" name="ActivityForm[naturalidade]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputEstCivil">Estado Civil</label>
				<div class="controls">
					<select class="input-large" id="inputEmissorRg" name="ActivityForm[est_civil]" required>
						<option value="solteiro">Solteiro(a)</option>
						<option value="casado">Casado(a)</option>
						<option value="viuvo">Viúvo(a)</option>
						<option value="divorciado">Divorciado(a)</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputSexo">Sexo</label>
				<div class="controls">
					<select class="input-large" id="inputSexo" name="ActivityForm[sexo]" required>
						<option value="M">Masculino</option>
						<option value="F">Feminino</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputProfissao">Profissão</label>
				<div class="controls">
					<input class="input-xlarge" type="text" id="inputProfissao" name="ActivityForm[profissao]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputEmail">E-mail</label>
				<div class="controls">
					<input class="input-xlarge" type="email" id="inputEmail" name="ActivityForm[email]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputTipoSangue">Tipo sanguíneo</label>
				<div class="controls">
					<select class="input-small" id="inputTipoSangue" name="ActivityForm[tipo_sangue]" required>
						<?php
							$tipos = array('A+','A-','B+','B-','AB+','AB-','O+','O-');
							foreach($tipos as $tipo)
								echo "<option value=\"$tipo\">$tipo</option>";
						?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputTipoCNH">Tipo CNH</label>
				<div class="controls">
					<select class="input-medium" id="inputTipoCNH" name="ActivityForm[tipo_cnh]">
						<option value="">(não possui)</option>
						<?php
							$tipos = array('A','B','C','D','E','AB','AC','AD','AE');
							foreach($tipos as $tipo)
								echo "<option value=\"$tipo\">$tipo</option>";
						?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputTel1">Telefone 1</label>
				<div class="controls">
					<input class="input-large" type="text" id="inputTel1" name="ActivityForm[tel1]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputTel2">Telefone 2</label>
				<div class="controls">
					<input class="input-large" type="text" id="inputTel2" name="ActivityForm[tel2]">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputFormacao">Formação</label>
				<div class="controls">
					<select class="input-large" id="inputFormacao" name="ActivityForm[formacao]">
						<?php
							$tipos = array('fundamental incompleto', 'fundamental completo', 'médio incompleto', 'médio completo', 'superior incompleto','superior completo');
							foreach($tipos as $tipo)
								echo "<option value=\"$tipo\">$tipo</option>";
						?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputObs">Observações</label>
				<div class="controls">
					<textarea class="input-xxlarge" id="inputObs" name="ActivityForm[obs]"></textarea>
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
	<?php if(is_array($handlerReturn)): ?>
		var attributes = <?php echo json_encode($handlerReturn); ?>

		jQuery.each(attributes, function(i, value) {
			$('[name="ActivityForm['+i+']"]').val(value);
		});		
	<?php endif; ?>
</script>

<?php require "../layout/layoutBottom.php" ; ?>