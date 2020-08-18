<?php

  //Objetivo: Cargar el XML dentro de una variable de PHP
  $xml_string = file_get_contents('http://eit.indianadev.biz/clase-1/notas.xml');
  $xml = new simpleXMLElement($xml_string);

  echo "<pre>";
  var_dump($xml);
  echo "</pre>";
  //var_dump($xml);
  //print_r($xml);
