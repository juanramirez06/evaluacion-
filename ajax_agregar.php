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
if (trim($clave1) == trim($clave2))
{

			$fecha = date("Y-m-d H:i:s");
			$solofecha = date("Y-m-d");
			$solohora = date("H:i:s");
			$idusu = $_SESSION["id_usuario"];
			

			$sql = "SELECT id_tercero FROM terceros WHERE cel_tercero = '$phone' AND eli_tercero = '0'";
			$conter = $mysqli->query($sql);
			$canter = mysqli_num_rows($conter);
			if ($canter == 0)
			{	
				if (strlen(trim($_POST['nombre'])) == 0)
				{
					echo "DEBE COLOCAR EL NOMBRE DEL CONTACTO";
					exit;
					
				}
				if (strlen(trim($_POST['apellido'])) == 0)
				{
					echo "DEBE COLOCAR EL APELLIDO DEL CONTACTO";
					exit;
					
				}				

			
			
					$sql = "select id_tercero from terceros order by id_tercero desc limit 1";
					$conlog2 = $mysqli->query($sql);
					$reglog2 = $conlog2->fetch_assoc();
					$prox_id2 = $reglog2['id_tercero'] + 1;

					$sql = "INSERT INTO terceros  (id_tercero, nit_tercero, nom_tercero, ape_tercero, est_tercero, eli_tercero, password_tercero, email_tercero, cel_tercero) ";
					$sql .= " VALUE ('$prox_id2','0','$nombre','$apellido','1','0','$clave1','$email','$phone')";
					$grabar = $mysqli->query($sql);			
			}
			else
			{
				$regter = $conter->fetch_assoc();
				$prox_id2 = $regter['id_tercero'];
			}
			
			 
			
			$sql = "select id_propiedad from propiedades order by id_propiedad desc limit 1";
			$conlog = $mysqli->query($sql);
			$reglog = $conlog->fetch_assoc();
			$prox_id = $reglog['id_propiedad'] + 1;
	 
			$sql = "INSERT INTO propiedades   (id_propiedad,titulo_propiedad,id_servicio,dir_propiedad,barrio_propiedad,id_ciudad,id_tipo,est_propiedad,eli_propiedad,id_tercero,fec_propiedad,valor_propiedad,ruta_video, celular, ip_propiedad) ";
			$sql .= "                   VALUE ('$prox_id','$titulo','$servicio','$direccion','$barrio','$ciudad','$tipo','1','0','$prox_id2','$fecha','$precio','','$phone','$ip')";
			echo $sql;
			if ($grabar = $mysqli->query($sql))
			{
				$sql = "UPDATE fotos SET id_propiedad = '$prox_id' WHERE id_propiedad = 0 AND ip_foto = '$ip'";
				$grabar = $mysqli->query($sql);
				$sql = "UPDATE detalles SET id_propiedad = '$prox_id' WHERE id_propiedad = 0 AND ip_detalle = '$ip'";
				$grabar = $mysqli->query($sql);
				
				
				echo "GRABO CORRECTAMENTE";
				
			}

			
}
else
{
	echo "REVISE LAS CLAVES NO COINCIDEN";
}	
exit;
?>
