<?php

/**
 * Creamos un "Web Service" que entrega como salida un documento XML
 */

$xml = new SimpleXMLElement("<libros></libros>");
$xml->addAttribute('version', '1.0');
$xml->addAttribute('encoding', 'UTF-8');

header("Content-Type: text/xml");
echo $xml->asXML();
