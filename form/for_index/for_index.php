<?php session_start() ?>
<html lang="es">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Administrador de Contenidos</title>
	<meta name="description" content="Sistema de Gestión Documental , Administrador de Contenidos">
	<meta name="author" content="Cesar Buelvas">
	<meta name="keyword" content="SGD, SGDE, Sistema Gestion Documental, Documentos, Contenidos, Administrador">
	<!-- end: Meta -->
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	<!-- start: CSS -->
	<link href="/style/css/bootstrap.min.css" rel="stylesheet">
	<link href="/style/css/style.min.css" rel="stylesheet">
	<link href="/style/css/retina.min.css" rel="stylesheet">
	<link href="/style/css/print.css" rel="stylesheet" type="text/css" media="print"/>
	<!-- end: CSS -->
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="/style/js/respond.min.js"></script>
		
	<![endif]-->
	<!-- start: Favicon and Touch Icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/style/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/style/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/style/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/style/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="/style/ico/favicon.png">
	<!-- end: Favicon and Touch Icons -->	
</head>
<body>
	<!-- start: Header -->
	<header class="navbar navbar-fixed-top" style="z-index:20">
	<?php require $_SERVER['DOCUMENT_ROOT']."/form/for_header/for_header.php";?>
	</header>
	<!-- end: Header -->	
<div class="container" style="margin-top:40px">
		<div class="row">
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="col-lg-2 col-sm-1 " style="z-index:10">
				<div class="sidebar-nav nav-collapse collapse navbar-collapse">
					<ul class="nav main-menu">
					<?php require $_SERVER['DOCUMENT_ROOT']."/form/for_menu/for_menu.php";?>
					</ul>
				</div>
				<a href="#" id="main-menu-min" class="full visible-md visible-lg"><i class="fa fa-angle-double-left"></i></a>
			</div>
			<!-- end: Main Menu -->
			<!-- start: Content -->
			<div id="content" class="col-lg-10 col-sm-11" style="margin-top:-20px">
				<div id="contenmenu"class="row">
					<?php if(!isset($_SESSION['option'])){$_SESSION['option']='dashboard';}
				 require $_SERVER['DOCUMENT_ROOT']."/module/mod_".$_SESSION['option']."/mod_".$_SESSION['option'].".php";?>	
				</div><!--/row-->
			</div>
			<!-- end: Content -->
		</div><!--/row-->		
	</div><!--/container-->
	<div class="clearfix"></div>
	<footer id="footer"class="footer">
	<?php require $_SERVER['DOCUMENT_ROOT']."/form/for_footer/for_footer.php";?>
	</footer>
   <script src="/style/js/jquery-2.1.0.min.js"></script>
	<!--<![endif]-->
	<!--[if IE]>
		<script src="/style/js/jquery-1.11.0.min.js"></script>
	<![endif]-->
	<!--[if !IE]>-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='/style/js/jquery-2.1.0.min.js'>"+"<"+"/script>");
		</script>
	<!--<![endif]-->
	<!--[if IE]>
		<script type="text/javascript">
	 	window.jQuery || document.write("<script src='/style/js/jquery-1.11.0.min.js'>"+"<"+"/script>");
		</script>
	<![endif]-->
	<script src="/style/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="/style/js/bootstrap.min.js"></script>
	<!-- page scripts -->
	<script src="/style/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="/style/js/fullcalendar.min.js"></script>
	<!-- theme scripts -->
	<script src="/style/js/custom.min.js"></script>
	<script src="/style/js/core.min.js"></script>
	<!-- inline scripts related to this page -->
	<script src="/style/js/pages/calendar.js"></script>
	<?php #Incluyo los estilos para el contenido de los contenidos principales?>
	<script src="/ajs/js_content/js_content.js"></script>
	<!-- end: JavaScript-->
</body>
</html>