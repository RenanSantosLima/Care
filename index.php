<!DOCTYPE html>
<html>
	<head>
		<title>Ordens de Serviços</title>
		<meta charset="utf-8">

		<!-- bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
	<body>
		<div class="container"><!-- container -->
			
			<div class="layout">

				<form method="POST" action="servico_controller.php" enctype="multipart/form-data"><!-- form -->

					<div class="form-group">
						<label>Adicione o arquivo xml</label>

						<input type="file" name="arquivo" class="form-control-file" >
					</div>

					<button class="btn btn-primary " type="submit">Enviar</button>
				</form><!-- /form-->
				
			</div>
		</div><!-- /container -->

		<footer>
			<span>&copy Teste vaga -Desenvolvedor PHP Junior - Care - 2020 -</span>
		</footer>
	</body>
</html>