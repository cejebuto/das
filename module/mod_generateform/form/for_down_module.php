 <span class="label label-success" style="font-size:25px">Descarga tu</span><span class="label label-primary" style="font-size:25px">Proyecto !</span><br><br>

<div id="MyWizard" class="wizard">
     <ul class="steps">
          <li data-target="#step1"><span class="badge">1</span><span class="chevron"></span>Paso 1</li>
          <li data-target="#step2"><span class="badge">2</span><span class="chevron"></span>Paso 2</li>
          <li data-target="#step3" class="active"><span class="badge badge-info">3</span><span class="chevron"></span>Listo</li>
     </ul>
</div>
<?php 

 ?>
<div style="font-size: 30px;text-align:center;"><span><?php echo $_SESSION['archivoZip'];?></span></div><br>
<div style="font-size: 50px;text-align:center;">
<a href='<?php echo $_SESSION['rutadescarga']; ?>'><i class="fa fa-download fa-5x"></i></a>
</div>

<?php 
#LLAMO PROCEDIMIENTO PARA MATAR A TODAS LAS VARIABLES DE SESION
//unset($_SESSION['rutadescarga']);
?>
