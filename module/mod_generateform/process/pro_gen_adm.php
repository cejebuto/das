<?php 

#INCLUIMOS LA FUNCION QUE CREA DIRECTORIOS Y ARCHIVOS
include_once ($_SERVER['DOCUMENT_ROOT']."/module/mod_generateform/function/fun_create_file.php");

$i=0;
$k=0;
#RECORREMOS LA TABLA DE CAMPOS Y LA GUARDAMOS EN VARIABLES LOCALES
while ($row_list_field=mysqli_fetch_array($sql_list_field)) {   
$BYB_FIELD_ID[$i]= $row_list_field['fie_id'];
$AUX_BYB_FIELD_COD[$i]= $row_list_field['fie_cod_com'];
$i++;
$k++;
} //mysqli_free_result($sql_list_field);
 
#VARIABLE PARA CREAR EL FORMULARIO
$BYB_ADM_ALL ="";
$BYB_ADM_VALIDATION ="";
$BYB_ADM_LIMPIEZA="";

#VARIABLES DE AYUDA QUE CONTIENEN LOS SCRIPT Y COMPLEMENTOS
$WRAP_INCLUDE_PHP="";
$CONTEN_PHP=0;

#GENERAMOS EL CODIGO DEL FORMULARIO
for ($i=1;$i<=$_SESSION['CONTADOR'];$i++){
	for ($j=0; $j <$k ; $j++) { 
		if ($BYB_FIELD_ID[$j]==$_SESSION['FORMULARIO'][$i][2]) {


			#TOMAMOS EL CODIGO ORIGINAL PARA REEMPLAZARLO
			$BYB_FIELD_COD[$j] = $AUX_BYB_FIELD_COD[$j];

			#REEMPLAZAMOS LAS @ DEL CODIGO POR COMILLAS SIMPLES
			$BYB_FIELD_COD[$j] = str_replace("@","'", $BYB_FIELD_COD[$j]);

			#REEMPLAZAMOS LAS VARIABLES CON {} , POR LAS VARIABLES TRAIDAS DESDE EL FORMULARIO
			$BYB_FIELD_COD[$j] = str_replace("{lab_sis}",$_SESSION['FORMULARIO'][$i][0],$BYB_FIELD_COD[$j]);
			$BYB_FIELD_COD[$j] = str_replace("{lab_use}",$_SESSION['FORMULARIO'][$i][1],$BYB_FIELD_COD[$j]);
			
			#CREAMOS PARA REVISAR LA EXISTENCIA DE LA VARIABLE
			$BYB_EXISTENCIA_VAR = '	if (!isset($_POST['."'".$_SESSION['FORMULARIO'][$i][0]."'".'])){include_once ($_SERVER['."'".'DOCUMENT_ROOT'."'".']."/aymsite/aym_component/aym_security/aym_hacker_alert.php");}';

			#EMPEZAMOS A ARMAR EL CODIGO DEL FORMULARIO
			$BYB_ADM_VALIDATION =$BYB_ADM_VALIDATION."\n".$BYB_EXISTENCIA_VAR;

			#CREAMOS PARA LIMPIAR LA VARIABLE
			$BYB_LIMPIEZA_VAR = '	$_POST['."'".$_SESSION['FORMULARIO'][$i][0]."'".']=aym_clean_string($_POST['."'".$_SESSION['FORMULARIO'][$i][0]."'".']);';

			#EMPEZAMOS A ARMAR EL CODIGO DEL FORMULARIO
			$BYB_ADM_LIMPIEZA =$BYB_ADM_LIMPIEZA."\n".$BYB_LIMPIEZA_VAR; 

			#EMPEZAMOS A ARMAR EL CODIGO DEL FORMULARIO
			$BYB_ADM_ALL =$BYB_ADM_ALL."\n".$BYB_FIELD_COD[$j]; 
		}
	}
 }

#CAABEZERA DEL CODIGO LLENAR LOS INCLUDES Y LOS JS SI SON NECESARIOS! PREFERIBLEMENTE, LLAMAR ESTO DE UNA BASE DE DATOS
$BYB_HTML_ALL = '<?php # **************************** AYM EASY SITE V: 5.0 ********************
# COMPONENTE PARA ADMINISTRAR --> @TITULO@
# AYMSOFT SAS
# @FECHA@

	session_start(); 
	
	# ZONA HORARIA
	date_default_timezone_set('."'"."America/Bogota"."'".');
	
	#VALIDACIÓN --> PARA INGRESAR AL APLICATIVO
	include ($_SERVER['."'".'DOCUMENT_ROOT'."'".']."/aymsite/aym_component/aym_security/aym_validate_security.php");
	
	echo '."'".'<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />'."'".';
	echo '."'".'<center><img src="/aymsite/aym_image/aym_loading.gif" width="320" height="320" /></center>'."'".';

