<h5>SOY UN TABLERO DE INSTRUMENTOS</h5><br>

<?php 
if(!isset($_SESSION)){
 session_start();
}
echo "hello -->".$_SESSION['option'] ;
?>
