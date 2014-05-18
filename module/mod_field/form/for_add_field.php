<html>
<head>
	<meta charset="utf-8">
	<title>Agregar un campo al formulario</title>
	<script src="/module/mod_field/js/ckeditor/ckeditor.js">//No se necesita</script>
 </head>
<body>
	<span class="label label-success" style="font-size:25px">Añadir un </span><span class="label label-primary" style="font-size:25px">Campo de formulario</span><br><br>

	<form action="/module/mod_field/process/pro_add_field.php" method="post">
		<p>
		<label for="fie_nam">
			Nombre del Campo:
			</label>
		<div class="col-lg-4">
			 <input type="text" class="form-control" id="fie_nam" name="fie_nam" placeholder="Nombre del Campo" size="20">
 		 </div>
 		 </p>
		 <br><br><br>
		<p>
			<label for="fie_cod_add">
			Codigo del Campo Para Agregar:
			</label>
		</p>
			<textarea class="contencode" cols="80" id="fie_cod_add" name="fie_cod_add" rows="10"></textarea>
		<br>	
		<p>
			<label for="fie_cod_edi">
			Codigo del Campo Para Editar:
			</label>
		</p>
			<textarea class="contencode" cols="80" id="fie_cod_edi" name="fie_cod_edi" rows="10"></textarea>
		<br>	
		<p>
			<label for="fie_cod_com">
			Codigo del Campo Para El componente:
			</label>
		</p>
			<textarea class="contencode" cols="80" id="fie_cod_com" name="fie_cod_com" rows="4"></textarea>
		<br>	
		<p>
			<label for="fie_cod_js">
			Codigo del Campo Para el validar JS:
			</label>
		</p>
			<textarea class="contencode" cols="80" id="fie_cod_js" name="fie_cod_js" rows="4"></textarea>
		<br>
		<p>
			<input type="submit" class="btn btn-primary"value="Enviar">
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