{ALL_OPT}
';

#CREAMOS EL MODULO ADM DE INSERTAR
$BYB_OPT_ADD = '
/*============================== AGREGAR @TITULO@ ==============================*/

if ($_POST['."'".'action'."'".'] == '."'".'@VALUE@'."'".') { # @VALUE@ -->  INSERTAR --> @TITULO@

	# FUNCION --> LIMPIA CADENAS
	include_once ($_SERVER['."'".'DOCUMENT_ROOT'."'".']."/aymsite/aym_function/aym_string/aym_fun_clean_string.php");
	
	# VARIABLE --> DETERMINAR LA REDIRECION 
	$aym_url = "/aymsite/adm@FORMULARIO@/aym_add_@FORMULARIO@";
	
	# VALIDACION ---> EXISTENCIA DE LAS VARIABLES
	{ALL_SUB_OPT_VALIDATION}


	# VALIDACION ---> INTEGRIDAD DE LAS VARIABLES
	{ALL_SUB_OPT}


	# VARIABLE --> LIMPIEZA DE VARIABLES
	{ALL_SUB_OPT_LIMPIEZA}


	# COMPONENTE QUE PROCESA LOS DATOS EN LA BD
	include_once ($_SERVER['."'".'DOCUMENT_ROOT'."'".']."/aymsite/aym_sql/aym_@FORMULARIO@/aym_sql_add_@FORMULARIO@.php"); 
	
	# VALIDACION --> HIZO O NO EL PROCESO EL PROCESO
	if ($ReturnStatus == "0") { # 0 --> PROCESADO SATISFACTORIAMENTE 
		# REDIRECCION --> LISTADO DE @TITULO@ 
		$aym_url="/aymsite/adm@FORMULARIO@/aym_add_@FORMULARIO@";	
		# INCLUSIÓN --> COMPONENTE QUE MUESTRA LOS MENSAJES
        include_once ($_SERVER['."'".'DOCUMENT_ROOT'."'".']."/aymsite/aym_component/aym_message/aym_show_message.php");
	}
	
	if ($ReturnStatus == "1") { # 1 --> NO PROCESADO
		# REDIRECCION --> AGREGAR @TITULO@
		$aym_url="/aymsite/adm@FORMULARIO@/aym_add_@FORMULARIO@";	
		# INCLUSIÓN --> COMPONENTE QUE MUESTRA LOS MENSAJES
        include_once ($_SERVER['."'".'DOCUMENT_ROOT'."'".']."/aymsite/aym_component/aym_message/aym_show_message.php");
	} 
	
}
';

#CREAMOS EL MODULO ADM DE EDITAR
$BYB_OPT_ADD = $BYB_OPT_ADD.'
/*============================== EDITAR @TITULO@ ==============================*/

if ($_POST['."'".'action'."'".'] == '."'".'@VALUE@'."'".') { # @VALUE@ -->  INSERTAR --> @TITULO@

	# FUNCION --> LIMPIA CADENAS
	include_once ($_SERVER['."'".'DOCUMENT_ROOT'."'".']."/aymsite/aym_function/aym_string/aym_fun_clean_string.php");
	
	# VARIABLE --> DETERMINAR LA REDIRECION 
	$aym_url = "/aymsite/adm@FORMULARIO@/aym_edit_@FORMULARIO@";
	
	# VALIDACION ---> EXISTENCIA DE LAS VARIABLES
	{ALL_SUB_OPT_VALIDATION}


	# VALIDACION ---> INTEGRIDAD DE LAS VARIABLES
	{ALL_SUB_OPT}


	# VARIABLE --> LIMPIEZA DE VARIABLES
	{ALL_SUB_OPT_LIMPIEZA}


	# COMPONENTE QUE PROCESA LOS DATOS EN LA BD
	include_once ($_SERVER['."'".'DOCUMENT_ROOT'."'".']."/aymsite/aym_sql/aym_@FORMULARIO@/aym_sql_edit_@FORMULARIO@.php"); 
	
	# VALIDACION --> HIZO O NO EL PROCESO EL PROCESO
	if ($ReturnStatus == "0") { # 0 --> PROCESADO SATISFACTORIAMENTE 
		# REDIRECCION --> LISTADO DE @TITULO@ 
		$aym_url="/aymsite/adm@FORMULARIO@/aym_edit_@FORMULARIO@";	
		# INCLUSIÓN --> COMPONENTE QUE MUESTRA LOS MENSAJES
        include_once ($_SERVER['."'".'DOCUMENT_ROOT'."'".']."/aymsite/aym_component/aym_message/aym_show_message.php");
	}
	
	if ($ReturnStatus == "1") { # 1 --> NO PROCESADO
		# REDIRECCION --> AGREGAR @TITULO@
		$aym_url="/aymsite/adm@FORMULARIO@/aym_edit_@FORMULARIO@";	
		# INCLUSIÓN --> COMPONENTE QUE MUESTRA LOS MENSAJES
        include_once ($_SERVER['."'".'DOCUMENT_ROOT'."'".']."/aymsite/aym_component/aym_message/aym_show_message.php");
	} 
	
}
?> ';
#INCLUIMOS TODOS LOS ARCHIVOS PHP QUE REQUIEREN PARA LISTARSE
if ($CONTEN_PHP==1){$WRAP_INCLUDE_PHP = $WRAP_INCLUDE_PHP."\n"."#TENGO PHP";}else{$WRAP_INCLUDE_PHP="";}

