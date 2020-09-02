<?php

define("WSDL", "http://www.dneonline.com/calculator.asmx?WSDL");

$options = array(
		#'soap_version' => SOAP_1_1
		'trace' => true
	   );

try {
	$client = new SoapClient(WSDL, $options);

	$response = $client->__getFunctions();
	var_dump($response);

	/** La informacion a continuacion es para loguear */
	/*echo $client->__getLastRequestHeaders().PHP_EOL;
	echo $client->__getLastRequest().PHP_EOL;
	echo $client->__getLastResponseHeaders().PHP_EOL;
	echo $client->__getLastResponse().PHP_EOL;*/

} catch (Exception $e) {
	echo $e->getMessage();
}
