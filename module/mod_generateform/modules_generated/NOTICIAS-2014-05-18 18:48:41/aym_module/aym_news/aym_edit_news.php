<?php # **************************** AYM EASY SITE V: 5.1 ********************
# FORMULARIO PARA EDITAR NOTICIAS
# AYMSOFT SAS
# Sunday 18th of May 2014 06:48:41 PM

# COMPONENTE QUE TRAE LOS DATOS -->  news
include_once ($_SERVER['DOCUMENT_ROOT']."/aymsite/aym_sql/aym_news/aym_sql_get_news.php");


?>

<form action="/aymsite/actionnews" method="post" name="frm_edit_news" id="frm_edit_news" enctype="multipart/form-data">
	<fieldset class="aym_frm_content">
		
		<div class="aym_clear"></div>
		<div class="aym_frm_two_col">
			<span class="aym_col_1">Nombre</span>
			<span class="aym_col_2"><input type="text" class="input_texbox" id="use_nam" name="use_nam" value="<?php echo $row_get_news['use_nam']; ?>"/></span>
		</div>
		<div class="aym_clear"></div> 
		<div class="aym_frm_two_col">
			<div class="aym_col_1">&nbsp;</div>
			<div class="aym_col_2"><input type="submit" value="Aceptar" class=""/> 
				<input name="action" type="hidden" id="action" value="U" />
			</div>
			<div class="aym_clear"></div>
		</div>
    </fieldset>
</form>
<div class="aym_separator"></div>
<div class="aym_index_message">Todos los campos son obligatorios</div>

