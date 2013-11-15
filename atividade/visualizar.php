<?php require "../layout/layoutTop.php" ; ?>

<?php $voluntarios = CadVolHelper::obterVoluntarios( ); ?>

<div class="jumbotron-wrapper">
	<h3 class="title">Visualizar Voluntários</h3>
	<div style="float: right; position: relative; top: -40px; padding-right: 10%">
		<form method="GET" class="form-search">
			<input type="text" name="cpf" class="input-medium search-query" placeholder="CPF" <?php if(isset($_GET['cpf'])) echo 'value="'.$_GET['cpf'].'"'; ?>>
			<button type="submit" class="btn">Buscar</button>
		</form>
	</div>
	<div class="jumbotron" style="padding-right: 30px; padding-left: 30px; position: relative; top: -55px;">
		<table class="volunteers-table">
			<tbody>
				<tr>
					<th style="width: 20%">CPF</th>
					<th style="width: 40%">Nome</th>
					<th style="width: 20%">Telefone</th>
					<th style="width: 20%">e-mail</th>
					<th style="width: 20px"></th>
				</tr>
				<?php if(count($voluntarios) == 0): ?>
					<tr>
						<td colspan="5" style="text-align: center; border-bottom: 0px">(nenhum resultado encontrado)</td>
					</tr>
				<?php endif; ?>
				<?php foreach($voluntarios as $voluntario): ?>
					<tr>
						<td><?php echo $voluntario['cpf']; ?></td>
						<td><?php echo $voluntario['nome']; ?></td>
						<td><?php echo $voluntario['tel1']; ?></td>
						<td><?php echo $voluntario['email']; ?></td>
						<td>
							<a href="/voluntario/cadastrar.php?cpf=<?php echo $voluntario['cpf']; ?>" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>


	</div>
</div>

<?php require "../layout/layoutBottom.php" ; ?>