<?php 
if(!isset($_SESSION)){
 session_start();
}
if(!isset($_SESSION['suboption'])){
 $_SESSION['suboption']="for_gen_form";
}
?>

<?php
require $_SERVER['DOCUMENT_ROOT']."/module/mod_".$_SESSION['option']."/form/".$_SESSION['suboption'].".php";

?>

	
	<!-- inline scripts related to this page -->