<?php

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

require_once('function.php');

define("WS", "https://api.estadisticasbcra.com/");
define("USD_OF", "usd_of");
define("AUTH", "BEARER eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2Mjk5MzE0NjYsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJkYW5pdWZAZ21haWwuY29tIn0.lUaftFbpROZH-gGwtVUmeTfSmqZXqzZjY4VZrgDGR7cPIuqIdNp0yXMuFlP1-NMPO6G_ZEK9gpDTgbhwO9jxqg");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, WS.USD_OF);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.AUTH));

$respuesta = curl_exec($ch);

$info = curl_getinfo($ch);

if ($info['http_code'] == 200) {

  if ($respuesta) {
    loguear("logs/access.log", "Peticion realizada a:\t".WS.USD_OF);
    loguear("logs/access.log", "HTTPStatusCode\t".$info['http_code']);

    $json = json_decode($respuesta);
    echo "<table border='1'><tr><th>Fecha</th><th>Valor</th></tr>"; 

    for ($i = 0; $i < count($json); $i++) {
      echo "<tr><td>".$json[$i]->d."</td><td>".$json[$i]->v."</td>";
    }

    echo "</table>";

  } else {
    //Error al leer informacion
    loguear("logs/error.log", "Error al leer informacion\t".WS.USD_OF);
    loguear("logs/error.log", "HTTPStatusCode\t".$info['http_code']);
  }
} else {
  loguear("logs/error.log", "Error al ejecutar peticion\t".WS.USD_OF);
  loguear("logs/error.log", "HTTPStatusCode\t".$info['http_code']);
} 

curl_close($ch);
