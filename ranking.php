<?php

	require 'servico.model.php';
	require 'conexao.php';
	require 'servico.service.php';

	$conexao = new Conexao();
	$servico = new Servico();

	$servicoService = new ServicoService($conexao,$servico);

	$tarefas = $servicoService->ranking();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Ordens Serviços</title>

		<!-- bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
	<body>
		
		<div class="container"><!-- container -->

			<h3 class="margin">Top 10 de produtos mais solicitados</h3>

			<table class="table"><!-- table -->

				<thead>
					<tr>
						<th>Modelo de produto</th>
						<th>Quantidade</th>
					</tr>
				</thead>
				<?php foreach($tarefas as $indice => $tarefa){ ?>
					<tr>
						<td><?= $tarefa->produto ?></td>
						<td><?= $tarefa->ranking ?></td>
					</tr>
				<?php } ?>
				
			</table><!-- /table -->

			<a href="consultas.php">
				<button class="btn btn-primary">Voltar</button>
			</a>
			
		</div><!-- /container -->

	</body>
</html>