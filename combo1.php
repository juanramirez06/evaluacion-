    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="css/magnific-popup.css">
 
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="css/skins/default.css">

<?PHP
set_time_limit(0);
error_reporting (5);
session_name();
session_start();
include "conex2x.php";
if ($_SESSION["autenticadoVyP"] == "Autenticado")
{
	if (isset($_REQUEST['elegido']))
	{
	   $id_propiedad = $_REQUEST['elegido'];
	   $_SESSION["id_propiedadVyP"] = $id_propiedad;		
	}	
	else
	{
		$id_propiedad = $_SESSION["id_propiedadVyP"];
	}	
	
if ($id_propiedad > 0)
{	
	$id_tercero = $_SESSION["id_terceroVyP"];
	$sql = "SELECT * FROM terceros WHERE id_tercero = '$id_tercero'";
	$conter = $mysqli->query($sql);
	$regter = $conter->fetch_assoc();
	
	$sql = "SELECT * FROM propiedades WHERE id_propiedad = '$id_propiedad'";
	$conpro = $mysqli->query($sql);
	$regpro = $conpro->fetch_assoc();	
	
	if ($regpro['est_propiedad'] == 1)
		$estado_propiedad = "img/activo.png";
	else
		$estado_propiedad = "img/inactivo.png";
?>	
	
             <div class="col-md-12">
                <div class="submit-address">
                    <form method="GET" id="forreg" name="forreg" >
                        <div class="main-title-2">
                            <h1><span>INFORMACION</span> BASICA</h1>
                        </div>
                        <div class="search-contents-sidebar mb-30">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>TITULO</label>
                                        <input type="text" class="input-text" name="titulo" id="titulo" value="<?PHP echo $regpro['titulo_propiedad']; ?>" placeholder="Frase que identifique la propiedad">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>SERVICIO</label>
                                        <select class="input-text search-fields" name="servicio" id="servicio">
												<option value="0">[SERVICIO]</option>
													<?php
														$sql = "SELECT id_servicio, nom_servicio FROM servicios WHERE id_servicio > 0 AND est_servicio = 1 AND eli_servicio = 0";
														$consulta = $mysqli->query($sql) or die(mysql_error());
														$dato = $consulta->fetch_assoc();
														$totalRows_pais = mysqli_num_rows($consulta);
														do {
															if ($regpro['id_servicio'] == $dato['id_servicio'])
															  $selec = "SELECTED";
															else
															  $selec = ""; 	

													?>
																<option <?PHP echo $selec;  ?>  value="<?php echo $dato['id_servicio']?>"><?php echo $dato['nom_servicio']?></option>
												<?php
															} while ($dato = $consulta->fetch_assoc());
															$rows = mysqli_num_rows($consulta);
														if($rows > 0) {
																mysqli_data_seek($consulta, 0);
																$dato = $consulta->fetch_assoc();
															}
												?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>TIPO</label>
                                        <select class="input-text search-fields" name="tipo" id="tipo">
											<option value="0">[TIPO]</option>
												<?php
													$sql = "SELECT id_tipo, nom_tipo FROM tipos WHERE id_tipo > 0 AND est_tipo = 1 AND eli_tipo = 0";
													$consulta = $mysqli->query($sql) or die(mysql_error());
													$dato = $consulta->fetch_assoc();
													$totalRows_pais = mysqli_num_rows($consulta);
													do {
															if ($regpro['id_tipo'] == $dato['id_tipo'])
															  $selec = "SELECTED";
															else
															  $selec = ""; 	

												?>
															<option <?PHP echo $selec;  ?>  value="<?php echo $dato['id_tipo']?>"><?php echo $dato['nom_tipo']?></option>
											<?php
														} while ($dato = $consulta->fetch_assoc());
														$rows = mysqli_num_rows($consulta);
													if($rows > 0) {
															mysqli_data_seek($consulta, 0);
															$dato = $consulta->fetch_assoc();
														}
											?>	
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>PRECIO</label>
                                        <input type="text" class="input-text" name="precio" value="<?PHP echo $regpro['valor_propiedad']; ?>" placeholder="COP">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>DIRECCION</label>
                                        <input type="text" class="input-text" name="direccion" value="<?PHP echo $regpro['dir_propiedad']; ?>" placeholder=" ">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>BARRIO o CONJUNTO o EDIFICIO</label>
										 <input type="text" class="input-text" name="barrio" value="<?PHP echo $regpro['barrio_propiedad']; ?>" placeholder=" ">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>CIUDAD/DEPTO</label>
										<select class="input-text search-fields" name="ciudad" id="ciudad" data-live-search="true" data-live-search-placeholder="Buscar Ciudad">
												<option value="0">[CIUDAD]</option>
													<?php
														$sql = "SELECT ciudad.id_ciudad, ciudad.nom_ciudad, deptos.nom_depto FROM ciudad INNER JOIN deptos ON ciudad.id_depto = deptos.id_depto WHERE ciudad.id_ciudad > 0 ORDER BY ciudad.nom_ciudad";
														$consulta = $mysqli->query($sql) or die(mysql_error());
														$dato = $consulta->fetch_assoc();
														$totalRows_pais = mysqli_num_rows($consulta);
														do {

															if ($regpro['id_ciudad'] == $dato['id_ciudad'])
															  $selec = "SELECTED";
															else
															  $selec = ""; 	
													?>
																<option <?PHP echo $selec;  ?>  value="<?php echo $dato['id_ciudad']?>"><?php echo $dato['nom_ciudad']."-".$dato['nom_depto']; ?></option>
												<?php
															} while ($dato = $consulta->fetch_assoc());
															$rows = mysqli_num_rows($consulta);
														if($rows > 0) {
																mysqli_data_seek($consulta, 0);
																$dato = $consulta->fetch_assoc();
															}
												?>
										</select>
                                    </div>
                                </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>CELULAR</label>
                                    <input type="text" class="input-text" name="phone" id="phone"  value="<?PHP echo $regpro['celular']; ?>"   placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>ESTADO</label>
                                 <a href="#" onclick="fn_cambiarest()"  ><div id="estadop" ><img src="<?PHP echo $estado_propiedad; ?>" width='72px' height="72px" /></div></a>
                                </div>
                            </div>							
                            </div>
                        </div>
						
             <div class="col-md-12">
                <div class="notification-box">
                        <div class="main-title-2">
                            <h1><span>DETALLES</span> DE LA PROPIEDAD</h1>
                        </div>
                        <div class="search-contents-sidebar mb-30">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>CARACTERISTICA</label>
                                        <select class="input-text search-fields" name="carac" id="carac">
											<option value="0">[SELECCIONE]</option>
												<?php
													$sql = "SELECT id_carac, nom_carac FROM caracteristicas WHERE id_carac > 0 AND est_carac = 1 AND eli_carac = 0";
													$consulta = $mysqli->query($sql) or die(mysql_error());
													$dato = $consulta->fetch_assoc();
													$totalRows_pais = mysqli_num_rows($consulta);
													do {
														$selec = "";

												?>
															<option <?PHP echo $selec;  ?>  value="<?php echo $dato['id_carac']?>"><?php echo $dato['nom_carac']?></option>
											<?php
														} while ($dato = $consulta->fetch_assoc());
														$rows = mysqli_num_rows($consulta);
													if($rows > 0) {
															mysqli_data_seek($consulta, 0);
															$dato = $consulta->fetch_assoc();
														}
											?>	
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>VALOR O CANTIDAD</label>
                                        <input type="text" class="input-text" name="cantidad" id="cantidad" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <input type="button" class="search-button" name="agregardet" id="agregardet" onclick="fn_detalles()" value="ADICIONAR DETALLE">
                                    </div>
                                </div>
 								 <div class="outer_div2"></div><!-- Datos ajax Final -->
 
                            </div>
                        </div>



                </div>
            </div>  						
						
						








						<div class="main-title-2">
                            <h1><span>FOTOS </span> PROPIEDAD</h1>
                        </div>
                        <div id="myDropZone" class="dropzone dropzone-design mb-50" >
							 
                            <div class="dz-default dz-message"><span>Suba las fotos aqui con dimensiones 750 x 500 pixeles</span></div>
                        </div>
						
						<div class="main-title-2">
                            <h1><span>VIDEO </span> PROPIEDAD</h1>
                        </div>
                        <div id="myDropZone2" class="dropzone dropzone-design mb-50" >
							 
                            <div class="dz-default dz-message"><span>Subir un video en formato mp4 máximo de 30MB</span></div>
                        </div>
 

						
						
						
						
                   <div class="main-title-2">
                            <h1><span>CONTACTO</span> PROPIEDAD</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>NOMBRES</label>
                                    <input type="text" class="input-text" name="nombre" id="nombre" value="<?PHP echo $regter['nom_tercero']; ?>"  placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>APELLIDOS</label>
                                    <input type="text" class="input-text" name="apellido" id="apellido" value="<?PHP echo $regter['ape_tercero']; ?>" placeholder="Name">
                                </div>
                            </div>							
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <input type="email" class="input-text" name="email" value="<?PHP echo $regter['email_tercero']; ?>" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>CLAVE</label>
                                    <input type="password" class="input-text" name="clave1" id="clave1" value="<?PHP echo $regter['clave_tercero']; ?>"  placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>REPITA LA CLAVE</label>
                                    <input type="password" class="input-text" name="clave2" id="clave2" value="<?PHP echo ""; ?>"  placeholder="Repita password">
                                </div>
                            </div>							
 
							<input type="button" class="search-button" onclick="fn_agregar()" value="MODIFICAR" />
 
                        </div>						
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						

     
                    </form>
					
			<!--		<form class="dropzone dropzone-design mb-50" id="myDropZone" name="myDropZone" action="upload.php">
					<div class="dz-default dz-message"><span>Suba las fotos aqui con dimensiones 750 x 500 pixeles</span></div>
					<input type="file" name="file" />
					</form> --->
 			
					
					
                </div>
            </div>
<?php
}
}
else
{
	echo  "ERROR, NO TIENE PERMISOS PARA VER LA PROPIEDAD";
	
}
?>
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-submenu.js"></script>
<script src="js/rangeslider.js"></script>
<script src="js/jquery.mb.YTPlayer.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.scrollUp.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/leaflet.js"></script>
<script src="js/leaflet-providers.js"></script>
<script src="js/leaflet.markercluster.js"></script>
<script src="js/dropzone.js"></script>
<script src="js/jquery.filterizr.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/maps.js"></script>
<script src="js/sidebar.js"></script>
<script src="js/app2.js"></script>

