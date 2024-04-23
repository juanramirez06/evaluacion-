<?PHP
set_time_limit(0);
error_reporting (5);
session_name();
session_start();
include "conex2x.php";

$titulo = $_POST['titulo'];
$servicio = $_POST['servicio'];
$tipo = $_POST['tipo'];
$precio = $_POST['precio'];
$direccion = $_POST['direccion'];
$barrio = $_POST['barrio'];
$ciudad = $_POST['ciudad'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$clave1 = $_POST['clave1'];
$clave2 = $_POST['clave2'];
$ip = $_SERVER['REMOTE_ADDR'];
$id_propiedad = $_SESSION["id_propiedadVyP"];
if (strlen(trim($clave2)) > 0)
{	
if (trim($clave1) == trim($clave2))
{

	$id_tercero = $_SESSION["id_terceroVyP"];
	$sql = "SELECT password_tercero FROM terceros WHERE id_tercero = '$id_tercero'";
	

	
	
	$conter = $mysqli->query($sql);
	$regter = $conter->fetch_assoc();
	$claveter = $regter['password_tercero'];
	if (trim($claveter) == trim($clave1))
	{
				$fecha = date("Y-m-d H:i:s");
				$solofecha = date("Y-m-d");
				$solohora = date("H:i:s");
				$sql = "UPDATE propiedades SET titulo_propiedad = '$titulo',id_servicio = '$servicio',dir_propiedad = '$direccion',barrio_propiedad = '$barrio',id_ciudad = '$ciudad',id_tipo = '$tipo', valor_propiedad = '$precio' WHERE id_propiedad = '$id_propiedad'";
				if ($grabar = $mysqli->query($sql))
				{
					echo "GRABO CORRECTAMENTE";
				}
				else
				{
					echo "ERROR AL GRABAR ".$sql;
				}
	}
	else
	{
		echo "LA CLAVE NO COINCIDE, POR FAVOR INGRESE SU CLAVE CORRECTAMENTE";
	}
}
else
{
	echo "REVISE LAS CLAVES NO COINCIDEN";
}
}
else
{
	echo "DEBE DIGITAR LAS CLAVES";
}	
exit;
?>
