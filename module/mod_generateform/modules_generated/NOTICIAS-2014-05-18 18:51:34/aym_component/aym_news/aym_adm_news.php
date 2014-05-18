<?php # **************************** AYM EASY SITE V: 5.0 ********************
# COMPONENTE PARA ADMINISTRAR --> NOTICIAS
# AYMSOFT SAS
# Sunday 18th of May 2014 06:51:34 PM

	session_start(); 
	
	# ZONA HORARIA
	date_default_timezone_set('America/Bogota');
	
	#VALIDACIÓN --> PARA INGRESAR AL APLICATIVO
	include ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_component/aym_security/aym_validate_security.php");
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	echo '<center><img src="/aymsite/aym_image/aym_loading.gif" width="320" height="320" /></center>';


/*============================== AGREGAR NOTICIAS ==============================*/

if ($_POST['action'] == 'I') { # I -->  INSERTAR --> NOTICIAS

	# FUNCION --> LIMPIA CADENAS
	include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_function/aym_string/aym_fun_clean_string.php");
	
	# VARIABLE --> DETERMINAR LA REDIRECION 
	$aym_url = "/aymsite/admnews/aym_add_news";
	
	# VALIDACION ---> EXISTENCIA DE LAS VARIABLES
	
	if (!isset($_POST['use_nam'])){include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_component/aym_security/aym_hacker_alert.php");}


	# VALIDACION ---> INTEGRIDAD DE LAS VARIABLES
	
	if (strlen($_POST['use_nam'])< 3){ $Msg = "Nombre NO valido"; include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_component/aym_message/aym_show_message_redirect.php");}


	# VARIABLE --> LIMPIEZA DE VARIABLES
	
	$_POST['use_nam']=aym_clean_string($_POST['use_nam']);


	# COMPONENTE QUE PROCESA LOS DATOS EN LA BD
	include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_sql/aym_news/aym_sql_add_news.php"); 
	
	# VALIDACION --> HIZO O NO EL PROCESO EL PROCESO
	if ($ReturnStatus == "0") { # 0 --> PROCESADO SATISFACTORIAMENTE 
		# REDIRECCION --> LISTADO DE NOTICIAS 
		$aym_url="/aymsite/admnews/aym_add_news";	
		# INCLUSIÓN --> COMPONENTE QUE MUESTRA LOS MENSAJES
        include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_component/aym_message/aym_show_message.php");
	}
	
	if ($ReturnStatus == "1") { # 1 --> NO PROCESADO
		# REDIRECCION --> AGREGAR NOTICIAS
		$aym_url="/aymsite/admnews/aym_add_news";	
		# INCLUSIÓN --> COMPONENTE QUE MUESTRA LOS MENSAJES
        include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_component/aym_message/aym_show_message.php");
	} 
	
}

/*============================== EDITAR NOTICIAS ==============================*/

if ($_POST['action'] == 'I') { # I -->  INSERTAR --> NOTICIAS

	# FUNCION --> LIMPIA CADENAS
	include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_function/aym_string/aym_fun_clean_string.php");
	
	# VARIABLE --> DETERMINAR LA REDIRECION 
	$aym_url = "/aymsite/admnews/aym_edit_news";
	
	# VALIDACION ---> EXISTENCIA DE LAS VARIABLES
	
	if (!isset($_POST['use_nam'])){include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_component/aym_security/aym_hacker_alert.php");}


	# VALIDACION ---> INTEGRIDAD DE LAS VARIABLES
	
	if (strlen($_POST['use_nam'])< 3){ $Msg = "Nombre NO valido"; include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_component/aym_message/aym_show_message_redirect.php");}


	# VARIABLE --> LIMPIEZA DE VARIABLES
	
	$_POST['use_nam']=aym_clean_string($_POST['use_nam']);


	# COMPONENTE QUE PROCESA LOS DATOS EN LA BD
	include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_sql/aym_news/aym_sql_edit_news.php"); 
	
	# VALIDACION --> HIZO O NO EL PROCESO EL PROCESO
	if ($ReturnStatus == "0") { # 0 --> PROCESADO SATISFACTORIAMENTE 
		# REDIRECCION --> LISTADO DE NOTICIAS 
		$aym_url="/aymsite/admnews/aym_edit_news";	
		# INCLUSIÓN --> COMPONENTE QUE MUESTRA LOS MENSAJES
        include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_component/aym_message/aym_show_message.php");
	}
	
	if ($ReturnStatus == "1") { # 1 --> NO PROCESADO
		# REDIRECCION --> AGREGAR NOTICIAS
		$aym_url="/aymsite/admnews/aym_edit_news";	
		# INCLUSIÓN --> COMPONENTE QUE MUESTRA LOS MENSAJES
        include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_component/aym_message/aym_show_message.php");
	} 
	
}
?> 
