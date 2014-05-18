<?php

if (isset($_POST['fie_nam'])){}#Destruimos session y salimos inmediatamente
if (isset($_POST['fie_cod_add'])){}#Destruimos session y salimos inmediatamente
if (isset($_POST['fie_cod_edi'])){}#Destruimos session y salimos inmediatamente
if (isset($_POST['fie_cod_com'])){}#Destruimos session y salimos inmediatamente
if (isset($_POST['fie_cod_js'])){}#Destruimos session y salimos inmediatamente


#REEMPLAZAMOS LAS COMILLAS SIMPLES POR OTRO CARACTER @
$_POST['fie_cod_add'] = str_replace("'","@", $_POST['fie_cod_add']);
$_POST['fie_cod_edi'] = str_replace("'","@", $_POST['fie_cod_edi']);
$_POST['fie_cod_com'] = str_replace("'","@", $_POST['fie_cod_com']);
$_POST['fie_cod_js'] = str_replace("'","@", $_POST['fie_cod_js']);

require $_SERVER['DOCUMENT_ROOT']."/module/mod_field/sql/sql_update_field.php";

if(!isset($_SESSION)){
 session_start();
}
$_SESSION['suboption']="for_list_field";
header('Location: /');
?>