<?php

//echo urldecode('https://nbikes-claudiobareis.c9users.io/pesquisa.php?preco_a=1000.00%26preco_b%3D3000.00&titulo=');
//echo "<br/>";
//print_r($_GET);

$a = "preco_a=1000.00&preco_b=3000.00&titulo=bola";
$b = explode('=', $a);
print_r($b);
echo '<br/>';
$c = explode('=', implode('&', $b));
print_r($c);

//print_r($GLOBALS);
//print_r($_SERVER);

//echo($_SERVER['QUERY_STRING']);

?>	