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
	
	
		$carac = $_REQUEST['carac'];
		$cantidad = $_REQUEST['cantidad'];

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';	
if($action == 'ajax'){

include 'pagination.php'; //incluir el archivo de paginación	
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 20; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		
		

		$sql = "SELECT id_detalle FROM detalles WHERE eli_detalle = '0' AND id_propiedad = 0 AND id_detalle > 0 ";
 		$conreg = $mysqli->query($sql);
		$numrows = mysqli_num_rows($conreg);
		$total_pages = ceil($numrows/$per_page);
		$reload = 'submit_property.php';
 
	
	$solofecha = date("Y-m-d");
	$sql = "SELECT detalles.*, caracteristicas.nom_carac FROM detalles INNER JOIN caracteristicas ON detalles.id_carac = caracteristicas.id_carac WHERE detalles.id_propiedad = '0' AND detalles.eli_detalle = '0' AND detalles.id_detalle > 0  ";
	$sql .= " ORDER BY detalles.id_carac ASC LIMIT $offset,$per_page";
	$buscar = $mysqli->query($sql);
	
	
?>
 
        <!-- Main title -->
 <!--       <ul class="list-inline-listing filters filters-listing-navigation">
            <li class="active btn filtr-button filtr" data-filter="all">All</li>
            <li data-filter="1" class="btn btn-inline filtr-button filtr">House</li>
            <li data-filter="2" class="btn btn-inline filtr-button filtr">Office</li>
            <li data-filter="3" class="btn btn-inline filtr-button filtr">Apartment</li>
            <li data-filter="4" class="btn btn-inline filtr-button filtr">Residential</li>
        </ul> --->

		
 
			<?php
			$item = 0;
			while ($reg = $buscar->fetch_assoc())
			{
				$item = $item + 1;
				$id_propiedad = $reg['id_propiedad'];
				echo $reg['nom_carac']."=".$reg['can_carac'].";";
	 
			?>

				<?php
			}
				?>
 
 
 
 
 
					
					<p>&nbsp;</p>
 
 
 
<?PHP
}
?>
<script type="text/javascript">
$(document).ready(function(){
$(".group1").colorbox({rel:'group1', width:"100%", height:"100%"});
});

</script>

