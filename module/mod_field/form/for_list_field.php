<?php 

#LISTO TODOS LOS CAMPOS
include_once ($_SERVER['DOCUMENT_ROOT']."/module/mod_field/sql/sql_list_field.php");
 ?>
 <span class="label label-info" style="font-size:25px">Listado de </span><span class="label label-primary" style="font-size:25px">Campo de formulario</span><br><br>
<style type="text/css">
  xmp{white-space:normal; }
  pre:hover { background-color: #e0e0e0; color: #428bca}
</style>
 <table style="background-color:white"class="table table-bordered table-hover">
    <tr>
      <th >ID</th>
      <th >Nombre</th>
    <!-- <th >Campo</th> -->
      <th >Codigo</th>
      <th >Editar</th>
    </tr>
    <?php while ($row_list_field=mysqli_fetch_array($sql_list_field)) {	?>
    <tr>
      <td><?php echo $row_list_field['fie_id'] ?></td> 
      <td><?php echo $row_list_field['fie_nam'] ?></td>
     <!-- <td><?php echo $row_list_field['fie_cod'] ?></td>-->
      <td><?php echo "<pre><xmp>".$row_list_field['fie_cod']."</xmp></pre>" ?></td>
      <td><a href="#" class="editfield" id="for_edit_field" name="<?php echo $row_list_field['fie_id'] ?>"><i class="fa fa-pencil-square-o fa-2x text-success"></i></a></td>
	</tr>
    <?php } mysqli_free_result($sql_list_field); ?> 
</table>
<br>
<br><br> 


<script type="text/javascript">
	
$( document ).ready(function() {
    $( ".editfield" ).click(function() {
    	var suboption = $(this).attr('id');
    	var itemid = $(this).attr('name');
		var itemid = itemid.toString();
   		  $.ajax({
		   type: "POST",
		   url: "/module/mod_field/process/pro_load_sub_content.php",
		   data: {suboption:suboption,itemid:itemid},
		   success: function(resp){  
		   	location.reload();
		   },	
		   error: function(jqXHR,estado,error){
		   	alert('ERROR-'+error+'--');
   		   },
		    timeout: 2000
		  });
	});
});
</script>