<?php require "../layout/layoutTop.php" ; ?>

<?php
	if(isset($_GET['remover'])) {
		$dbconn = new SqlManager();
		$sql = "DELETE FROM participacao WHERE cod_ativ='".pg_escape_string($_GET['codigo']);
		$sql .= "' AND cpf='".pg_escape_string($_GET['remover'])."';";
		$dbconn->executeCommand($sql);
		CadVolHelper::redirect('/atividade/participacao.php?codigo='.$_GET['codigo']);
	}
?>

<?php
	$handlerReturn = FormHelper::handleParticipationForm();
?>

<?php if($handlerReturn === true && isset($_POST['ParticipationForm'])): ?>
	<div class="alert alert-success">
		Participação cadastrada com sucesso
	</div>
<?php elseif (is_array($handlerReturn) && isset($_POST['ParticipationForm'])): ?>
	<div class="alert alert-danger">
		Ocorreu um erro ao cadastrar a participação, por favor verifique os dados digitados	
	</div>
<?php endif; ?>

<?php $participantes = CadVolHelper::obterParticipantes( ); ?>


<h3 class="title">Visualizar Participantes</h3>
<div class="well row" style="padding-right: 30px; padding-left: 30px;">
	<div class="col-md-12">
		<table class="volunteers-table">
			
			<thead>
				<tr>
					<th style="width: 30%">Nome</th>
					<th style="width: 18%">Horas Trab.</th>
					<th style="width: 45%">Descrição</th>
					<th style="width: 7%"></th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($participantes) == 0): ?>
					<tr>
						<td colspan="5" style="width: 800px; text-align: center; border-bottom: 0px">(nenhum resultado encontrado)</td>
					</tr>
				<?php endif; ?>
				<?php foreach($participantes as $atividade): ?>
					<tr>
						<td><?php echo $atividade['nome']; ?></td>
						<td><?php echo $atividade['horas_trab']; ?></td>
						<td><?php echo $atividade['descricao']; ?></td>
						<td>
							<a style="float: right" href="<?php echo URL_PREFIX; ?>/atividade/participacao.php?codigo=<?php echo $_GET['codigo'].'&remover='.$atividade['cpf']; ?>" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<br>
		<br>
		<legend>Registrar participação</legend>
		<br>

		<form class="form-horizontal" role="form" method="POST">

			<div class="form-group">
				<label for="inputCpf" class="col-sm-2 control-label">Participante</label>
				<div class="col-sm-10">
					<select name="ParticipationForm[cpf]" id="inputCpf" class="form-control" required>
	            <?php
	              $funcionarios = CadVolHelper::obterVoluntariosParaDropdown($_GET['codigo']);
	              foreach($funcionarios as $cpf=>$nome)
	                echo "<option value='$cpf'>$nome</option>";
	            ?>
					</select>
				</div>
			</div>

			<input type="hidden" name="ParticipationForm[cod_ativ]" value="<?php echo $_GET['codigo']; ?>">

			<div class="form-group">
				<label for="inputHoras" class="col-sm-2 control-label">Horas</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="inputHoras" name="ParticipationForm[horas_trab]" required>
				</div>
			</div>

			<div class="form-group">
				<label for="inputDescricao" class="col-sm-2 control-label">Descrição da participação</label>
				<div class="col-sm-10">
	         <textarea class="form-control" id="inputDescricao" name="ParticipationForm[descricao]" required></textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-success">Enviar</button>
				</div>
			</div>
		
		</form>
	</div>

</div>


<script>
	<?php if(is_array($handlerReturn)): ?>
		var attributes = <?php echo json_encode($handlerReturn); ?>

		jQuery.each(attributes, function(i, value) {
			$('[name="ParticipationForm['+i+']"]').val(value);
		});		
	<?php endif; ?>

	$(document).ready(function(){
		$('select').chosen()
	})
</script>


<?php require "../layout/layoutBottom.php" ; ?>