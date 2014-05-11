<?php

if (isset($_POST['fie_nam'])){}#Destruimos session y salimos inmediatamente
if (isset($_POST['fie_cod'])){}#Destruimos session y salimos inmediatamente

require $_SERVER['DOCUMENT_ROOT']."/module/mod_field/sql/sql_update_field.php";

if(!isset($_SESSION)){
 session_start();
}
$_SESSION['suboption']="for_list_field";
header('Location: /');
?>