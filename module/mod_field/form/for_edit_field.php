<?php 
#echo "--> ".$_SESSION['itemid']." <--";
#echo "--> ".$_SESSION['suboption']." <--";

#OBTENEOS EL ITEM A EDITAR
include_once $_SERVER['DOCUMENT_ROOT']."/module/mod_field/sql/sql_get_field.php";

#REEMPLAZAMOS LAS @ SIMPLES POR COMILLAS SIMPLES

$row_get_field['fie_cod_add'] = str_replace("@","'", $row_get_field['fie_cod_add']);
$row_get_field['fie_cod_edi'] = str_replace("@","'", $row_get_field['fie_cod_edi']);
$row_get_field['fie_cod_com'] = str_replace("@","'", $row_get_field['fie_cod_com']);
$row_get_field['fie_cod_js'] = str_replace("@","'", $row_get_field['fie_cod_js']);

 ?>

<html>
<head>
	<meta charset="utf-8">
	<title>Editar un campo del formulario</title>
	<script src="/module/mod_field/js/ckeditor/ckeditor.js">//No se necesita</script>
 </head>
<body>
	<span class="label label-warning" style="font-size:25px">Editar un </span><span class="label label-primary" style="font-size:25px">Campo de formulario</span><br><br>

	<form action="/module/mod_field/process/pro_edit_field.php" method="post">
		<p>
		<label for="fie_nam">
			Nombre del Campo:
			</label>
		<div class="col-lg-4">
			 <input type="text" class="form-control" id="fie_nam" name="fie_nam" placeholder="Nombre del Campo" size="20" value="<?php echo $row_get_field['fie_nam']; ?>">
 		 </div>
 		 </p>
		 <br><br><br>
		<p>
			<label for="fie_cod_add">
			Codigo del Campo Para Agregar:
			</label>
		</p>
			<textarea class="contencode" cols="80" id="fie_cod_add" name="fie_cod_add" rows="10" style="width:90%"><?php echo $row_get_field['fie_cod_add']; ?></textarea>
		<br>
		<p>
			<label for="fie_cod_edi">
			Codigo del Campo Para Editar:
			</label>
		</p>
			<textarea class="contencode" cols="80" id="fie_cod_edi" name="fie_cod_edi" rows="10" style="width:90%"><?php echo $row_get_field['fie_cod_edi']; ?></textarea>
		<br>	
			<p>
			<label for="fie_cod_com">
			Codigo del Campo Para El componente:
			</label>
		</p>
			<textarea class="contencode" cols="80" id="fie_cod_com" name="fie_cod_com" rows="4" style="width:90%"><?php echo $row_get_field['fie_cod_com']; ?></textarea>
		<br>	
			<p>
			<label for="fie_cod_js">
			Codigo del Campo Para el validar JS:
			</label>
		</p>
			<textarea class="contencode" cols="80" id="fie_cod_js" name="fie_cod_js" rows="4" style="width:90%"><?php echo $row_get_field['fie_cod_js']; ?></textarea>
		<br>
		<p>
			<input type="submit" class="btn btn-primary"value="Enviar">
			<input type="hidden" id="fie_id" name="fie_id" value="<?php echo $row_get_field['fie_id']; ?>">
		</p>
		 <br><br><br>
	</form>
</body>
</html>

<script>
//COLOCAR TABULADOR EN EL TEXT AREA
$("textarea").keydown(function(e) {
    if(e.keyCode === 9) { // tab was pressed
        // get caret position/selection
        var start = this.selectionStart;
        var end = this.selectionEnd;

        var $this = $(this);
        var value = $this.val();

        // set textarea value to: text before caret + tab + text after caret
        $this.val(value.substring(0, start)
                    + "\t"
                    + value.substring(end));

        // put caret at right position again (add one for the tab)
        this.selectionStart = this.selectionEnd = start + 1;

        // prevent the focus lose
        e.preventDefault();
    }
});	

</script>