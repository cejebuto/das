<?php
/*
session_start();
$animal[0][0] = "Perro";
$animal[0][1] = "Gato";
$animal[1][0] = "Lombriz";
$animal[1][1] = "Burro";
$animal[2][0] = "Murciélago";
$animal[2][1] = "Cocodrilo";
echo $animal[2][1];
echo "<br>";	
echo $animal[0][0];
echo "<br>";echo "<br>";echo "<br>";echo "<br>";
$_SESSION['hope'] = $animal;
echo $_SESSION['hope'][2][1];
echo "<br>";	
echo $_SESSION['hope'][0][0];

echo "<br>";	
echo "<br>";	
echo "<br>";	
echo "<br>";	
$c=1;
for ($i=0; $i <5; $i++) { 
	for ($j=0; $j <5; $j++) { 
		$_SESSION['numero'][$i][$j] = $c;
		++$c;
	}
}

foreach ($_SESSION['numero'] as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}
unset($_SESSION['numero']);*/
$nombre="helloword";
 $archivoYExtension = $nombre . ".php";
 $nuevoarchivo = fopen($archivoYExtension , "w+");
 $content="<?php # **************************** AYM EASY SITE V: 5.1 ********************
# FORMULARIO PARA AGREGAR sds
# AYMSOFT SAS
# Saturday 17th of May 2014 10:45:38 AM


?>

<form action=\"/aymsite/actionsdsdd\" method=\"post\" name=\"frm_add_sdsdd\" id=\"frm_add_sdsdd\" enctype=\"multipart/form-data\">
	<fieldset class=\"aym_frm_content\">
		
		<div class=\"aym_clear\"></div>
		<div class=\"aym_frm_two_col\">
			<span class=\"aym_col_1\">nombre1</span> 
			<span class=\"aym_col_2\"><input name=\"sds\" type=\"text\" class=\"input_texbox\" id=\"sds\"/></span>
		</div>
		<div class=\"aym_clear\"></div> 
		<div class=\"aym_frm_two_col\">
			<div class=\"aym_col_1\">&nbsp;</div>
			<div class=\"aym_col_2\"><input type=\"submit\" value=\"Aceptar\" class=\"\"/> 
				<input name=\"action\" type=\"hidden\" id=\"action\" value=\"sdsdsd\" />
			</div>
			<div class=\"aym_clear\"></div>
		</div>
    </fieldset>
</form>
<div class=\"aym_separator\"></div>
<div class=\"aym_index_message\">Todos los campos son obligatorios</div>";
fwrite($nuevoarchivo, $content);
fclose($nuevoarchivo);
?>
