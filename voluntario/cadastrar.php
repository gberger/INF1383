<?php require "../layout/layoutTop.php" ; ?>

<?php
	$handlerReturn = FormHelper::handleVolunteerForm();
?>

<?php if($handlerReturn === true && isset($_POST['VolunteerForm'])): ?>
	<div class="alert alert-success">
		Voluntário <?php echo (!isset($_GET['cpf'])) ? 'cadastrado' : 'editado'; ?> com sucesso
	</div>
<?php elseif (is_array($handlerReturn) && isset($_POST['VolunteerForm'])): ?>
	<div class="alert alert-danger">
		Ocorreu um erro ao cadastrar o voluntário, por favor verifique os dados digitados	
	</div>
<?php endif; ?>

<h3 class="title"><?php echo (!isset($_GET['cpf'])) ? 'Cadastrar' : 'Editar'; ?> Voluntário</h3>

<div class="well">
	<form method="POST" class="form-horizontal" role="form">

		<input type="hidden" name="newRecord" value="<?php echo (int)(!isset($_GET['cpf'])); ?>">

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputCpf">CPF</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" id="inputCpf" name="VolunteerForm[cpf]" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputNome">Nome</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" id="inputNome" name="VolunteerForm[nome]" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputDataNasc">Data de Nascimento</label>
			<div class="col-sm-6">
				<input class="form-control" type="date" id="inputDataNasc" name="VolunteerForm[data_nasc]" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputNomeMae">Nome da Mãe</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" id="inputNomeMae" name="VolunteerForm[nome_mae]">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputNomePai">Nome do Pai</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" id="inputNomePai" name="VolunteerForm[nome_pai]">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputEndereco">Endereço</label>
			<div class="col-sm-6">
				<textarea class="form-control" id="inputEndereco" name="VolunteerForm[endereco]" required></textarea>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputRg">RG</label>
			<div class="col-sm-6">
				<input class="form-control" type="tel" id="inputRg" name="VolunteerForm[num_rg]" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputEmissorRg">Órgão Emissor RG</label>
			<div class="col-sm-6">
				<select class="form-control" id="inputEmissorRg" name="VolunteerForm[sigla_emissor]" required>
					<?php
						$emissores = CadVolHelper::obterEmissoresRG();
						foreach($emissores as $sigla=>$nome)
							echo "<option value=\"$sigla\">$sigla - $nome</option>";
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputNaturalidade">Naturalidade</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" id="inputNaturalidade" name="VolunteerForm[naturalidade]" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputEstCivil">Estado Civil</label>
			<div class="col-sm-6">
				<select class="form-control" id="inputEmissorRg" name="VolunteerForm[est_civil]" required>
					<option value="solteiro">Solteiro(a)</option>
					<option value="casado">Casado(a)</option>
					<option value="viuvo">Viúvo(a)</option>
					<option value="divorciado">Divorciado(a)</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputSexo">Sexo</label>
			<div class="col-sm-6">
				<select class="form-control" id="inputSexo" name="VolunteerForm[sexo]" required>
					<option value="M">Masculino</option>
					<option value="F">Feminino</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputProfissao">Profissão</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" id="inputProfissao" name="VolunteerForm[profissao]" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputEmail">E-mail</label>
			<div class="col-sm-6">
				<input class="form-control" type="email" id="inputEmail" name="VolunteerForm[email]" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputTipoSangue">Tipo sanguíneo</label>
			<div class="col-sm-6">
				<select class="form-control" id="inputTipoSangue" name="VolunteerForm[tipo_sangue]" required>
					<?php
						$tipos = array('A+','A-','B+','B-','AB+','AB-','O+','O-');
						foreach($tipos as $tipo)
							echo "<option value=\"$tipo\">$tipo</option>";
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputTipoCNH">Tipo CNH</label>
			<div class="col-sm-6">
				<select class="form-control" id="inputTipoCNH" name="VolunteerForm[tipo_cnh]">
					<option value="">(não possui)</option>
					<?php
						$tipos = array('A','B','C','D','E','AB','AC','AD','AE');
						foreach($tipos as $tipo)
							echo "<option value=\"$tipo\">$tipo</option>";
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputTel1">Telefone 1</label>
			<div class="col-sm-6">
				<input class="form-control" type="tel" id="inputTel1" name="VolunteerForm[tel1]" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputTel2">Telefone 2</label>
			<div class="col-sm-6">
				<input class="form-control" type="tel" id="inputTel2" name="VolunteerForm[tel2]">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputFormacao">Formação</label>
			<div class="col-sm-6">
				<select class="form-control" id="inputFormacao" name="VolunteerForm[formacao]">
					<?php
						$tipos = array('fundamental incompleto', 'fundamental completo', 'médio incompleto', 'médio completo', 'superior incompleto','superior completo');
						foreach($tipos as $tipo)
							echo "<option value=\"$tipo\">$tipo</option>";
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="inputObs">Observações</label>
			<div class="col-sm-6">
				<textarea class="form-control" id="inputObs" name="VolunteerForm[obs]"></textarea>
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

<script>
	$("#inputCpf").mask("99999999999");
	$("#inputDataNasc").mask("99/99/9999");

	<?php if(is_array($handlerReturn)): ?>
		var attributes = <?php echo json_encode($handlerReturn); ?>

		jQuery.each(attributes, function(i, value) {
			$('[name="VolunteerForm['+i+']"]').val(value);
		});		
	<?php endif; ?>
</script>

<?php require "../layout/layoutBottom.php" ; ?>