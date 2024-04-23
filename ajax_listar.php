<?PHP
set_time_limit(0);
error_reporting (5);
session_name();
session_start();
	include "conex2x.php";
	header ("Expires: Fri, 14 Mar 1980 20:53:00 GMT"); //la pagina expira en fecha pasada
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
	header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
	header ("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE
	
	
		$barrio = $_REQUEST['full-name'];
		$id_tipo = $_REQUEST['property-status'];
		$id_servicio = $_REQUEST['location'];
		$id_ciudad = $_REQUEST['area-from'];
 

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';	
if($action == 'ajax'){

include 'pagination.php'; //incluir el archivo de paginación	
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 15; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		
		

		$sql = "SELECT id_propiedad FROM propiedades WHERE est_propiedad = '1' AND eli_propiedad = 0 AND id_propiedad > 0 ";
 		$conreg = $mysqli->query($sql);
		$numrows = mysqli_num_rows($conreg);
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';
 
	
	$solofecha = date("Y-m-d");
	$sql = "SELECT propiedades.*, ciudad.nom_ciudad, deptos.nom_depto, terceros.nom_tercero,' ',terceros.ape_tercero FROM propiedades INNER JOIN ciudad ON propiedades.id_ciudad = ciudad.id_ciudad INNER JOIN deptos ON ciudad.id_depto = deptos.id_depto INNER JOIN terceros ON propiedades.id_tercero = terceros.id_tercero WHERE propiedades.eli_propiedad = '0' AND propiedades.est_propiedad = '1' AND propiedades.id_propiedad > 0  ";
	if (strlen(trim($barrio)) > 0)
        $sql .= " AND propiedades.barrio_propiedad  like '%$barrio%'";
    if ($id_tipo > 0)
		$sql .= " AND propiedades.id_tipo = '$id_tipo'"; 
    if ($id_servicio > 0)
		$sql .= " AND propiedades.id_servicio = '$id_servicio'";
    if ($id_ciudad > 0)
		$sql .= " AND propiedades.id_ciudad = '$id_ciudad'"; 	
 
	$sql .= " ORDER BY dir_propiedad ASC LIMIT $offset,$per_page";
	$buscar = $mysqli->query($sql);
	
	
?>
<div class="content-area featured-properties">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Propiedades Presentadas</h1>
        </div>
 <!--       <ul class="list-inline-listing filters filters-listing-navigation">
            <li class="active btn filtr-button filtr" data-filter="all">All</li>
            <li data-filter="1" class="btn btn-inline filtr-button filtr">House</li>
            <li data-filter="2" class="btn btn-inline filtr-button filtr">Office</li>
            <li data-filter="3" class="btn btn-inline filtr-button filtr">Apartment</li>
            <li data-filter="4" class="btn btn-inline filtr-button filtr">Residential</li>
        </ul> --->

		
        <div class="row wow fadeInUp delay-04s">
            <div class="filtr-container">
			<?php
			$item = 0;
			while ($reg = $buscar->fetch_assoc())
			{
				$item = $item + 1;
				$id_propiedad = $reg['id_propiedad'];
				switch($item){
					case 1 : $var = "1, 2, 3";break;
					case 2 : $var = "1";break;
					case 3 : $var = "2, 3"; $item = 0;break;
					
				}
	 
			?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="<?PHP echo $var; ?>">
                    <div class="property fp2">
                        <!-- Property img -->
                        <div class="property-img">
                            <div class="property-tag button alt featured">Presentado</div>
                            <div class="property-tag button sale">For Sale</div>
                            <div class="property-price"><?PHP echo number_format($reg['valor_propiedad'],2); ?></div>
							<?php
							  $sql = "SELECT * FROM fotos WHERE id_propiedad = '$id_propiedad' AND eli_foto = 0  ORDER BY id_foto DESC LIMIT 1";
							  $confotos = $mysqli->query($sql);
							  while ($regfotos = $confotos->fetch_assoc())
							  {
							?>
							
                            <img src="<?php echo $regfotos['ruta_foto']; ?>" alt="fp" width='750px' height='500px' class="img-responsive">
							
							
							
                            <div class="property-overlay">
                                <a href="view-property.php?id_pro=<?PHP echo $id_propiedad; ?>" class="overlay-link">
                                    <i class="fa fa-link"></i>
                                </a>
								
								<?PHP 
								
									if (strlen(trim($reg['ruta_video'])) > 0)
									{
								?>
								
                                <a href="<?PHP echo $reg['ruta_video']; ?>" class="overlay-link property-video" title="Lexus GS F">
                                    <i class="fa fa-video-camera"></i>
                                </a>
								<?php
									}
								?>
                                <div class="property-magnify-gallery">
                                    <a href="<?php echo $regfotos['ruta_foto']; ?>"  class="overlay-link">
                                        <i class="fa fa-expand"></i>
                                    </a>

                                    <a href="<?php echo $regfotos['ruta_foto']; ?>"  class="hidden"></a>
                                     
                                </div>
                            </div>
							
							<?PHP
							  }
							?>
                        </div>
                        <!-- Property content -->
                        <div class="property-content">
                            <!-- info -->
                            <div class="info">
                                <!-- title -->
                                <h1 class="title">
                                    <a href="view-property.php?id_pro=<?PHP echo $id_propiedad; ?>"><?PHP echo substr($reg['titulo_propiedad'],0,22); ?></a>
                                </h1>
                                <!-- Property address -->
                                <h5 class="property-address">
                                    <a href="properties-details.html">
                                        <i class="fa fa-map-marker"></i><?PHP echo substr($reg['dir_propiedad'],0,15)." ".substr($reg['barrio_propiedad'],0,7)." ".substr($reg['nom_ciudad'],0,6)."-".substr($reg['nom_depto'],0,2); ?>
                                    </a>
                                </h5>
                                <!-- Facilities List <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> -->
                                <ul class="facilities-list clearfix">
								<?PHP
									$sql = "SELECT detalles.*, caracteristicas.nom_carac FROM detalles INNER JOIN caracteristicas ON detalles.id_carac = caracteristicas.id_carac WHERE detalles.id_propiedad = '$id_propiedad' AND detalles.eli_detalle = 0 AND detalles.can_carac > 0";
									$condet = $mysqli->query($sql);
									while ($regdet = $condet->fetch_assoc())
									{
								?>
                                    <li>
                                        <span><?PHP echo $regdet['can_carac']." ".$regdet['nom_carac']; ?></span>
                                    </li>
								<?php
									}
								?>
									

                                </ul>
                            </div>
                            <!-- Property footer -->
                            <div class="property-footer">
                                <span class="left">
                                    <a href="#"><i class="fa fa-user"></i><?PHP echo $reg['nom_tercero']." ".$reg['ape_tercero']; ?></a>
                                </span>
                                <span class="right">
                               <!--     <i class="fa fa-calendar"></i><p><?PHP // echo $reg['fec_propiedad']; ?></p> --->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
				}
				?>
			
            </div>
        </div>
					<div class="table-pagination pull-right">
						<?php echo paginate($reload, $page, $total_pages, $adjacents);?>
					</div>	
    </div>
</div>
 
 

					
					<p>&nbsp;</p>
 
 
 
<?PHP
}
?>
<script type="text/javascript">
$(document).ready(function(){
$(".group1").colorbox({rel:'group1', width:"100%", height:"100%"});
});

</script>

