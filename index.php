<?php

	require_once "modelos/problema.php" ;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Problemas Opplus</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&display=swap');

		body { font-family: 'Oswald', sans-serif; }
		p { font-size:	12pt; }
	</style>

</head>
<body>

	<div class="container mt-4">

		<h1 class="mt-2">
			Problemas Opplus
			<p class="subtitulo">Listado de Problemas</p>
		</h1>

		<div class="row">
			<div class="col-sm-1"><h4>IdIsu</h4></div>
			<div class="col-sm-1"><h4>Level</h4></div>
			<div class="col-sm-2"><h4>Date</h4></div>
			<div class="col-sm-4"><h4>Description</h4></div>
			<div class="col-sm-2"><h4>Reviewed</h4></div>
			
		</div>

		<?php
			$problemas = problema::getAll() ;

			foreach($problemas as $item):
		?>
		<div class="row">
			<div class="col-sm-1"><?= $item->idIsu ?></div>
			<div class="col-sm-1"><?= $item->level ?></div>
			<div class="col-sm-2"><?= $item->creationDate ?></div>
			<div class="col-sm-4"><?= $item->description ?></div>
			<?php
				if ($item->reviewed == 1) {
			?>
			<div class="col-sm-2 ml-2">
				<a class="btn btn-danger" href="solucionar.php?idIsu=<?= $item->idIsu ?>">
				<i class="bi bi-tag"></i> False</a>
			</div>
				
			<?php
				} else {
			?>
			<div class="col-sm-2 ml-2">
				<a class="btn btn-success" href="solucionar2.php?idIsu=<?= $item->idIsu ?>">
				<i class="bi bi-tag"></i> True</a>
			</div>
			<?php
				}
			?>
			<div class="col-sm-2 ml-2">
				<a href="detalle.php?idIsu=<?= $item->idIsu ?>">Ver en detalle</a>
			</div>
		</div>

		<?php
			endforeach ;
		?>

	</div>

</body>
</html>