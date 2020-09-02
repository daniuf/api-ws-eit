<?php

define('WS', 'http://eit.indianadev.biz/clase-3/soap-server.php');

try {

  $options = array(
		'location' => WS,
		'uri' => WS
	     );
  $client = new SoapClient(null, $options);
  echo $client->holaMundoParam("Mundo con parametro");

} catch (Exception $e) {
  echo "Error".$e->getMessage();
}
