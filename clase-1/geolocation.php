<?php

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

define("URL", "http://www.geoplugin.net/xml.gp?ip=");

if (empty($_SERVER['REMOTE_ADDR']) == false) {

  $pais_origen = '';
  $url = URL.$_SERVER['REMOTE_ADDR'];
  $data = file_get_contents($url);

  loguear('logs/ws.log', "Consultando URL\t$url");

  if ($data) {
    loguear('logs/ws.log', "XML Response\t".$data);
    $xml = simplexml_load_string($data);

    if (isset($xml->geoplugin_countryName) && !empty($xml->geoplugin_countryName)) {
	$pais_origen = "desde ".$xml->geoplugin_countryName;
    }
  } else {
    loguear('logs/ws.log', "Error al consultar WS");
  }

  echo "Hola, gracias por visitarnos ".$pais_origen;

}

function loguear($nombre, $mensaje, $modo = 'a+') {

 $dt = new DateTime();
 $date = $dt->format('Y-m-d H:i:s');

 $fp = fopen($nombre, $modo);
 fwrite($fp, "[".$date."]\t".$mensaje.PHP_EOL);
 fclose($fp);
}
