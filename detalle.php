<?php

	require_once "modelos/Problema.php" ;

	// recuperamos el problema
	$problema = Problema::find($_GET["idIsu"]??"") ;

	// si el problema no existe redirigimos
	if (is_null($problema)) header("location: index.php") ;


	/**
	 * @param  array  $datos
	 * @return
	 */
	function show(array $datos) {

		foreach($datos as $item):
		?>

	<div class="row mt-2">
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
				<a class="btn btn-primary" href="index.php">
				<i class="bi bi-tag"></i> Volver</a>
			</div>	
		</div>

		<?php
			endforeach ;
				
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Biblioteca CPIFP</title>

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
			<p class="subtitulo">Problema <?= $problema ?></p>
		</h1>

		<div class="row mt-4">
			<div class="col-sm-12 bg-dark text-white">
				PROBLEMA ACTUAL
			</div>
		</div>

		<?php show($problema->actuales()) ; ?>

	</div>

</body>
</html>