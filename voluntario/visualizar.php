<?php require "../layout/layoutTop.php" ; ?>

<?php $voluntarios = CadVolHelper::obterVoluntarios( ); ?>

<div class="row">
	<div class="col-md-6"><h1 class="title">Visualizar Voluntários</h1></div>
	<div class="col-md-6"><h2><a href="/voluntario/cadastrar.php" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Novo Voluntário</a></h2></div>
</div>

<div class="row well">
	<div class="col-md-12">
		
		<div class="advanced-search">
			
			<h3>Busca avançada</h3>

			<form method="GET" role="form" novalidate>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="cpf-search">CPF</label>
						<input id="cpf-search" type="tel" name="cpf" class="form-control" value="<?php echo isset($_GET['cpf']) ? $_GET['cpf'] : ''; ?>" placeholder="12345678900">
					</div>
					<div class="form-group col-md-3">
						<label for="name-search">Nome</label>
						<input id="name-search" type="text" name="nome" class="form-control" value="<?php echo isset($_GET['nome']) ? $_GET['nome'] : ''; ?>">
					</div>
					<div class="form-group col-md-3">
						<label for="telephone-search">Telefone</label>
						<input id="telephone-search" type="tel" name="telefone" class="form-control" value="<?php echo isset($_GET['telefone']) ? $_GET['telefone'] : ''; ?>">
					</div>
					<div class="form-group col-md-3">
						<label for="email-search">Email</label>
						<input id="email-search" type="email" name="email" class="form-control" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
					</div>
				</div>
				<button type="submit" class="btn btn-success">Buscar</button>
			</form>			
		</div>
	
		<h3>Atividades encontradas</h3>

		<?php if(count($voluntarios) == 0): ?>
			<p>
				Nenhum resultado encontrado.
			</p>
		<?php else: ?>
		<table class="volunteers-table">
			<thead>
				<tr>
					<th style="width: 20%">CPF</th>
					<th style="width: 40%">Nome</th>
					<th style="width: 20%">Telefone</th>
					<th style="width: 20%">E-mail</th>
					<th style="width: 20px">Ver</th>
					<th style="width: 20px">Editar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($voluntarios as $voluntario): ?>
					<tr>
						<td><?php echo $voluntario['cpf']; ?></td>
						<td><?php echo $voluntario['nome']; ?></td>
						<td><?php echo $voluntario['tel1']; ?></td>
						<td><?php echo $voluntario['email']; ?></td>
						<td>
							<a href="/voluntario/ver-um.php?cpf=<?php echo $voluntario['cpf']; ?>" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-eye-open"></span>
							</a>
						</td>
						<td>
							<a href="/voluntario/cadastrar.php?cpf=<?php echo $voluntario['cpf']; ?>" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<script>
			$(document).ready(function(){
				$('.volunteers-table').dataTable({
					aoColumnDefs: [
						{
							bSortable: false,
							aTargets: [ -1, -2 ]
						}
					]
				});
			})
		</script>
		<?php endif; ?>
		
	</div>
</div>

<?php require "../layout/layoutBottom.php" ; ?>