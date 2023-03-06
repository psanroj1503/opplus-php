<?php

	require_once "modelos/Problema.php" ;

	$problema = Problema::find($_GET["idIsu"]??"") ;
	$problema?->solucionar() ;

	header("location: index.php") ;