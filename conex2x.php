<?PHP
$hostname = 'localhost';
$database = "inmobiliaria"; //$_SESSION["bd_licencia"]; //
$_SESSION['base1'] = $database;
$username = 'root';
$password = '';	
$mysqli = new mysqli($hostname, $username,$password, $database);
	if ($mysqli -> connect_errno) 
		{
			die( "Fallo la conexion a MySQL: (".$mysqli->mysqli_connect_errno().") ".$mysqli->mysqli_connect_error());
		}		
	date_default_timezone_set("America/Bogota");	
 ?>