<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";

	$obj= new crud();

	$datos=array(
		$_POST['nombreU'],
		$_POST['descripcionU'],
		$_POST['fechaU'],
		$_POST['idcategoriaU']
				);

	echo $obj->actualizar($datos);
 ?>