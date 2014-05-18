<?php # **************************** AYM EASY SITE V: 5.1 ********************
# FORMULARIO PARA AGREGAR NOTICIAS
# AYMSOFT SAS
# Sunday 18th of May 2014 06:51:34 PM


?>

<form action="/aymsite/actionnews" method="post" name="frm_add_news" id="frm_add_news" enctype="multipart/form-data">
	<fieldset class="aym_frm_content">
		
		<div class="aym_clear"></div>
		<div class="aym_frm_two_col">
			<span class="aym_col_1">Nombre</span> 
			<span class="aym_col_2"><input name="use_nam" type="text" class="input_texbox" id="use_nam"/></span>
		</div>
		<div class="aym_clear"></div> 
		<div class="aym_frm_two_col">
			<div class="aym_col_1">&nbsp;</div>
			<div class="aym_col_2"><input type="submit" value="Aceptar" class=""/> 
				<input name="action" type="hidden" id="action" value="I" />
			</div>
			<div class="aym_clear"></div>
		</div>
    </fieldset>
</form>
<div class="aym_separator"></div>
<div class="aym_index_message">Todos los campos son obligatorios</div>

