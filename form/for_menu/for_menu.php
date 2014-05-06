<li><a class="menurgitcontrol" id="generateform"href="#"><i class="fa fa-star"></i><span class="hidden-sm text"> Generar Formulario</span></a></li>


<script type="text/javascript">
	
$( document ).ready(function() {
    $( ".menurgitcontrol" ).click(function() {
    	var option = $(this).attr('id');
  		$("#optionmenu").val(option);

		  $.ajax({
		   type: "POST",
		   url: "/process/pro_loadcontent/pro_loadcontent.php",
		   data: {option:option},
		   success: function(resp){  
		   	location.reload();
		   	/*$("#contenmenu").load('/process/pro_loadcontent/pro_conten.php');*/
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




