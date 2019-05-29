<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Cafetería</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./admin.css">
	
	<script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>

<script>
     
    var gct;
    function show_Tablas(){   
      $('#tableMenu tbody').empty();                                                   
      $.get("servidor.php", function(datos){                                                                                                                                      
               gct = JSON.parse(datos);  
               for(var i=0;i<gct["AllMenu"].length;i++){
				$('#tableMenu > tbody:last-child').append(' '
				  +'<tr><td>'+(i+1)+'</td>'
				  +'<td id="p'+gct["AllMenu"][i].id_platillo+'">'+gct["AllMenu"][i].nombre_platillo+'</td>'
				  +'<td>'+gct["AllMenu"][i].elaboracion+'</td>'
				  +'<td>$'+gct["AllMenu"][i].precio+'</td>'
				  +'<td style="width:180;">'
                  +'<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_platillo"><i class="fas fa-edit"></i></button>'
				  +'&nbsp;'
				  +'<button type="button" class="btn btn-danger btn-sm" onclick="eliminar()" ><i class="fas fa-trash-alt"></i></button>'
                  +'</td></tr>');
			   };
			   for(var j=0;j<gct["AllGuisados"].length;j++){
				$('#tableGuisados > tbody:last-child').append(' '
				  +'<tr><td>'+(j+1)+'</td>'
				  +'<td id="g'+gct["AllGuisados"][j].id_guisado+'">'+gct["AllGuisados"][j].nombre_guisado+'</td>'
				  +'<td style="width:180;">'
                  +'<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_guisado"><i class="fas fa-edit"></i></button>'
				  +'&nbsp;'
				  +'<a href="admin.php?aksi=delete2&nik='+gct["AllGuisados"][j].id_guisado+'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '+gct["AllGuisados"][j].nombre_guisado+'?\')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>'
                  +'</td></tr>');
			   };
				 for(var k=0;k<gct["AllPedidos"].length;k++){
				$('#tablePedidos > tbody:last-child').append(' '
				  +'<tr><td>'+(k+1)+'</td>'
				  +'<td id="pe'+gct["AllPedidos"][k].id_pedido+'">'+gct["AllPedidos"][k].nombre_cliente+'</td>'
				  +'<td>'+gct["AllPedidos"][k].nombre_platillo+'</td>'
				  +'<td>'+gct["AllPedidos"][k].nombre_guisado+'</td></tr>');
			   };
           });
         
                    
	}
	show_Tablas();
	function eliminar(){
		alert("hola");
		/*$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
		$sql = "Update menu Set estado_menu=0 Where id_platillo="+id;
		$result = mysqli_query($con, $sql);*/
	}

	</script>
</head>

<body>

<div class="titulo">
	<h4 class="section-title"><i class="fas fa-coffee"></i> Administrar Cafetería</h4>
</div>

<section id="tabs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-p-tab" data-toggle="tab" href="#nav-p" role="tab" aria-controls="nav-p" aria-selected="true">Platillos</a>
						<a class="nav-item nav-link" id="nav-g-tab" data-toggle="tab" href="#nav-g" role="tab" aria-controls="nav-g" aria-selected="false">Guisados</a>
						<a class="nav-item nav-link" id="nav-pe-tab" data-toggle="tab" href="#nav-pe" role="tab" aria-controls="nav-pe" aria-selected="false">Pedidos</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-p" role="tabpanel" aria-labelledby="nav-p-tab">
                        <div class="container">
							<div class="content">
								
							<br />
							<div class="table-responsive ">
								<table class="table table-bordered" id="tableMenu">
									<thead>	
										<tr>
											<th>No</th>
											<th>Nombre</th>
											<th>Elaboración</th>
                    						<th>Precio</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									</tbody>	
				
				
								</table>
							</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="nav-g" role="tabpanel" aria-labelledby="nav-g-tab">
					<div class="container">
							<div class="content">
								
							<br />
							<div class="table-responsive">
								<table class="table table-bordered" id="tableGuisados">
									<thead>	
										<tr>
											<th>No</th>
											<th>Nombre</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									</tbody>	
				
				
								</table>
							</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="nav-pe" role="tabpanel" aria-labelledby="nav-pe-tab">
					<div class="container">
							<div class="content">
								
							<br />
							<div class="table-responsive ">
								<table class="table table-bordered" id="tablePedidos">
									<thead>	
										<tr>
											<th>No</th>
											<th>Cliente</th>
											<th>Platillo</th>
                    						<th>Guisado</th>
										</tr>
									</thead>
									<tbody>
									</tbody>	
								</table>
							</div>
							</div>

					</div>
				</div>
			
			</div>
		</div>
	</div>
	<?php
		if(isset($_GET['aksi']) == 'delete1'){
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$cek = mysqli_query($con, "SELECT * FROM menu WHERE id_platillo='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM menu WHERE id_platillo='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
		}
		else if(isset($_GET['aksi']) == 'delete2'){
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$cek = mysqli_query($con, "SELECT * FROM guisados WHERE id_guisado='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM guisados WHERE id_guisado ='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
		}
	?>
</section>

<section>
<div class="modal fade" id="modal_guisado" tabindex="-" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Guisado</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
	  <div class="card-header p-0">
	  		<div class="form-group">
            	<div class="input-group mb-4">
                	<div class="input-group-prepend">
                    	<div class="input-group-text"><i class="fas fa-utensils"></i></div>
                	</div>
                	<input type="text" class="form-control" id="nombre_guisado" name="nombre_guisado" placeholder="Nombre" required>
                 </div>
             </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn1 btn-default">Guardar guisado</button>
      </div>
    </div>
  </div>
</div>
</section>

</section>
<div class="modal fade" id="modal_platillo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Platillo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
	  <div class="card-header p-0">
	  		<div class="form-group">
            	<div class="input-group mb-1">
                	<div class="input-group-prepend">
                    	<div class="input-group-text"><i class="fas fa-utensils"></i></div>
                	</div>
                	<input type="text" class="form-control" id="nombre_platillo" name="nombre_platillo" placeholder="Nombre" required>
                 </div>
             </div>
			 <div class="form-group">
            	<div class="input-group mb-2">
                	<div class="input-group-prepend">
                    	<div class="input-group-text"><i class="fas fa-drumstick-bite"></i></div>
                	</div>
                	<input type="text" class="form-control" id="elaboracion" name="elaboracion" placeholder="Elaboración" required>
                 </div>
             </div>
			 <div class="form-group">
            	<div class="input-group mb-3">
                	<div class="input-group-prepend">
                    	<div class="input-group-text"><i class="fas fa-money-bill-alt"></i></button>
                	</div>
                	<input type="text" class="form-control" id="precio" name="precio" placeholder="Precio" required>
                 </div>
             </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn1 btn-default">Guardar platillo</button>
      </div>
    </div>
  </div>
</div>
</section>


</body>
</html>
<?php
				    /*$sql = mysqli_query($con, "SELECT * FROM menu ORDER BY nombre_platillo ASC");
				
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['id_platillo'].'</td>
							<td>'.$row['nombre_platillo'].'</td>
                            <td>'.$row['elaboracion'].'</td>
							<td>$'.$row['precio'].'</td>
							<td>
 
								<a href="edit.php?nik='.$row['id_platillo'].'" title="Editar datos" class="btn btn-primary btn-sm">Editar<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="admin.php?aksi=delete&nik='.$row['id_platillo'].'" title="Eliminar" onclick="return confirm(\'¡Está seguro de borrar los datos de  '.$row['nombre_platillo'].'?\')" class="btn btn-danger btn-sm">Eliminar<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}*/
				?>