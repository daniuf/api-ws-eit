<?php

define("WSDL", "http://www.thomas-bayer.com/axis2/services/BLZService?wsdl");

try {

  $options = array('trace' => true);

  $client = new SoapClient(WSDL, $options);
  $getBank->blz = "10000000";
  $getBankResponse = $client->getBank($getBank);
  //var_dump($getBankResponse);
  /*
  echo "bezeichnung: ".$getBankResponse->details->bezeichnung."<br/>";
  echo "bic: ".$getBankResponse->details->bic."<br/>";
  echo "ort: ".$getBankResponse->details->ort."<br/>";
  echo "plz: ".$getBankResponse->details->plz."<br/>";
  */

  /** La informacion a continuacion es para loguear */
  echo $client->__getLastRequestHeaders().PHP_EOL;
  echo $client->__getLastRequest().PHP_EOL;
  echo $client->__getLastResponseHeaders().PHP_EOL;
  echo $client->__getLastResponse().PHP_EOL;

} catch (SoapFault $e) {

  echo $e->getMessage();

}
