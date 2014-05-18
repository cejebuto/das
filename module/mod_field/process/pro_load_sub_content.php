<?php 
session_start();
unset($_SESSION['suboption']);
unset($_SESSION['itemid']);
$_SESSION['itemid']=$_POST['itemid'];
$_SESSION['suboption']=$_POST['suboption'];
?>