<?php 

require_once "menu.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php";  ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				
					<h1>Contactos</h1>
					<div class="card-body ">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar <span class="fa fa-plus-square"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-header ">
						By Victor Aviles
					</div>
				
			</div>
		</div>
	</div>
	<!-- Modal Agregar-->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar contacto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<select class="form-control input-sm" data-live-search="true" id="categoria" name="id_categoria">
							<option value="0" selected="true" disabled>Selecciona una Categoria</option>
						</select>
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Apellido paterno</label>
						<input type="text" class="form-control input-sm" id="paterno" name="paterno">
						<label>Apellido Materno</label>
						<input type="text" class="form-control input-sm" id="materno" name="materno">
						<label>Telefono</label>
						<input type="text" class="form-control input-sm" id="telefono" name="telefono">
						<label>Email</label>
						<input type="text" class="form-control input-sm" id="email" name="email">
					</form>
				</div>
				<div class="modal-footer">
					 <button type="button" id="btncerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
					<button type="button" id="btnAgregarnuevo"  class="btn  btn-secondary" data-dismiss="modal"  >Guardar </button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Modificar-->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar contactos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idagendaU" name="idagendaU">
						<select class="form-control input-sm" data-live-search="true" id="categoriaU" name="id_categoriaU">
							<option value="0" selected="true" disabled>Selecciona una Categoria</option>
						</select>
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Apellido paterno</label>
						<input type="text" class="form-control input-sm" id="paternoU" name="paternoU">
						<label>Apellido Materno</label>
						<input type="text" class="form-control input-sm" id="maternoU" name="maternoU">
						<label>Telefono</label>
						<input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU">
						<label>Email</label>
						<input type="text" class="form-control input-sm" id="emailU" name="emailU">
					</form>
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-secondary"  id="btncerrar2" data-dismiss="modal">Cerrar</button> 
					<button type="button" class="btn btn-warning" id="btnActualizar" data-dismiss="modal">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaDatatable').load('tabla1.php');
			 
		});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			if($('#nombre').val()!=""){
				datos=$('#frmnuevo').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos1/agregar.php",
					success:function(r){
						console.log(r);
						if(r==1){
							 
							$('#frmnuevo')[0].reset();
							
							$('#tablaDatatable').load('tabla1.php');
							$('#btncerrar').click();
						


							alertify.success("agregado con exito ");
							
						}else{
							alertify.error("faltan campos");
						}
					}
				});
			}else{
				alertify.error('Error campos vacios');
			}
			return false;
		});
		
		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos1/actualizar.php",
				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tabla1.php');
						$('#btncerrar2').click();
						alertify.success("Actualizado con exito ");
					}else{
						alertify.error("Fallo al actualizar");
					}
				}
			});
		});
	});
	
	$(function(){
		$.ajax({
          url: 'procesos1/categoria.php', //
           type: 'POST',//
           data:{},
           success:function(respuesta){
              
               let datos = JSON.parse(respuesta);
               
               datos.forEach(item =>{
               	$('#categoria').append($('<option />', {
               		text: item.categoria,
               		value: item.id_categoria,
               	}));
               	$('#categoriaU').append($('<option />', {
               		text: item.categoria,
               		value: item.id_categoria,
               	}));
               });
           }
       });
	});
	
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla1.php');
	});
</script>

<script>
	function agregaFrmActualizar(idagenda){
		$.ajax({
			type:"POST",
			data:"idagenda=" + idagenda,
			url:"procesos1/obtenDatos.php",
			success:function(r){
				console.log(r);
				datos=jQuery.parseJSON(r);
				$('#idagendaU').val(datos['id_agenda']);
				$('#nombreU').val(datos['nombre']);
				$('#paternoU').val(datos['paterno']);
				$('#maternoU').val(datos['materno']);
				$('#telefonoU').val(datos['telefono']);
				$('#emailU').val(datos['email']);
				$('#categoriaU').val(datos['id_categoria']);
			}
		});
	}
	function eliminarDatos(idagenda){
		alertify.confirm('Eliminar una contacto', '¿de eliminar este contacto ?', function(){ 

			$.ajax({
				type:"POST",
				data:"idagenda=" + idagenda,
				url:"procesos1/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla1.php');
						alertify.success("Eliminado con exito ");
					}else{
						alertify.error("No se puerde eliminar");
					}
				}
			});

		}
		, function(){

		});
	}
</script>