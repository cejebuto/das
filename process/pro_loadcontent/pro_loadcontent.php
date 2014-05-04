<?php 
session_start();
$_SESSION['option']=$_POST['option'];
echo $_SESSION['option'];
?>