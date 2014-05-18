<html lang="es">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- start: CSS -->
  <link href="style/css/bootstrap.min.css" rel="stylesheet">
  <link href="style/css/style.min.css" rel="stylesheet">
  <link href="style/css/retina.min.css" rel="stylesheet">
  <link href="style/css/print.css" rel="stylesheet" type="text/css" media="print"/>
  <!-- end: CSS -->
  
  <!-- start: Favicon and Touch Icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="style/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="style/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="style/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="style/ico/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="style/ico/favicon.png">
  <!-- end: Favicon and Touch Icons --> 

</head>
<!--=================================================================================  SCRIPTS ================================================== -->
<script language=JavaScript>
  function fnOcultar()
{
document.getElementById("msg_login").style.display = 'none';
document.getElementById("use_nam").focus();
}
 </script>
<!--=================================================================================  SCRIPTS ================================================== background="img/COE LOGO.png" -->
		<div class="container">
		<div class="row">
				<div id="content2" class="col-sm-12 full">
			
			<div class="row">

				<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 login-box-locked" style="margin-top:180;">
					
					<img src="style/img/gallery/photo7.jpg" class="avatar"/>
          <fieldset>
             <form action="./" method="post" autocomplete="off">
      					<div class="input-prepend input-group">
      						<input id="use_nam" name ="use_nam" class="form-control"  type="text" placeholder="Usuario" autofocus><br><br>
      						<input id="use_pas" name ="use_pas" class="form-control"  type="password" placeholder="Contraseña"><br>
      				 	</div>
      				 	<button type="button" id="login" name="login" class="btn btn-primary" style="margin-top:14;"><div id="contenbotton"></div></button>
               
            </form>    
          </fieldset>

          <div>
					<a href="#">Olvide mi contraseña</a>
					<a href="#">Acerca de este Software</a>
          </div>
          <div id="msg_login"></div>
				</div><!--/col-->
			</div><!--/row-->
		</div><!--/content-->	
			
				</div><!--/row-->		
		
	</div><!--/container-->
  <script src="style/js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript">
  window.jQuery || document.write("<script src='style/js/jquery-2.1.0.min.js'>"+"<"+"/script>");
  </script>
  <script src="style/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="style/js/bootstrap.min.js"></script>
  <!-- page scripts -->
  <script src="style/js/jquery.backstretch.min.js"></script>
  <!-- theme scripts -->
  <script src="style/js/custom.min.js"></script>
  <script src="style/js/core.min.js"></script>
  <!-- inline scripts related to this page -->
  <script src="style/js/pages/page-lockscreen.js"></script>
	<!-- end: JavaScript-->
   <script src="ajs/js_login/js_login.js"></script>
</body>
</html>