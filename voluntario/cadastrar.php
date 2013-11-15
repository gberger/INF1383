<?php require "../layout/layoutTop.php" ; ?>

<?php
	$handlerReturn = FormHelper::handleVolunteerForm();
?>

<?php if($handlerReturn === true && isset($_POST['VolunteerForm'])): ?>
	<div class="alert alert-success">
		Voluntário cadastrado com sucesso
	</div>
<?php elseif(is_array($handlerReturn)): ?>
	<div class="alert alert-danger">
		Ocorreu um erro ao cadastrar o voluntário, por favor verifique os dados digitados	
	</div>
<?php endif; ?>


<div class="jumbotron-wrapper">
	<h3 class="title">Cadastrar Voluntário</h3>
	<div class="jumbotron">
		<form method="POST" class="form-horizontal">

			<div class="control-group">
				<label class="control-label" for="inputCpf">CPF</label>
				<div class="controls">
					<input class="input-large" type="text" id="inputCpf" name="VolunteerForm[cpf]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputNome">Nome</label>
				<div class="controls">
					<input class="input-xxlarge" type="text" id="inputNome" name="VolunteerForm[nome]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputNomeMae">Nome da Mãe</label>
				<div class="controls">
					<input class="input-xxlarge" type="text" id="inputNomeMae" name="VolunteerForm[nome_mae]">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputNomePai">Nome do Pai</label>
				<div class="controls">
					<input class="input-xxlarge" type="text" id="inputNomePai" name="VolunteerForm[nome_pai]">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputEndereco">Endereço</label>
				<div class="controls">
					<textarea class="input-xxlarge" id="inputEndereco" name="VolunteerForm[endereco]" required></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputRg">RG</label>
				<div class="controls">
					<input class="input-large" type="text" id="inputRg" name="VolunteerForm[num_rg]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputEmissorRg">Órgão Emissor RG</label>
				<div class="controls">
					<select class="input-xxlarge" id="inputEmissorRg" name="VolunteerForm[sigla_emissor]" required>
						<?php
							$emissores = CadVolHelper::obterEmissoresRG();
							foreach($emissores as $sigla=>$nome)
								echo "<option value=\"$sigla\">$sigla - $nome</option>";
						?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputNaturalidade">Naturalidade</label>
				<div class="controls">
					<input class="input-xlarge" type="text" id="inputNaturalidade" name="VolunteerForm[naturalidade]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputEstCivil">Estado Civil</label>
				<div class="controls">
					<select class="input-large" id="inputEmissorRg" name="VolunteerForm[est_civil]" required>
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
					<select class="input-large" id="inputSexo" name="VolunteerForm[sexo]" required>
						<option value="M">Masculino</option>
						<option value="F">Feminino</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputProfissao">Profissão</label>
				<div class="controls">
					<input class="input-xlarge" type="text" id="inputProfissao" name="VolunteerForm[profissao]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputEmail">E-mail</label>
				<div class="controls">
					<input class="input-xlarge" type="text" id="inputEmail" name="VolunteerForm[email]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputTipoSangue">Tipo sanguíneo</label>
				<div class="controls">
					<select class="input-small" id="inputTipoSangue" name="VolunteerForm[tipo_sangue]" required>
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
					<select class="input-medium" id="inputTipoCNH" name="VolunteerForm[tipo_cnh]">
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
					<input class="input-large" type="text" id="inputTel1" name="VolunteerForm[tel1]" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputTel2">Telefone 2</label>
				<div class="controls">
					<input class="input-large" type="text" id="inputTel2" name="VolunteerForm[tel2]">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputFormacao">Formação</label>
				<div class="controls">
					<select class="input-large" id="inputFormacao" name="VolunteerForm[formacao]">
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
					<textarea class="input-xxlarge" id="inputObs" name="VolunteerForm[obs]"></textarea>
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
	<?php if($handlerReturn !== true): ?>
		var attributes = <?php echo json_encode($handlerReturn); ?>

		jQuery.each(attributes, function(i, value) {
			$('[name="VolunteerForm['+i+']"]').val(value);
		});		
	<?php endif; ?>
</script>

<?php require "../layout/layoutBottom.php" ; ?>