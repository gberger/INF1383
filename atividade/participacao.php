<?php require "../layout/layoutTop.php" ; ?>

<?php
	if(isset($_GET['remover'])) {
		$dbconn = new SqlManager();
		$sql = "DELETE FROM participacao WHERE cod_ativ='".pg_escape_string($_GET['codigo']);
		$sql .= "' AND cpf_vol='".pg_escape_string($_GET['remover'])."';";
		$dbconn->executeCommand($sql);
		CadVolHelper::redirect('/atividade/participacao.php?codigo='.$_GET['codigo']);
	}
?>

<?php $participantes = CadVolHelper::obterParticipantes( ); ?>

<div class="jumbotron-wrapper">
	<h3 class="title">Visualizar Participantes</h3>
	<div class="jumbotron" style="padding-right: 30px; padding-left: 30px;">
		<table class="volunteers-table">
			<tbody>
				<tr>
					<th style="width: 30%">Nome</th>
					<th style="width: 18%">Horas Trab.</th>
					<th style="width: 45%">Descrição</th>
					<th style="width: 20px"></th>
				</tr>
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
							<a style="float: right" href="/atividade/participacao.php?codigo=<?php echo $_GET['codigo'].'&remover='.$atividade['cpf']; ?>" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<br>
		<legend>Registrar participação</legend>
		


	</div>
</div>

<?php require "../layout/layoutBottom.php" ; ?>