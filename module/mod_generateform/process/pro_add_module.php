<?php
if(!isset($_SESSION)){
 session_start();
}
if(!isset($_POST["opt_add"])){ $_POST["opt_add"]="off"; }
if(!isset($_POST["opt_sea"])){ $_POST["opt_sea"]="off"; }
if(!isset($_POST["opt_lis"])){ $_POST["opt_lis"]="off"; }
if(!isset($_POST["opt_edi"])){ $_POST["opt_edi"]="off"; }
if(!isset($_POST["opt_del"])){ $_POST["opt_del"]="off"; }
if(!isset($_POST["opt_exp"])){ $_POST["opt_exp"]="off"; }

if (($_POST["opt_sea"]=="on") or ($_POST["opt_edi"]=="on") or ($_POST["opt_del"]=="on") or ($_POST["opt_exp"]=="on")) {
	$_POST["opt_lis"]="on";
}


#CREAMOS EL FORMULARIO
require $_SERVER['DOCUMENT_ROOT']."/module/mod_generateform/process/pro_gen_form.php";

exit;


/*unset($_SESSION['FORMULARIO']);
for ($i=1;$i<=$_POST["contador"];$i++){
	if($_POST["label_sistema".$i]<>"" AND $_POST["label_usuario".$i]<>""){ 
		if(!isset($_POST["chk_required".$i])){ $_POST["chk_required".$i]="off"; }
		$_SESSION['FORMULARIO'][$i][0]=$_POST["label_sistema".$i];
		$_SESSION['FORMULARIO'][$i][1]=$_POST["label_usuario".$i];
		$_SESSION['FORMULARIO'][$i][2]=$_POST["label_tipo".$i];
		$_SESSION['FORMULARIO'][$i][3]=$_POST["chk_required".$i];
	}
 }*/

/*
foreach ($_SESSION['FORMULARIO'] as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}
unset($_SESSION['FORMULARIO']);
exit;
*/

$_SESSION['suboption']="for_down_module";
header('Location: /');
?>



<?php 


echo " Entro a procesar el modulo ";exit;
 ?>