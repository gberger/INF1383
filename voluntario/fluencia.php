<?php require "../layout/layoutTop.php" ; ?>

<?php
	if(isset($_GET['remover'])) {
		$dbconn = new SqlManager();
		$sql = "DELETE FROM fala WHERE cod_ling='".pg_escape_string($_GET['remover']);
		$sql .= "' AND cpf='".pg_escape_string($_GET['cpf'])."';";
		$dbconn->executeCommand($sql);
		CadVolHelper::redirect('/voluntario/fluencia.php?cpf='.$_GET['cpf']);
	}
?>

<?php
	$handlerReturn = FormHelper::handleFluenceForm();
?>

<?php if($handlerReturn === true && isset($_POST['FluenceForm'])): ?>
	<div class="alert alert-success">
		Dados inseridos com sucesso
	</div>
<?php elseif (is_array($handlerReturn) && isset($_POST['FluenceForm'])): ?>
	<div class="alert alert-danger">
		Ocorreu um erro ao inserir as informações, por favor verifique os dados digitados	
	</div>
<?php endif; ?>

<?php $idiomas = CadVolHelper::obterFluencias( ); ?>


<h3 class="title">Visualizar Fluências do Voluntário</h3>
<div class="well row" style="padding-right: 30px; padding-left: 30px;">
	<div class="col-md-12">
		<table class="volunteers-table">
			
			<thead>
				<tr>
					<th style="width: 60%">Idioma</th>
					<th style="width: 20%">Nível</th>
					<th style="width: 20%"></th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($idiomas) == 0): ?>
					<tr>
						<td colspan="5" style="width: 800px; text-align: center; border-bottom: 0px">(nenhum resultado encontrado)</td>
					</tr>
				<?php endif; ?>
				<?php foreach($idiomas as $idioma): ?>
					<tr>
						<td><?php echo $idioma['nome'].' ('.$idioma['dialeto'].')'; ?></td>
						<td>
							<?php switch( $idioma['nivel']) {
								case 'medio':
									echo 'Médio';
									break;
								default:
									echo ucwords($idioma['nivel']);
									break;
							} ?>
						</td>
						
						<td>
							<a style="float: right" href="/voluntario/fluencia.php?cpf=<?php echo $_GET['cpf'].'&remover='.$idioma['cod_ling']; ?>" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<br>
		<br>
		<legend>Registrar fluência em idioma</legend>
		<br>

		<form class="form-horizontal" role="form" method="POST">

			<input type="hidden" name="FluenceForm[cpf]" value="<?php echo $_GET['cpf']; ?>">

			<div class="form-group">
				<label for="inputCod" class="col-sm-2 control-label">Idioma</label>
				<div class="col-sm-10">
					<select name="FluenceForm[cod_ling]" id="inputCod" class="form-control" required>
	            <?php
	              $lista = CadVolHelper::obterIdiomasParaDropdown($_GET['cpf']);
	              foreach($lista as $codigo=>$label)
	                echo "<option value='$codigo'>$label</option>";
	            ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="inputNivel" class="col-sm-2 control-label">Nível</label>
				<div class="col-sm-10">
					<select name="FluenceForm[nivel]" id="inputNivel" class="form-control" required>
			            <option value="iniciante">Iniciante</iniciante>
			            <option value="medio">Médio</iniciante>
			            <option value="fluente">Fluente</iniciante>
					</select>
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
		$('select:eq(0)').chosen()
	})
</script>


<?php require "../layout/layoutBottom.php" ; ?>