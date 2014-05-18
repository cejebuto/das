<?php
$hayciudad=0;
$VARFECHA='';
$CODIGO='
<form action="/aymsite/action@FORMULARIO@" method="post" name="frm_add_@FORMULARIO@" id="frm_add_@FORMULARIO@" enctype="multipart/form-data">
	<fieldset class="aym_frm_content">';

#LLENAMOS EL CONTENIDO POR LOS DATOS LLEGADOS DEL FORMULARIO #0193A7
for ($i=1;$i<=$_POST["contador"];$i++){

	if($_POST["label_sistema".$i]<>"" AND $_POST["label_usuario".$i]<>""){
		#SI EL CAMPO ES DE TIVO VARCHAR O EMAIL
		if($_POST["label_tipo".$i]==0 || $_POST["label_tipo".$i]==2){ 
			 $CODIGO =$CODIGO.'
		<div class="aym_clear"></div>
		<div class="aym_frm_two_col">
			<span class="aym_col_1">'.$_POST["label_usuario".$i].'</span> 
			<span class="aym_col_2"><input name="'.$_POST["label_sistema".$i].'" type="text" class="input_texbox" id="'.$_POST["label_sistema".$i].'"  /></span>
		</div>';
		}
		#SI EL CAMPO ES DE TIPO ENTERO
		if($_POST["label_tipo".$i]==1){ 
			 $CODIGO =$CODIGO.'
		<div class="aym_clear"></div>
		<div class="aym_frm_two_col">
			<span class="aym_col_1">'.$_POST["label_usuario".$i].'</span> 
			<span class="aym_col_2"><input name="'.$_POST["label_sistema".$i].'" type="text" class="input_texbox" id="'.$_POST["label_sistema".$i].'"  onkeypress="return teclado(event)"/></span>
		</div>';
		}
		#SI EL CAMPO ES TIPO SEXO
		if($_POST["label_tipo".$i]==3){ 
			$CODIGO=$CODIGO.'
		<div class="aym_clear"></div>
		<div class="aym_frm_two_col">
			<span class="aym_col_1">Sexo:</span> 
			<span class="aym_col_2"><select name="'.$_POST["label_sistema".$i].'" id="'.$_POST["label_sistema".$i].'">
				<option value="0">[ SELECCIONE ]</option>
				<option value="M">Masculino</option>
				<option value="F">Femenino</option>
			</select></span>
		</div>
			';
		}
		#SI ES DE TIPO FECHA
		if($_POST["label_tipo".$i]==4){ 
			 $CODIGO =$CODIGO.'
		<div class="aym_clear"></div>
		<div class="aym_frm_two_col">
			<span class="aym_col_1">'.$_POST["label_usuario".$i].'</span> 
			<span class="aym_col_2"><input type="text" class="aym_input_date_small" id="'.$_POST["label_sistema".$i].'"  name="'.$_POST["label_sistema".$i].'" value="<?php echo date("Y-m-d") ?>"/></span> 
		</div>';	
       	}
		#SI ES DE TIPO PAIS
       	if($_POST["label_tipo".$i]==5){ 
			 $CODIGO =$CODIGO.'
        <div class="aym_clear"></div>
        <div class="aym_frm_two_col">
            <span class="aym_col_1">'.$_POST["label_usuario".$i].'</span> 
            <span class="aym_col_2"><select name="'.$_POST["label_sistema".$i].'" id="'.$_POST["label_sistema".$i].'">
           <option value="0">[ SELECCIONE ]</option>
              <?php # PROCEDIMIENTO--> LISTA PAISES
                    include ($_SERVER['."'DOCUMENT_ROOT'".']."/aymsite/aym_sql/aym_common/aym_sql_list_country.php"); 
                    while ($row_list_country = mysqli_fetch_array($aym_sql_list_country)) 
                    	{echo'."'".'<option value="'."'.".'$row_list_country'."['cou_id'].'".'">'."'.".'$row_list_country'."['cou_nam'].'</option>';". '
         mysqli_free_result($aym_sql_list_country);?>  
         	</select>
         </span>
        </div>
		';	
       	}
       	#SI EL CAMPO ES DE TIPO CIUDAD Y DEPARTAMENTOS
       	if($_POST["label_tipo".$i]==6){ 
			 $CODIGO =$CODIGO.'
		<div class="aym_clear"></div>
		<div class="aym_frm_two_col">
			<span class="aym_col_1">'.$_POST["label_usuario".$i].'</span> 
			<span class="aym_col_2">
				<select name="dep_cod" id="dep_cod">
					<option value="0">[ SELECCIONE ]</option>
					<?php # PROCEDIMIENTO--> LISTA DE DEPARTAMENTOS
					include ($_SERVER['."'DOCUMENT_ROOT'".']."/aymsite/aym_sql/aym_common/aym_sql_list_department.php"); 
					while ($row_list_department = mysqli_fetch_array($aym_sql_list_department)) 
					{echo'."'".'<option value="'."'.".'$row_list_department'."['dep_cod'].'".'">'."'.".'$row_list_department'."['dep_nam'].'</option>';". '
					mysqli_free_result($aym_sql_list_department);?>  
				</select>
			</span>
		</div>
		<div class="aym_clear"></div>
		<div class="aym_frm_two_col">
			<span class="aym_col_1">'.$_POST["label_usuario".$i].'</span> 
			<span class="aym_col_2">
				<select name="cit_id" id="cit_id">
					<option value="0">[ SELECCIONE ]</option>
					<?php # PROCEDIMIENTO--> LISTA  MUNICIPIO O CIUDADES
					include ($_SERVER['."'DOCUMENT_ROOT'".']."/aymsite/aym_sql/aym_common/aym_sql_list_department_city.php"); 
					?>
				</select>
			</span>
		</div>';
		$hayciudad=1;	
       	}
	}
}
 #AGREGAMOS EL FOOTER     
$CODIGO=$CODIGO.'
		<div class="aym_clear"></div> 
		<div class="aym_frm_two_col">
			<div class="aym_col_1">&nbsp;</div>
			<div class="aym_col_2"><input type="submit" value="Aceptar" class="val_add_user"/> 
				<input name="action" type="hidden" id="action" value="@VALUE@" />
				<input name="cli_id" type="hidden" id="cli_id" value="0" />
			</div>
		</div>
	</form>
</fieldset>
<div class="aym_separator"></div>
<div class="aym_index_message">Todos los campos son obligatorios</div>
';
 #AGREGAMOS EL TODOS LOS SCRIPTS SI SON NECESARIOS!  
 $haynumero=0;   
 $hayfecha=0;

 #CIUDAD
 if($hayciudad==1){
 	$CODIGO=$CODIGO.
 '<script type="text/javascript" src="/aymsite/aym_js/aym_city/aym_city.js"></script>';

 }
 #NUMERO
for ($i=1;$i<=$_POST["contador"];$i++){
		if($_POST["label_sistema".$i]<>"" AND $_POST["label_usuario".$i]<>""){
			if($_POST["label_tipo".$i]==1 AND $haynumero==0){ 
$CODIGO=$CODIGO.'
<script type="text/javascript">
function teclado(e) { 
    tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron =/[0-9\d]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te);
}
</script">
';
$haynumero=1;
}
#FECHA
if($_POST["label_tipo".$i]==4 ){ 
	if($hayfecha==0){
			 $VARFECHA =$VARFECHA.'
<script type="text/javascript">';
			 $VARFECHA =$VARFECHA."
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
    
    $.datepicker.setDefaults($.datepicker.regional['es']);";

	$VARFECHA=$VARFECHA.'
    $("#'.$_POST["label_sistema".$i].'").datepicker({';

	$VARFECHA=$VARFECHA."
        dateFormat: 'yy-mm-dd', 
        changeMonth: true,
        changeYear: true,
        inline: true
    });";
$hayfecha=1;
}else{
	$VARFECHA=$VARFECHA.'
    $("#'.$_POST["label_sistema".$i].'").datepicker({';

	$VARFECHA=$VARFECHA."
        dateFormat: 'yy-mm-dd', 
        changeMonth: true,
        changeYear: true,
        inline: true
    });";
}

       	}
}
}if($hayfecha==1){
$VARFECHA=$VARFECHA."
});
</script>
";}

