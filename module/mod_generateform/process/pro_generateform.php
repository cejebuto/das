<?php
if(!isset($_SESSION)){
 session_start();
}
$_SESSION['CONTADOR']=0;
unset($_SESSION['FORMULARIO']);
for ($i=1;$i<=$_POST["contador"];$i++){
	if($_POST["label_sistema".$i]<>"" AND $_POST["label_usuario".$i]<>""){ 
		if(!isset($_POST["chk_required".$i])){ $_POST["chk_required".$i]="off"; }
		$_SESSION['FORMULARIO'][$i][0]=$_POST["label_sistema".$i];
		$_SESSION['FORMULARIO'][$i][1]=$_POST["label_usuario".$i];
		$_SESSION['FORMULARIO'][$i][2]=$_POST["label_tipo".$i];
		$_SESSION['FORMULARIO'][$i][3]=$_POST["chk_required".$i];

		$_SESSION['CONTADOR']++;
	}
 }

$_SESSION['TITLE_USER']=$_POST["TITLE_USER"];
$_SESSION['TITLE_SISTEM']=$_POST["TITLE_SISTEM"];
$_SESSION['VALUE_SISTEM']=$_POST["VALUE_SISTEM"];

#$_SESSION['BYB_NAM_MOD'] = $_SESSION['TITLE_USER']."-".date('Y-m-d H:i:s');


/*
foreach ($_SESSION['FORMULARIO'] as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}
unset($_SESSION['FORMULARIO']);
exit;
*/

$_SESSION['suboption']="for_add_module";
header('Location: /');
?>

