<?php
include "conex2x.php";
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <?PHP include('titulo.php');	?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

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



<?PHP  include("barraarriba.php"); ?>

<?PHP  include('menu.php'); ?>

<div class="banner b6">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item item-100vh active">
                <img src="img/banner/img-1.png" alt="banner-slider-1">
                <div class="carousel-caption banner-slider-inner">
                    <div class="banner-content container banner-content-left">
                        <h1>Encuentra la casa de tus sueños</h1>
                        <p>Encuentre propiedades nuevas y destacadas ubicadas en su ciudad local.</p>
                        <div class="tab-btn banner-tab-btn">
                            <div class="tab-btn-inner">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="search-area">
                                            <div class="search-area-inner">
                                                <form method="GET" id="frmbus1" name="frmbus1">
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-pad2">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <input type="text" name="full-name" id="full-name" class="input-text search-fields" placeholder="Digite barrio o conjunto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                   <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 col-pad2">
                                                        <div class="form-group">
                                                            <select class="selectpicker search-fields" name="area-from" id="area-from" data-live-search="true" data-live-search-placeholder="Search value">
																	<option value="0">[CIUDAD]</option>
																		<?php
																			$sql = "SELECT id_ciudad, nom_ciudad FROM ciudad WHERE id_ciudad > 0";
																			$consulta = $mysqli->query($sql) or die(mysql_error());
																			$dato = $consulta->fetch_assoc();
																			$totalRows_pais = mysqli_num_rows($consulta);
																			do {
 
																				   $selec = "";
																		?>
																					<option <?PHP echo $selec;  ?>  value="<?php echo $dato['id_ciudad']?>"><?php echo $dato['nom_ciudad']?></option>
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
                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 col-pad2">
                                                        <div class="form-group">
                                                            <select class="selectpicker search-fields" name="property-status" id="property-status" data-live-search="true" data-live-search-placeholder="Search value">
															
																	<option value="0">[BUSCO]</option>
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
                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 col-pad2">
                                                        <div class="form-group">
                                                            <select class="selectpicker search-fields" name="location" id="location" data-live-search="true" data-live-search-placeholder="Search value">
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
 
                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 col-pad2 cp3">
                                                        
                                                            
															
															<input type="button" class="search-button" onclick="load(1)" value="BUSCAR"/>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

		 
		<div class="outer_div"></div>




<div class="counters-3 overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12 wow fadeInLeft delay-04s">
                <div class="sec-title-three">
                    <h2>Indices</h2>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12 wow fadeInRight delay-04s">
                <div class="media counter-box-3">
                    <div class="media-left">
                        <i class="flaticon-tag"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">436</h1>
                        <p>Total propiedades para venta</p>
                    </div>
                </div>
                <div class="media counter-box-3">
                    <div class="media-left">
                        <i class="flaticon-symbol-1"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">247</h1>
                        <p>Total propiedades para arrendar</p>
                    </div>
                </div>

<p>&nbsp;</p>
<div class="agent-section mb-70">
    <div class="container">
        <div class="main-title">
            <h1>Gestión Humana</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">

                <div class="agent-3">
 
                </div>
                
            </div>  		
		
		
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                <div class="agent-3">
                    <div class="thumb">
                        <img src="img/team/team-5.png" alt="agent-3" class="img-responsive">
                        <ul>
                            <li>
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="info">
                        <h4><a href="agent-single.html"></a></h4>
                        <p>Gerente Nacional</p>
                    </div>
                </div>
            </div>

			 
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInRight delay-04s">

                <div class="agent-3">
                    <div class="thumb">
                        <img src="img/team/team-7.png" alt="agent-3" class="img-responsive">
                        <ul>	
                            <li>
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="info">
                        <h4><a href="agent-single.html"></a></h4>
                        <p>SubGerente</p>
                    </div>
                </div>
            </div>
			 
			
			 
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInRight delay-04s">
                
 
               
            </div>  
        </div>
    </div>
</div>

x   

                    </div>
                    <div class="our-partners">
                        <div class="slick-btn">
                            <div class="slick-prev slick-arrow-buton-2 sab-4">
                                <a class="left carousel-control" href="#ourPartners3" data-slide="prev"><i class="fa fa-chevron-left icon-prev"></i></a>
                            </div>
                            <div class="slick-next slick-arrow-buton-2 sab-3">
                                <a class="right carousel-control" href="#ourPartners3" data-slide="next"><i class="fa fa-chevron-right icon-next"></i></a>
                            </div>
                        </div>
                    </div>
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

<script src="js/index.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
