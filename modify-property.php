<?php
set_time_limit(0);
error_reporting (5);
session_name();
session_start();
include "conex2x.php";
if ($_SESSION["autenticadoVyP"] == "Autenticado")
{
	$id_tercero = $_SESSION["id_terceroVyP"];
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
					 <p><strong>PROPIEDADES REGISTRADAS:</strong> </p>
					 <p>
						<select class="input-text search-fields" name="buscarpro" id="buscarpro" data-live-search="true" data-live-search-placeholder="Search value">
								<option value="0">[SELECCIONE UNA PROPIEDAD]</option>
									<?php
										$sql = "SELECT propiedades.id_propiedad, CONCAT(ciudad.nom_ciudad,' ',propiedades.barrio_propiedad,' ',propiedades.dir_propiedad) AS nom_propiedad FROM propiedades INNER JOIN ciudad ON propiedades.id_ciudad = ciudad.id_ciudad WHERE propiedades.eli_propiedad = 0 AND propiedades.id_tercero = '$id_tercero' ";
										$consulta = $mysqli->query($sql) or die(mysql_error());
										$dato = $consulta->fetch_assoc();
										$totalRows_pais = mysqli_num_rows($consulta);
										do {
											$selec = "";

									?>
												<option <?PHP echo $selec;  ?>  value="<?php echo $dato['id_propiedad']?>"><?php echo $dato['nom_propiedad']?></option>
								<?php
											} while ($dato = $consulta->fetch_assoc());
											$rows = mysqli_num_rows($consulta);
										if($rows > 0) {
												mysqli_data_seek($consulta, 0);
												$dato = $consulta->fetch_assoc();
											}
								?>
						</select>					 
					 </p>
                </div>
            </div>  
<!--				<div id="mostrar_propiedad" > </div> --->
				<div class="mostrar_propiedad"></div>
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
}
else
{
	echo "NO ESTA AUTORIZADO PARA ENTRAR A ESTE PROCESO";
	header ("Location: index.php");
	
}
?>
