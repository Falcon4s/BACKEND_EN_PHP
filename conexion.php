<?php

$db_host = 'localhost';
$db_username = 'sysAdmin';
$db_password ='cWeCI_PVO-L9*wj[';
$db_database = 'venta de autos';

$db = new mysqli($db_host, $db_username, $db_password,$db_database);
mysqli_query($db, "SET NAMES 'utf8'");

if($db -> connect_errno > 0){
    die('No es posible conectarse a la base de datos ['. $db->content_error .']');
} else{
    echo "Conectado";
}
?>