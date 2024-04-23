<?php
include "conex2x.php";
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
   <?PHP include('titulo.php');	?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

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

    
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" >


    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" type="text/css" href="css/ie10-viewport-bug-workaround.css">


    <script src="js/ie-emulation-modes-warning.js"></script>


</head>
<body>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNL8QV6"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<div class="page_loader"></div>

<div class="option-panel option-panel-collased">
    <h2>Change Color</h2>
    <div class="color-plate default-plate" data-color="default"></div>
    <div class="color-plate blue-plate" data-color="blue"></div>
    <div class="color-plate yellow-plate" data-color="yellow"></div>
    <div class="color-plate red-plate" data-color="red"></div>
    <div class="color-plate green-light-plate" data-color="green-light"></div>
    <div class="color-plate orange-plate" data-color="orange"></div>
    <div class="color-plate yellow-light-plate" data-color="yellow-light"></div>
    <div class="color-plate green-light-2-plate" data-color="green-light-2"></div>
    <div class="color-plate olive-plate" data-color="olive"></div>
    <div class="color-plate purple-plate" data-color="purple"></div>
    <div class="color-plate blue-light-plate" data-color="blue-light"></div>
    <div class="color-plate brown-plate" data-color="brown"></div>
    <div class="setting-button">
        <i class="fa fa-gear"></i>
    </div>
</div>



<?PHP   include("barraarriba.php"); ?>



<?PHP  include('menu.php'); ?>



<div class="sub-banner overview-bgi">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Registrar Propiedad</h1>
            </div>
        </div>
    </div>
</div>

<div class="content-area-7 submit-property">
    <div class="container">
        <div class="row">
             <div class="col-md-12">
                <div class="notification-box">
                    <h3>IMPORTANTE</h3>
					 
                    <p>El número de celular es su usuario para guardar los datos de la propiedad o varias propiedades, para luego poder modificarlas. Siempre debe colocar la clave y repetirla.</p>
                </div>
            </div>  
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
                                        <input type="text" class="input-text" name="titulo" id="titulo" placeholder="Frase que identifique la propiedad">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>SERVICIO</label>
                                        <select class="selectpicker search-fields" name="servicio" id="servicio">
												<option value="0">[SERVICIO]</option>
													<?php
														$sql = "SELECT id_servicio, nom_servicio FROM servicios WHERE id_servicio > 0 AND est_servicio = 1 AND eli_servicio = 0";
														$consulta = $mysqli->query($sql) or die(mysql_error());
														$dato = $consulta->fetch_assoc();
														$totalRows_pais = mysqli_num_rows($consulta);
														do {
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
                                        <select class="selectpicker search-fields" name="tipo" id="tipo">
											<option value="0">[TIPO]</option>
												<?php
													$sql = "SELECT id_tipo, nom_tipo FROM tipos WHERE id_tipo > 0 AND est_tipo = 1 AND eli_tipo = 0";
													$consulta = $mysqli->query($sql) or die(mysql_error());
													$dato = $consulta->fetch_assoc();
													$totalRows_pais = mysqli_num_rows($consulta);
													do {
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
                                        <input type="text" class="input-text" name="precio" placeholder="COP">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>DIRECCION</label>
                                        <input type="text" class="input-text" name="direccion" placeholder=" ">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>BARRIO o CONJUNTO o EDIFICIO</label>
										 <input type="text" class="input-text" name="barrio" placeholder=" ">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>CIUDAD/DEPTO</label>
										<select class="selectpicker search-fields" name="ciudad" id="ciudad" data-live-search="true" data-live-search-placeholder="Buscar Ciudad">
												<option value="0">[CIUDAD]</option>
													<?php
														$sql = "SELECT ciudad.id_ciudad, ciudad.nom_ciudad, deptos.nom_depto FROM ciudad INNER JOIN deptos ON ciudad.id_depto = deptos.id_depto WHERE ciudad.id_ciudad > 0 ORDER BY ciudad.nom_ciudad";
														$consulta = $mysqli->query($sql) or die(mysql_error());
														$dato = $consulta->fetch_assoc();
														$totalRows_pais = mysqli_num_rows($consulta);
														do {

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
                                    <input type="text" class="input-text" name="phone" id="phone"  placeholder="Celular">
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
                                        <select class="selectpicker search-fields" name="carac" id="carac">
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
                            <h1><span>CONTACTO</span> PROPIETARIO</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>NOMBRES</label>
                                    <input type="text" class="input-text" name="nombre" id="nombre" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>APELLIDOS</label>
                                    <input type="text" class="input-text" name="apellido" id="apellido" placeholder="Apellidos">
                                </div>
                            </div>							
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <input type="email" class="input-text" name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>CLAVE</label>
                                    <input type="password" class="input-text" name="clave1" id="clave1"  placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>REPITA LA CLAVE</label>
                                    <input type="password" class="input-text" name="clave2" id="clave2"  placeholder="Repita Contraseña">
                                </div>
                            </div>							
 
							<input type="button" class="search-button" onclick="fn_agregar()" value="GRABAR" />
 
                        </div>						
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						

     
                    </form>
					

				
 			
					
					
                </div>
            </div>
        </div>
    </div>
</div>


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
<script src="js/app.js"></script>


<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/registro.js"></script>
</body>
</html>

