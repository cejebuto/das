<?php 
if(!isset($_SESSION)){
 session_start();
}
if(!isset($_SESSION['suboption'])){
 $_SESSION['suboption']="for_add_field";
}
?>
 <ul class="nav nav-tabs">
  <li id="menu_sub_for_add_field"><a class="submenurgitcontrol" id="for_add_field"href="#">Añadir</a></li>
  <li id="menu_sub_for_list_field"><a class="submenurgitcontrol" id="for_list_field" href="#">Listar</a></li>
  <?php if ($_SESSION['suboption']=="for_edit_field") { ?>
  <li id="menu_sub_for_edit_field"><a class="submenurgitcontrol" id="for_edit_field" href="#">Editar</a></li>
  <?php } ?>
</ul>
<br><br>
<?php
require $_SERVER['DOCUMENT_ROOT']."/module/mod_".$_SESSION['option']."/form/".$_SESSION['suboption'].".php";
?>
<script type="text/javascript">
	
$( document ).ready(function() {
    $( ".submenurgitcontrol" ).click(function() {
    	var suboption = $(this).attr('id');
		  $.ajax({
		   type: "POST",
		   url: "/module/mod_field/process/pro_load_sub_content.php",
		   data: {suboption:suboption},
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