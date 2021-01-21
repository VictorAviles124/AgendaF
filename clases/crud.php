<?php 

class crud{
	public function agregar($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT into t_categoria(nombreF,descripcion,fecha)
		values ('$datos[0]',
		'$datos[1]',
		'$datos[2]')";
		return mysqli_query($conexion,$sql);
	}

	public function obtenDatos($idcategoria){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT id_categoria,
		nombreF,
		descripcion,
		fecha
		from t_categoria 
		where id_categoria='$idcategoria'";
		$result=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($result);

		$datos=array(
			'id_categoria' => $ver[0],
			'nombreF' => $ver[1],
			'descripcion' => $ver[2],
			'fecha' => $ver[3]
		);
		return $datos;
	}


	public function actualizar($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="UPDATE t_categoria set nombreF='$datos[0]',
		descripcion='$datos[1]',
		fecha='$datos[2]'
		where id_categoria='$datos[3]'";

		return mysqli_query($conexion,$sql);
	}
	public function eliminar($idcategoria){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="DELETE from t_categoria where id_categoria='$idcategoria'";
		return mysqli_query($conexion,$sql);
	}


	public function agregar1($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT into t_agenda(nombre,paterno,materno,telefono,email,
		id_categoria)
		values ('$datos[0]',
		'$datos[1]',
		'$datos[2]',
		'$datos[3]',
		'$datos[4]',
		'$datos[5]')";

		$Respuesta = mysqli_query($conexion,$sql);
		$Mensaje = "";
		if(!$Respuesta){
			$Mensaje = mysqli_error($conexion);
		}
		else{
			$Mensaje = "1";
		}
		return $Mensaje;
	}
	public function obtenDatos1($idagenda){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT id_agenda,
		nombre,
		paterno,
		materno,
		telefono,
		email,
		id_categoria
		from t_agenda
		where id_agenda='$idagenda'";
		$result=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($result);

		$datos=array(
			'id_agenda' => $ver[0],
			'nombre' => $ver[1],
			'paterno' => $ver[2],
			'materno'=>$ver[3],
			'telefono'=>$ver[4],
			'email'=>$ver[5],
			'id_categoria'=>$ver[6]
		);
		return $datos;
	}
	public function actualizar1($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="UPDATE t_agenda set nombre='$datos[1]',
		paterno='$datos[2]',
		materno='$datos[3]',
		telefono='$datos[4]',
		email='$datos[5]',
		id_categoria='$datos[6]'
		where id_agenda='$datos[0]'";

		$Respuesta = mysqli_query($conexion,$sql);
		$Mensaje = "";
		if(!$Respuesta){
			$Mensaje = mysqli_error($conexion);
		}
		else{
			$Mensaje = "1";
		}
		return $Mensaje;
	}
	public function eliminar1($idagenda){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="DELETE from t_agenda where id_agenda='$idagenda'";
		return mysqli_query($conexion,$sql);
	}
}

?>