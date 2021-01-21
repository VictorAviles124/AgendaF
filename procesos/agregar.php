<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombre'],
		$_POST['descripcion'],
		$_POST['fecha']

	);

	echo $obj->agregar($datos);
?>