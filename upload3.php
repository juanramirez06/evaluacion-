<?php
set_time_limit(0);
error_reporting (5);
session_name();
session_start();
include "conex2x.php";
$route = "file-upload/";
$route = $route.basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'],$route);
$ip = $_SERVER['REMOTE_ADDR'];
$id_propiedad = $_SESSION["id_propiedadVyP"];
$sql = "select id_foto from  fotos order by id_foto desc limit 1";
$conlog = $mysqli->query($sql);
$reglog = $conlog->fetch_assoc();
$prox_id = $reglog['id_foto'] + 1;

$sql = "UPDATE propiedades SET ruta_video = '$route' WHERE id_propiedad = '$id_propiedad' ";
$grabar = $mysqli->query($sql);
?>