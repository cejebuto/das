		<div class="row">
			<div class="col-sm-5">
			&copy; Copyright 2014 licencia privativa.
			</div><!--/.col-->
			<div class="col-sm-7 text-right">
				 Desarrollado por  <a href="#">ByB</a> | Basado en Bootstrap 3.1.1 | Con tecnologia  <a href="https://angularjs.org/" alt="AngularJs">AngularJs</a>
			</div><!--/.col-->	
		</div><!--/.row-->	
		 <script>
$(document).ready(function(){
	$("#<?php echo $_SESSION['option']; ?>").addClass("active");
	$("#menu_sub_<?php echo $_SESSION['suboption'] ?>").addClass("active");
});
</script>