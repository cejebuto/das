<li><a class="menurgitcontrol" id="dashboard"href="#"><i class="fa fa-bar-chart-o"></i><span class="hidden-sm text"> Panel de Control</span></a></li>
<li><a class="menurgitcontrol" id="uploadimage"href="#"><i class="fa fa-picture-o"></i><span class="hidden-sm text"> Cargar Imagen</span></a></li>

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
		   	$("#contenmenu").load('/module/mod_'+resp+'/mod_'+resp+'.php');
		   /* 
		   	$("#contenmenu").html('<iframe src="http://www.w3schools.com"></iframe>');
		   $("#contenmenu").html("<i class='fa fa-refresh fa-spin'></i>"+resp );
				document.location.href='#/';
		   		location.reload();*/
		   },	
		   error: function(jqXHR,estado,error){
		   	alert('ERROR-'+error+'--');
   		   },
		    timeout: 2000
		  });
	});
});
</script>
<input type="text" id="optionmenu" value="hello">




