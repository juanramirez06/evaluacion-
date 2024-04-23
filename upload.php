<?php
include "conex2x.php";
$route = "file-upload/";
$route = $route.basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'],$route);
$ip = $_SERVER['REMOTE_ADDR'];
$sql = "select id_foto from  fotos order by id_foto desc limit 1";
$conlog = $mysqli->query($sql);
$reglog = $conlog->fetch_assoc();
$prox_id = $reglog['id_foto'] + 1;

$sql = "INSERT INTO  fotos   (id_foto,id_propiedad,ruta_foto,eli_foto, ip_foto) ";
$sql .= "VALUE ('$prox_id','0','$route','0','$ip')";
$grabar = $mysqli->query($sql);


