<div class="container">
		<div class="content">
			<?php
			if(isset($_GET['aksi']) == 'delete'){
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
			?>
 
			
			<br />
			<div class="table-responsive " id="x">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Nombre</th>
					<th>Elaboración</th>
                    <th>Precio</th>
					<th>Acciones</th>
				</tr>
				<?php
				    $sql = mysqli_query($con, "SELECT * FROM menu ORDER BY id_platillo ASC");
				
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['nombre_platillo'].'</td>
                            <td>'.$row['elaboracion'].'</td>
							<td>$'.$row['precio'].'</td>
							<td>
 
								<a href="edit.php?nik='.$row['id_platillo'].'" title="Editar datos" class="btn btn-primary btn-sm">Editar<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&nik='.$row['id_platillo'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombre_platillo'].'?\')" class="btn btn-danger btn-sm">Eliminar<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div>