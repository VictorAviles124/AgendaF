	<?php 
	class conectar{
		private $servidor="localhost";
		private $usuario="root";
		private $db="libreto3f";
		private $password="";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
				$this->usuario,
				$this->password,
				$this->db);
			return $conexion;
		}
	}
	?>