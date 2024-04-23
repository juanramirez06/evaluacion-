<?PHP
set_time_limit(0);
error_reporting (5);
session_name();
session_start();
include "conex2x.php";

$cel = $_REQUEST['cel'];
$password = $_REQUEST['password'];
$ip = $_SERVER['REMOTE_ADDR'];

$fecha = date("Y-m-d H:i:s");
$solofecha = date("Y-m-d");
$solohora = date("H:i:s");
$idusu = $_SESSION["id_usuario"];
		
	$sql = "select id_tercero FROM terceros WHERE cel_tercero = '$cel' AND password_tercero = '$password'";
	$conlog = $mysqli->query($sql);
	$canlog = mysqli_num_rows($conlog);
 	if ($canlog == 0)
	{
		$sw = "0";
		$_SESSION["autenticadoVyP"]= "";
		$_SESSION["id_terceroVyP"]= "";
	}
	else
	{
		$reglog = $conlog->fetch_assoc();
		$id_tercero = $reglog['id_tercero'];
		$_SESSION["autenticadoVyP"]= "Autenticado";
		$_SESSION["id_terceroVyP"]= $id_tercero;
		$sw = "1";
	}
echo trim($sw);
exit;
?>
