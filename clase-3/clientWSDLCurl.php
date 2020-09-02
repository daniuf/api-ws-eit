<?php

define("WS", "http://www.thomas-bayer.com/axis2/services/BLZService");

//$blz = "10000000";
$blz = $_GET['blz'];

$xml_input = '<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://thomas-bayer.com/blz/"><SOAP-ENV:Body><ns1:getBank><ns1:blz>'.$blz.'</ns1:blz></ns1:getBank></SOAP-ENV:Body></SOAP-ENV:Envelope>';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, WS);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_input);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=UTF-8', 
					   'SOAPAction: ""'));

$respuesta = curl_exec($ch);
$info = curl_getinfo($ch);
$xml_response = str_replace(array('soapenv:', 'SOAP-ENV:', 'ns1:'), '', $xml_input);
var_dump($xml_response);

curl_close($ch);
