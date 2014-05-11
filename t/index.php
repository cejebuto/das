<?php
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
unset($_SESSION['numero']);
?>