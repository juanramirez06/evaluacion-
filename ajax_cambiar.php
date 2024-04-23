<?PHP
set_time_limit(0);
error_reporting (5);
session_name();
session_start();
include "conex2x.php";

$cel = $_REQUEST['cel'];
$password = $_REQUEST['password'];
$ip = $_SERVER['REMOTE_ADDR'];
$id_propiedad = $_SESSION["id_propiedadVyP"];
$fecha = date("Y-m-d H:i:s");
$solofecha = date("Y-m-d");
$solohora = date("H:i:s");
$idusu = $_SESSION["id_usuario"];
		
$sql = "SELECT est_propiedad FROM propiedades WHERE id_propiedad = '$id_propiedad'";
$conest = $mysqli->query($sql);
$regest = $conest->fetch_assoc();

if ($regest['est_propiedad'] == 1)
{
	$estado = 0;	
	$img = "<img src='img/inactivo.png' width='72px' height='72px' />";
}
else
{
	$estado = 1;
	$img = "<img src='img/activo.png' width='72px' height='72px' />";
}	
$sql = "UPDATE propiedades SET est_propiedad = '$estado' WHERE id_propiedad = '$id_propiedad'";
$grabar = $mysqli->query($sql);
echo $img;
exit;
?>
