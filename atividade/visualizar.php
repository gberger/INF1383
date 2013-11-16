<?php require "../layout/layoutTop.php" ; ?>

<?php $atividades = CadVolHelper::obterAtividades( ); ?>

<div class="jumbotron-wrapper">
	<h3 class="title">Visualizar Atividades</h3>
	<div style="float: right; position: relative; top: -40px; padding-right: 10%">
		<form method="GET" class="form-search">
			<input id="date-search" type="text" name="data" class="input-medium search-query" placeholder="Data" <?php if(isset($_GET['data'])) echo 'value="'.$_GET['data'].'"'; ?>>
			<button type="submit" class="btn">Buscar</button>
		</form>
	</div>
	<div class="jumbotron" style="padding-right: 30px; padding-left: 30px; position: relative; top: -55px;">
		<table class="volunteers-table">
			<tbody>
				<tr>
					<th style="width: 10%">Data</th>
					<th style="width: 32%">Nome</th>
					<th style="width: 32%">Endereço</th>
					<th style="width: 12%">Total Vol.</th>
					<th style="width: 20px"></th>
				</tr>
				<?php if(count($atividades) == 0): ?>
					<tr>
						<td colspan="5" style="text-align: center; border-bottom: 0px">(nenhum resultado encontrado)</td>
					</tr>
				<?php endif; ?>
				<?php foreach($atividades as $atividade): ?>
					<tr>
						<td><?php echo DateTime::createFromFormat('Y-m-d',$atividade['data'])->format('d/m/Y'); ?></td>
						<td><?php echo $atividade['nome']; ?></td>
						<td><?php echo $atividade['endereco']; ?></td>
						<td>
							<?php echo $atividade['totalvol']; ?>
							<a style="float: right" href="/atividade/participacao.php?codigo=<?php echo $atividade['codigo']; ?>" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-eye-open"></span>
							</a>
						</td>
						<td>
							<a style="float: right" href="/atividade/cadastrar.php?codigo=<?php echo $atividade['codigo']; ?>" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>


	</div>
</div>

<script>
	$("#date-search").mask("99/99/9999");
</script>

<?php require "../layout/layoutBottom.php" ; ?>