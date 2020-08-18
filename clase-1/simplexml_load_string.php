<?php

//Objetivo: Cargar el XML dentro de una variable de PHP

$xml_string = file_get_contents('http://eit.indianadev.biz/clase-1/notas.xml');

if ($xml_string) {
  $xml = simplexml_load_string($xml_string);

  for ($i = 0; $i < count($xml->note); $i++) {
  
    echo "<h1>".$xml->note[$i]->heading."</h1>";
    echo "<p>Para: ".$xml->note[$i]->to."</p>";
    echo "<p>De: ".$xml->note[$i]->from."</p>";
    echo "<p>Fecha: ".$xml->note[$i]->fecha."</p>";
  
  }
  //var_dump($xml);
  //print_r($xml);
}