#CERRAMOS TODO EL SCRIPT CUANDO INSERTEMOS TODOS LOS NECESARIOS
if ($CONTEN_SCRIPT==1){$WRAP_ALL_ESCRIPT = $WRAP_ALL_ESCRIPT."\n"."</script>";}else{$WRAP_ALL_ESCRIPT="";}

#REEMPLAZAMOS LOS ELEMENTOS PARA TENER EL TEXTO HTML COMPLETO
$patterns = array();
$patterns[0] = '/{ALL_OPT}/';
$patterns[1] = '/@TITULO@/';
$patterns[2] = '/@FORMULARIO@/';
$patterns[3] = '/@VALUE@/';
$patterns[4] = '/@FECHA@/';
$patterns[5] = '/{INCLUDESPHP}/';
$patterns[6] = '/{ALL_SUB_OPT_VALIDATION}/';
$patterns[7] = '/{ALL_SUB_OPT_LIMPIEZA}/';
$patterns[8] = '/{ALL_SUB_OPT}/';
 $replacemets = array();
$replacements[0] = $BYB_OPT_ADD;
$replacements[1] = $_SESSION['TITLE_USER'];
$replacements[2] = $_SESSION['TITLE_SISTEM'];
$replacements[3] = $_SESSION['VALUE_SISTEM'];
$replacements[4] = date('l jS \of F Y h:i:s A');
$replacements[5] = $WRAP_INCLUDE_PHP;
$replacements[6] = $BYB_ADM_VALIDATION;
$replacements[7] =  $BYB_ADM_LIMPIEZA;
$replacements[8] =  $BYB_ADM_ALL;
 
#REEMPLAZAMOS TODAS LAS VARIABLES PARA GENERAR EL DOCUMENTO 
$BYB_HTML_ALL = preg_replace($patterns, $replacements, $BYB_HTML_ALL);

#PREPARAMOS EL ARCHIVO PARA CREARLO
#$BYB_HTML_ALL = str_replace('"','\"', $BYB_HTML_ALL);

#echo "<pre><xmp>".$BYB_HTML_ALL."</xmp></pre>";exit;

 		/*$_SESSION['FORMULARIO'][$i][0]=$_POST["label_sistema".$i];
		$_SESSION['FORMULARIO'][$i][1]=$_POST["label_usuario".$i];
		$_SESSION['FORMULARIO'][$i][2]=$_POST["label_tipo".$i];*/

$BYB_NAM_OPT = "aym_component";
$BYB_DIR = "aym_".$_SESSION['TITLE_SISTEM'];
$BYB_NAM_FILE ="aym_adm_".$_SESSION['TITLE_SISTEM'];
#$BYB_MAIN_DIR = $_SERVER['DOCUMENT_ROOT']."/module/mod_generateform/modules_generated/".$BYB_NAM_MOD."/".$BYB_NAM_OPT."/".$BYB_DIR."/";

create_file ($_SESSION['BYB_NAM_MOD'], $BYB_NAM_OPT, $BYB_DIR, $BYB_NAM_FILE, $BYB_HTML_ALL);
#create_file("hello");

#echo "--->".$BYB_MAIN_DIR."<BR>";


 ?>