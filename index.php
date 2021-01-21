<!DOCTYPE html>
<html>
<head>
	<title>Agenda</title>
	<link rel="stylesheet" href="css/style2.css">

	<?php 
        require_once "dependencias.php"; 
        require_once "menu.php"; 
       require_once "scripts.php"
		//  session_start();
		// if (isset($_SESSION['usuario'])) {
		// 	header("location:vistas/index2.php");
		//}
	?>
</head>
<body>
	 <h1 >Agenda de Contactos</h1>
	
     <img class="vr" src="img/image.jpg" alt=""  width="350px" >

	 <div>
	    <h2>Informacion Personal</h2>
	 </div>

		<div class="informacion">
			<p>Nombre :<span> Victor Aviles </span></p>	
			<p>Edad :<span> 23 </span></p>
			<p>Carrera :<span> Ingenieria en Sistemas Computacionales </span></p>
				<p></p>
		</div>			

		<footer>
			Agenda de PHP |Victor Aviles
		</footer>

</body>
</html>