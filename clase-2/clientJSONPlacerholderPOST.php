<?php

/**
 * Ejemplo de creacion de recurso
 */

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

require_once('function.php');

define("WS", "https://jsonplaceholder.typicode.com/posts");

$input = array('title' =>  'prueba',
		'body'=>  'Esto es una prueba',
		'userId'=>  1);

$input_json = json_encode($input);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, WS);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $input_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=UTF-8'));

$respuesta = curl_exec($ch);

$info = curl_getinfo($ch);

if ($info['http_code'] == 201) {//201 indica la creacion de un nuevo recurso

  if ($respuesta) {
    loguear("logs/access.log", "Peticion realizada a:\t".WS);
    loguear("logs/access.log", "JSON Input:\t".$input_json);
    loguear("logs/access.log", "HTTPStatusCode\t".$info['http_code']);

    $json = json_decode($respuesta);
    var_dump($json);

  } else {
    //Error al leer informacion
    loguear("logs/error.log", "Error al leer informacion\t".WS);
    loguear("logs/error.log", "JSON Input:\t".$input_json);
    loguear("logs/error.log", "HTTPStatusCode\t".$info['http_code']);
  }
} else {
  loguear("logs/error.log", "Error al ejecutar peticion\t".WS);
  loguear("logs/error.log", "JSON Input:\t".$input_json);
  loguear("logs/error.log", "HTTPStatusCode\t".$info['http_code']);
} 

curl_close($ch);
