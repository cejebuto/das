<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/process/pro_connect/pro_connect.php';
$connectdb=connecttodb(); 
mysqli_set_charset($connectdb, "utf8");

	#QUERY
$query = "SELECT `fie_id`,`fie_nam`,`fie_cod_add`,`fie_cod_edi`,`fie_cod_com`,`fie_cod_js` FROM `byb_field` WHERE `fie_id`=".$_SESSION['itemid'];


$sql_field = mysqli_query($connectdb,$query) or die(mysqli_error($connectdb));

$row_get_field = mysqli_fetch_assoc($sql_field);
mysqli_free_result($sql_field);
mysqli_close($connectdb);
?>