$CODIGO=$CODIGO.$VARFECHA;

$patterns = array();
$patterns[0] = '/@TITULO1@/';
$patterns[1] = '/@FORMULARIO@/';
$patterns[2] = '/@VALUE@/';
;$replacements = array();
$replacements[2] = $_POST["TITULO_D"];
$replacements[1] =  $_POST["TITULO_S"];
$replacements[0] =  $_POST["VALUE_S"];

#CAABEZERA DEL CODIGO LLENAR LOS INCLUDES Y LOS JS SI SON NECESARIOS!
$CODIGOONE = '<?php # **************************** AYM EASY SITE V: 5.1 ********************
# FORMULARIO PARA AGREGAR @TITULO1@
# AYMSOFT SAS
# 

?>';
if($hayfecha==1){
$CODIGOONE=$CODIGOONE.'
<link rel="stylesheet" type="text/css" href="/aymsite/aym_css/aym_datetimepicker.css"/>
';}

$CODIGO=$CODIGOONE.$CODIGO;
$nuevocodigo = preg_replace($patterns, $replacements, $CODIGO);


if(!isset($_SESSION)){
 session_start();
}
$_SESSION['nuevocodigo'] = "<pre><xmp>".$nuevocodigo."</xmp></pre>";
 $_SESSION['suboption']="for_showgenerated";
header('Location: /');
?>