<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/process/pro_connect/pro_connect.php';
$connectdb=connecttodb(); 
mysqli_set_charset($connectdb, "utf8");

$query = " INSERT INTO `byb_field`(`fie_nam`,`fie_cod_add`,`fie_cod_edi`,`fie_cod_com`,`fie_cod_js`)
 VALUES ('".$_POST['fie_nam']."','".$_POST['fie_cod_add']."','".$_POST['fie_cod_edi']."','".$_POST['fie_cod_com']."','".$_POST['fie_cod_js']."')";

$sql_field = mysqli_query($connectdb,$query) or die(mysqli_error($connectdb));


mysqli_free_result($sql_field);
mysqli_close($connectdb);
?>