<?php

function loguear($nombre, $mensaje, $modo = 'a+') {

 $dt = new DateTime();
 $date = $dt->format('Y-m-d H:i:s');

 $fp = fopen($nombre, $modo);
 fwrite($fp, "[".$date."]\t".$mensaje.PHP_EOL);
 fclose($fp);
}
