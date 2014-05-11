<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/process/pro_connect/pro_connect.php';
$connectdb=connecttodb(); 
mysqli_set_charset($connectdb, "utf8");

$query = "SELECT `fie_id`,`fie_nam`,`fie_cod` FROM `byb_field` ";

$sql_list_field = mysqli_query($connectdb,$query) or die(mysqli_error($connectdb));



mysqli_close($connectdb);
?>