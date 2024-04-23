<?PHP
set_time_limit(0);
error_reporting (5);
session_name();
session_start();
include "conex2x.php";

$id_carac = $_POST['carac'];
$valor = $_POST['cantidad'];
$ip = $_SERVER['REMOTE_ADDR'];
$fecha = date("Y-m-d H:i:s");
$solofecha = date("Y-m-d");
$solohora = date("H:i:s");
			
 $sql = "SELECT id_detalle FROM detalles WHERE id_propiedad = '0' AND  ip_detalle = '$ip' AND id_carac = '$id_carac'";
 $concan = $mysqli->query($sql);
 $cancan = mysqli_num_rows($concan);
 if ($cancan == 0)
 {
			
			$sql = "select id_detalle from detalles order by id_detalle desc limit 1";
			$conlog = $mysqli->query($sql);
			$reglog = $conlog->fetch_assoc();
			$prox_id = $reglog['id_detalle'] + 1;
	 
			$sql = "INSERT INTO detalles (id_detalle, id_propiedad, id_carac, can_carac, obs_detalle, eli_detalle, ip_detalle) ";
			$sql .= "                   VALUE ('$prox_id','0', '$id_carac', '$valor', '', '0', '$ip' )";
			echo $sql;
			if ($grabar = $mysqli->query($sql))
			{
				echo "GRABO CORRECTAMENTE";
			}
			else
			{
				echo "ERROR, AL GUARDAR EN LA BASE DE DATOS";
			}
 }
 else
 {
	 echo "NO PUEDE REPETIR UNA CARACTERISTICA EN LA MISMA PROPIEDAD";
	 
 }

			
 
exit;
?>
