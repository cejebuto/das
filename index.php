<?php 
session_start();
require_once 'config.php';?>
<html>
	<head>
  	<title>Controladores</title>
    <script src="ajs/jquery.js"></script>
    <script src="ajs/bootstrap.min.js"></script>
    <script src="ajs/angular.min.js"></script>
    <script src="ajs/angular-route.min.js"></script>
    <script src="ajs/angular-locale_es-es.js"></script>
    <?php
    if (!isset($_SESSION['id'])){
    echo '<script src="ajs/urlredirect.js"></script>';
    }else{
    echo '<script src="ajs/urlredirectmain.js"></script>'; 
    }
    ?>
	</head>
  <body ng-app="Adminsgde">
    <div>
      <div ng-view></div>
    </div>
  </body>
</html>