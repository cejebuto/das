<?php 

#LISTO TODOS LOS CAMPOS
include_once ($_SERVER['DOCUMENT_ROOT']."/module/mod_field/sql/sql_list_field.php");
$array_php = array();

$i=0;
$k=0;
#RECORREMOS LA TABLA DE CAMPOS Y LA GUARDAMOS EN VARIABLES LOCALES
while ($row_list_field=mysqli_fetch_array($sql_list_field)) {   
$BYB_FIELD_ID[$i]= $row_list_field['fie_id'];
$BYB_FIELD_COD[$i]= $row_list_field['fie_cod'];
$i++;
$k++;
} mysqli_free_result($sql_list_field);

#VARIABLE PARA CREAR EL FORMULARIO
$BYB_FOR_ALL ="";

#VARIABLES DE AYUDA PARA AGREGAR COMPLEMENTOS
$COMP_DAT_JS =0;
$COMP_ISS_NUM =0;

#VARIABLES DE AYUDA QUE CONTIENEN LOS SCRIPT Y COMPLEMENTOS
$WRAP_ALL_ESCRIPT='<script type="text/javascript">';
$WRAP_INCLUDE_SCRIPT="";
$WRAP_INCLUDE_PHP="";
$WRAP_DATE="";
$CONTEN_SCRIPT=0;
$CONTEN_PHP=0;

#VARIABLES CONTROLADORAS
$controller_dat=0;

#GENERAMOS EL CODIGO DEL FORMULARIO
for ($i=1;$i<=$_SESSION['CONTADOR'];$i++){
	for ($j=0; $j <$k ; $j++) { 
		if ($BYB_FIELD_ID[$j]==$_SESSION['FORMULARIO'][$i][2]) {

			#CONDICIONAL QUE AVISA SI TIENE DEPENDENCIAS O NO. EN CASI DE QUE SI, SE TIENE QUE LLAMAR EL MODULO QUE GENERA LAS DEPENDENCIAS
			if ($_SESSION['FORMULARIO'][$i][2]==2) {$COMP_ISS_NUM =1;}
			if ($_SESSION['FORMULARIO'][$i][2]==3) {$COMP_DAT_JS =1;}

			#REEMPLAZAMOS LAS VARIABLES CON {} , POR LAS VARIABLES TRAIDAS DESDE EL FORMULARIO
			$BYB_FIELD_COD[$j] = str_replace("{lab_sis}",$_SESSION['FORMULARIO'][$i][0],$BYB_FIELD_COD[$j]);
			$BYB_FIELD_COD[$j] = str_replace("{lab_use}",$_SESSION['FORMULARIO'][$i][1],$BYB_FIELD_COD[$j]);

			#EMPEZAMOS A ARMAR EL CODIGO DEL FORMULARIO
			$BYB_FOR_ALL =$BYB_FOR_ALL."\n".$BYB_FIELD_COD[$j]; 
		}
	}
 }

#CAABEZERA DEL CODIGO LLENAR LOS INCLUDES Y LOS JS SI SON NECESARIOS! PREFERIBLEMENTE, LLAMAR ESTO DE UNA BASE DE DATOS
$BYB_HTML_ALL = '<?php # **************************** AYM EASY SITE V: 5.1 ********************
# FORMULARIO PARA AGREGAR @TITULO@
# AYMSOFT SAS
# @FECHA@

{INCLUDESPHP}
?>
{SCRIPTJSINCLUDE}
<form action="/aymsite/action@FORMULARIO@" method="post" name="frm_add_@FORMULARIO@" id="frm_add_@FORMULARIO@" enctype="multipart/form-data">
	<fieldset class="aym_frm_content">
		{FROMS}
		<div class="aym_clear"></div> 
		<div class="aym_frm_two_col">
			<div class="aym_col_1">&nbsp;</div>
			<div class="aym_col_2"><input type="submit" value="Aceptar" class=""/> 
				<input name="action" type="hidden" id="action" value="@VALUE@" />
			</div>
			<div class="aym_clear"></div>
		</div>
    </fieldset>
</form>
<div class="aym_separator"></div>
<div class="aym_index_message">Todos los campos son obligatorios</div>
{SCRIPTJS}
';
#INCLUIMOS TODOS LOS ARCHIVOS PHP QUE REQUIEREN PARA LISTARSE
if ($CONTEN_PHP==1){$WRAP_INCLUDE_PHP = $WRAP_INCLUDE_PHP."\n"."#TENGO PHP";}else{$WRAP_INCLUDE_PHP="";}


