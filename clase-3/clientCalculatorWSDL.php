<?php

define("WSDL", "http://www.dneonline.com/calculator.asmx?WSDL");

$options = array(
		#'soap_version' => SOAP_1_1
		'trace' => true
	   );

try {
	$client = new SoapClient(WSDL, $options);

	/*
	$Add['intA'] = 3;
	$Add['intB'] = 5;
	*/
	$Add->intA = 3;
        $Add->intB = 9;
	//$response = $client->Add($Add);
	$response = $client->__soapCall("Add", array($Add));

	var_dump($response);
	echo "El resultado de la operacion es ".$response->AddResult;

	/** La informacion a continuacion es para loguear */
	echo $client->__getLastRequestHeaders().PHP_EOL;
	echo $client->__getLastRequest().PHP_EOL;
	echo $client->__getLastResponseHeaders().PHP_EOL;
	echo $client->__getLastResponse().PHP_EOL;

} catch (Exception $e) {
	echo $e->getMessage();
}
