<?php require "../layout/layoutTop.php" ; ?>

<?php $atividades = CadVolHelper::obterAtividades( ); 	?>

<h1 class="title">Visualizar Atividades</h3>

<div class="row well">
	<div class="col-md-12">
		
		<div class="advanced-search">
			
			<h3>Busca avançada</h3>

			<form method="GET" role="form">
				<div class="row">
					<div class="form-group col-md-2">
						<label for="date-end-search">Data Início</label>
						<input id="date-end-search" type="date" name="data_inicio" class="form-control" value="<?php echo isset($_GET['data_inicio']) ? $_GET['data_inicio'] : ''; ?>" placeholder="yyyy-mm-dd">
					</div>
					<div class="form-group col-md-2">
						<label for="date-search">Data Fim</label>
						<input id="date-start-search" type="date" name="data_fim" class="form-control" value="<?php echo isset($_GET['data_fim']) ? $_GET['data_fim'] : ''; ?>" placeholder="yyyy-mm-dd">
					</div>
					<div class="form-group col-md-4">
						<label for="name-search">Nome</label>
						<input id="name-search" type="text" name="nome" class="form-control" value="<?php echo isset($_GET['nome']) ? $_GET['nome'] : ''; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="address-search">Endereço</label>
						<input id="address-search" type="text" name="endereco" class="form-control" value="<?php echo isset($_GET['endereco']) ? $_GET['endereco'] : ''; ?>">
					</div>
				</div>
				<button type="submit" class="btn btn-success">Buscar</button>
			</form>
		</div>

		<h3>Atividades encontradas</h3>

		<?php if(count($atividades) == 0): ?>
			<p>
				Nenhum resultado encontrado.
			</p>
		<?php else: ?>
		<table class="volunteers-table activities-table">
			<thead>
				<tr>
					<th style="width: 10%">Data</th>
					<th style="width: 32%">Nome</th>
					<th style="width: 32%">Endereço</th>
					<th style="width: 12%">Total Vol.</th>
					<th style="width: 20px">Ver</th>
					<th style="width: 20px">Editar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($atividades as $atividade): ?>
					<tr>
						<td><?php echo DateTime::createFromFormat('Y-m-d',$atividade['data'])->format('d/m/Y'); ?></td>
						<td><?php echo $atividade['nome']; ?></td>
						<td><?php echo $atividade['endereco']; ?></td>
						<td><?php echo $atividade['totalvol']; ?></td>
						<td>
							<a href="/atividade/participacao.php?codigo=<?php echo $atividade['codigo']; ?>" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-eye-open"></span>
							</a>
						</td>
						<td>
							<a href="/atividade/cadastrar.php?codigo=<?php echo $atividade['codigo']; ?>" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<script>
			$(document).ready(function(){
				$('.activities-table').dataTable();
			})
		</script>
		<?php endif; ?>
		
	</div>
</div>
	
<?php require "../layout/layoutBottom.php" ; ?>