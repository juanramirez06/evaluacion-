<?php
set_time_limit(0);
error_reporting (5);
session_name();
session_start();
include "conex2x.php";
 
	$id_propiedad = $_GET['id_pro'];
	$sql = "SELECT propiedades.*,ciudad.nom_ciudad, servicios.nom_servicio, tipos.nom_tipo FROM propiedades INNER JOIN tipos ON propiedades.id_tipo = tipos.id_tipo INNER JOIN servicios ON propiedades.id_servicio = servicios.id_servicio INNER JOIN ciudad ON propiedades.id_ciudad = ciudad.id_ciudad WHERE propiedades.id_propiedad = '$id_propiedad'";
	$conp = $mysqli->query($sql);
	$regpro = $conp->fetch_assoc();
	
	
	$id_tercero = $regpro['id_tercero'];
	$sql = "SELECT * FROM terceros WHERE id_tercero = '$id_tercero'";
	$conter = $mysqli->query($sql);
	$regter = $conter->fetch_assoc();
	
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

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="css/skins/default.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="css/ie10-viewport-bug-workaround.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script type="text/javascript" src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNL8QV6"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- Option Panel -->
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
<!-- /Option Panel -->

<!-- Top header start -->
<!-- /Option Panel -->

<!-- Top header start -->
<?PHP   include("barraarriba.php"); ?>
<!-- Top header end -->

<!-- Main header start -->
<?PHP  include('menu.php'); ?>
<!-- Sidenav end -->
<!-- Sidenav end -->

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Modificar Propiedades Registradas</h1>
            </div>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Submit Property start -->
<div class="content-area-7 submit-property">
    <div class="container">
        <div class="row">
             <div class="col-md-12">
                <div class="notification-box">
                    <h3>CONTACTO</h3>
					 
                    <p><h1><?PHP echo $regter['nom_tercero']." ".$regter['ape_tercero']; ?></h1></p>
					 <p><strong><?PHP echo "CELULAR: ".$regter['cel_tercero']; ?></strong></p>
 
                </div>
            </div>  
             <div class="col-md-12">
                <div class="submit-address">
                    <form method="GET" id="forreg" name="forreg" >
                       
                        <h2><?PHP echo $regpro['titulo_propiedad']; ?></h2>
                      
                        <div class="search-contents-sidebar mb-30">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                    <p> <h4>  <?PHP echo $regpro['nom_tipo']." EN ".$regpro['nom_servicio']; ?></h4></p>
									<p> <h4>  <?PHP echo "VALOR: $".number_format($regpro['valor_propiedad'],2); ?></h4></p>
									<p> <h4>  <?PHP echo "UBICADA EN ".$regpro['dir_propiedad']." ".$regpro['barrio_propiedad']." ".$regpro['nom_ciudad']; ?></h4></p>
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
								<?PHP 
								  $sql = "SELECT detalles.*, caracteristicas.nom_carac FROM detalles INNER JOIN caracteristicas ON detalles.id_carac = caracteristicas.id_carac WHERE detalles.id_propiedad = '$id_propiedad' AND detalles.can_carac > 0";
								  $condet = $mysqli->query($sql);
								  while ($regdet = $condet->fetch_assoc())
								  {
								?>
							
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label><?PHP echo $regdet['nom_carac']; ?></label>
										<?PHP echo $regdet['can_carac']; ?>
                                    </div>
                                </div>
								<?PHP
								  }
								?>
                            </div>
                        </div>



                </div>
            </div>  						
						
             <div class="col-md-12">
                <div class="notification-box">
                        <div class="main-title-2">
                            <h1><span>FOTOS</span> DE LA PROPIEDAD</h1>
                        </div>
                        <div class="search-contents-sidebar mb-30">
                            <div class="row">
								<?PHP 
								  $sql = "SELECT * FROM fotos WHERE id_propiedad = '$id_propiedad'";
								  $condet = $mysqli->query($sql);
								  while ($regdet = $condet->fetch_assoc())
								  {
								?>
							
                           <!--     <div class="col-md-4 col-sm-6">
                                    <div class="form-group">-->
                                        
								<div align="center">	<p>	<img src="<?PHP echo $regdet['ruta_foto']; ?>" width="750px" height="500px" /></p></div>
								<p>&nbsp;</p>
                            <!--        </div>
                                </div> --->
								<?PHP
								  }
								?>
                            </div>
                        </div>
                </div>
            </div>  						


             <div class="col-md-12">
                <div class="notification-box">
                        <div class="main-title-2">
                            <h1><span>VIDEO</span> DE LA PROPIEDAD</h1>
                        </div>
                        <div class="search-contents-sidebar mb-30">
                            <div class="row">
								<?PHP 
									if (strlen(trim($regpro['ruta_video'])) > 0)
									{
								?>
							
                           <!--     <div class="col-md-4 col-sm-6">
                                    <div class="form-group">-->
                                        
										<div align="center"><p><video src="<?PHP echo $regpro['ruta_video']; ?>" poster="presentacion.jpg" controls width="640" height="480"></video></p></div>
                            <!--        </div>
                                </div> --->
								<?PHP
								     }
								?>
                            </div>
                        </div>
                </div>
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
        </div>
		
    </div>
	
</div>


<!-- Submit Property end -->

<!-- Partners block start -->
 
<!-- Partners block end -->

<!-- Footer start -->
<?PHP include('piedepagina.php'); ?>
<!-- Copy end right-->

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

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/modifypro.js"></script>
</body>
</html>
<?php
 
?>
