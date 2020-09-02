<?php

/**
 * Ejemplo de consumir API REST via GET
 */

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

require_once('function.php');

define("WS", "https://jsonplaceholder.typicode.com/posts/1?method=ALGO&parametro2=valor");
//QUERY_STRING

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, WS);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

$respuesta = curl_exec($ch);

$info = curl_getinfo($ch);

if ($info['http_code'] == 200) {

  if ($respuesta) {
    loguear("logs/access.log", "Peticion realizada a:\t".WS);
    loguear("logs/access.log", "HTTPStatusCode\t".$info['http_code']);

    $json = json_decode($respuesta);
    var_dump($json);

  } else {
    //Error al leer informacion
    loguear("logs/error.log", "Error al leer informacion\t".WS);
    loguear("logs/error.log", "HTTPStatusCode\t".$info['http_code']);
  }
} else {
  loguear("logs/error.log", "Error al ejecutar peticion\t".WS);
  loguear("logs/error.log", "HTTPStatusCode\t".$info['http_code']);
} 

curl_close($ch);
