<?php

	require_once "modelos/Problema.php" ;

	$problema = Problema::find($_GET["idIsu"]??"") ;
	$problema?->solucionar2() ;

	header("location: index.php") ;