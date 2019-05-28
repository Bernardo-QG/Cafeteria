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