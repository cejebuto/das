<li><a class="menurgitcontrol" id="generateform"href="#"><i class="fa fa-star"></i><span class="hidden-sm text"> Generar Formulario</span></a></li>


<script type="text/javascript">
	
$( document ).ready(function() {
	$("#contenmenu").load('/module/mod_generateform/mod_generateform.php');
    $( ".menurgitcontrol" ).click(function() {
    	var option = $(this).attr('id');
  		$("#optionmenu").val(option);

		  $.ajax({
		   type: "POST",
		   url: "/process/pro_loadcontent/pro_loadcontent.php",
		   data: {option:option},
		   success: function(resp){  
		   	$("#contenmenu").load('/module/mod_'+resp+'/mod_'+resp+'.php');

		   },	
		   error: function(jqXHR,estado,error){
		   	alert('ERROR-'+error+'--');
   		   },
		    timeout: 2000
		  });
	});
});
</script>
<!--<input type="text" id="optionmenu" value="hello">-->




