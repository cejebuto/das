<?php 

 ?>
 <span class="label label-success" style="font-size:25px">Diseña un</span><span class="label label-primary" style="font-size:25px">Modulo !</span><br><br>

<div id="MyWizard" class="wizard">
     <ul class="steps">
          <li data-target="#step1"><span class="badge">1</span><span class="chevron"></span>Paso 1</li>
          <li data-target="#step2" class="active"><span class="badge badge-info">2</span><span class="chevron"></span>Paso 2</li>
          <li data-target="#step3"><span class="badge">3</span><span class="chevron"></span>Listo</li>
     </ul>
</div>

<div>
<form action="/module/mod_generateform/process/pro_add_module.php" method="post">
<table class="table table-bordered table-hover">
	<tr>
		<td><span>Crear Formulario</span></td>
		<td><label class="switch switch-success"><input type="checkbox" class="switch-input" checked="" disabled><span class="switch-label" data-on="Si" data-off="No"></span><span class="switch-handle"></span></label></td>
	</tr>
	<tr>
		<td><span>Opción de Agregar</span></td>
		<td><label class="switch switch-success"><input name ="opt_add" type="checkbox" class="switch-input" checked=""><span class="switch-label" data-on="Si" data-off="No"></span><span class="switch-handle"></span></label></td>
	</tr>
	<tr>
		<td>Opción de Buscar</td>
		<td><label class="switch switch-success"><input name ="opt_sea" type="checkbox" class="switch-input" checked=""><span class="switch-label" data-on="Si" data-off="No"></span><span class="switch-handle"></span></label></td>
	</tr>
	<tr>
		<td>Opción de Listar</td>
		<td><label class="switch switch-success"><input name ="opt_lis" type="checkbox" class="switch-input" checked=""><span class="switch-label" data-on="Si" data-off="No"></span><span class="switch-handle"></span></label></td>
	</tr>
	<tr>
		<td>Opción de Editar</td>
		<td><label class="switch switch-success"><input name ="opt_edi" type="checkbox" class="switch-input" checked=""><span class="switch-label" data-on="Si" data-off="No"></span><span class="switch-handle"></span></label></td>
	</tr>
	<tr>
		<td>Opción de Eliminar</td>
		<td><label class="switch switch-success"><input name ="opt_del" type="checkbox" class="switch-input" checked=""><span class="switch-label" data-on="Si" data-off="No"></span><span class="switch-handle"></span></label></td>
	</tr>
	<tr>
		<td>Opción de Exportar</td>
		<td><label class="switch switch-success"><input name ="opt_exp" type="checkbox" class="switch-input" checked=""><span class="switch-label" data-on="Si" data-off="No"></span><span class="switch-handle"></span></label></td>
	</tr>
</table>
			<input type="submit" class="btn btn-primary"value="Crear !">
		
	</form>
</div>
<div class="alert alert-info">
		<strong>Instrucciones:</strong> Selecciona los modulos que se quieren generar <br>
		<strong>Recuerda </strong> Los modulos Editar, Buscar, Eliminar y Exportar, necesariamente requieren Listar!
</div>