#GENERAMOS CODIGOS DE SCRIPTS EMBEBIDOS FECHA
if ($COMP_DAT_JS>0){
	for ($i=1;$i<=$_SESSION['CONTADOR'];$i++){
		if ($_SESSION['FORMULARIO'][$i][2]==3) {
			if($controller_dat==0){
			$WRAP_DATE="
$(function(){
    $.datepicker.regional['es'] = {
        prevText: '<', prevStatus: 'Ver todo el mes anterior',
        nextText: '>', nextStatus: 'Ver todo el mes siguiente',
        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
        'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
        'Jul','Ago','Sep','Oct','Nov','Dic'],
        dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
        dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa']};
    
 $.datepicker.setDefaults($.datepicker.regional['es']);  
    
    $('#".$_SESSION['FORMULARIO'][$i][0]."').datepicker({
        dateFormat: 'yy-mm-dd', 
        changeMonth: true,
        changeYear: true,
        inline: true
    });
"; $controller_dat=1;}else{
	$WRAP_DATE=$WRAP_DATE."
    $('#".$_SESSION['FORMULARIO'][$i][0]."').datepicker({
        dateFormat: 'yy-mm-dd', 
        changeMonth: true,
        changeYear: true,
        inline: true
    });";
			}#END IF ELSE
		}#END IF SESSION
	}#END FOR
	$WRAP_DATE=$WRAP_DATE."
});
";
}#END IF DAT
#AGREGAMOS LA FEHCHA AL ESCRIPT SI LA HAY
if ($controller_dat>0){$WRAP_ALL_ESCRIPT = $WRAP_ALL_ESCRIPT."\n".$WRAP_DATE;$WRAP_INCLUDE_SCRIPT=$WRAP_INCLUDE_SCRIPT.'
<link rel="stylesheet" type="text/css" href="/aymsite/aym_css/aym_datetimepicker.css"/>'; $CONTEN_SCRIPT = 1;}	

#GENERAMOS CODIGOS DE SCRIPTS EMBEBIDOS NUMEROS
 if ($COMP_ISS_NUM>0) {
$WRAP_ALL_ESCRIPT = $WRAP_ALL_ESCRIPT."\n"."
function teclado(e) { 
    tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron =/[0-9\d]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te);
}";
$CONTEN_SCRIPT = 1;
 }


#CERRAMOS TODO EL SCRIPT CUANDO INSERTEMOS TODOS LOS NECESARIOS
if ($CONTEN_SCRIPT==1){$WRAP_ALL_ESCRIPT = $WRAP_ALL_ESCRIPT."\n"."</script>";}else{$WRAP_ALL_ESCRIPT="";}

#REEMPLAZAMOS LOS ELEMENTOS PARA TENER EL TEXTO HTML COMPLETO
$patterns = array();
$patterns[0] = '/@TITULO@/';
$patterns[1] = '/@FORMULARIO@/';
$patterns[2] = '/@VALUE@/';
$patterns[3] = '/@FECHA@/';
$patterns[4] = '/{INCLUDESPHP}/';
$patterns[5] = '/{SCRIPTJSINCLUDE}/';
$patterns[6] = '/{SCRIPTJS}/';
$patterns[7] = '/{FROMS}/';
$replacements = array();
$replacements[0] = $_SESSION['TITLE_USER'];
$replacements[1] = $_SESSION['TITLE_SISTEM'];
$replacements[2] = $_SESSION['VALUE_SISTEM'];
$replacements[3] = date('l jS \of F Y h:i:s A');
$replacements[4] = $WRAP_INCLUDE_PHP;
$replacements[5] = $WRAP_INCLUDE_SCRIPT;
$replacements[6] = $WRAP_ALL_ESCRIPT;
$replacements[7] =  $BYB_FOR_ALL;

$BYB_HTML_ALL = preg_replace($patterns, $replacements, $BYB_HTML_ALL);


echo "<pre><xmp>".$BYB_HTML_ALL."</xmp></pre>";
 		/*$_SESSION['FORMULARIO'][$i][0]=$_POST["label_sistema".$i];
		$_SESSION['FORMULARIO'][$i][1]=$_POST["label_usuario".$i];
		$_SESSION['FORMULARIO'][$i][2]=$_POST["label_tipo".$i];*/

echo "Entro a crear el fotmulario";


 ?>