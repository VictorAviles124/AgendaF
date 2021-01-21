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
				
					<h1>Categoria</h1>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar <span class="fa fa-plus-square"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted ">
						By Victor Aviles
					</div>
				
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label>Nombre categoria</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre" required>
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion" required>
						<label>Fecha</label>
						<input type="date" class="form-control input-sm" id="fecha" name="fecha" required>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" id="btncerrar"  data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary" data-dismiss="modal">Guardar </button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idcategoriaU" name="idcategoriaU">
						<label>Nombre categoria</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
						<label>Fecha</label>
						<input type="date" class="form-control input-sm" id="fechaU" name="fechaU" required>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btncerrar2" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar" data-dismiss="modal">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			if($('#nombre').val()!=""){
				datos=$('#frmnuevo').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/agregar.php",
					success:function(r){
						if(r==1){
							$('#frmnuevo')[0].reset();
							$('#tablaDatatable').load('tabla.php');
							$('#btncerrar').click();
							alertify.success("agregado con exito ");
						}else{
							alertify.error("Fallo al agregar ");
						}
					}
				});
			}else{
				alertify.error(' campos vacios');
			}
			return false;
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						$('#btncerrar2').click();
						alertify.success("Actualizado con exito ");
					}else{
						alertify.error("Fallo al actualizar :");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idcategoria){
		$.ajax({
			type:"POST",
			data:"idcategoria=" + idcategoria,
			url:"procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idcategoriaU').val(datos['id_categoria']);
				$('#nombreU').val(datos['nombreF']);
				$('#descripcionU').val(datos['descripcion']);
				$('#fechaU').val(datos['fecha']);

			}
		});
	}

	function eliminarDatos(idcategoria){
		alertify.confirm('Eliminar una categoria', '¿Seguro de eliminar esta  categoria?', function(){ 

			$.ajax({
				type:"POST",
				data:"idcategoria=" + idcategoria,
				url:"procesos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito");
					}else{
						alertify.error("No se pudo eliminar");
					}
				}
			});

		}
		, function(){

		});
	}
</script>