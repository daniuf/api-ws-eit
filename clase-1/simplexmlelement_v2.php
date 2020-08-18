<?php

  //Objetivo: Cargar el XML dentro de una variable de PHP
  $xml = new simpleXMLElement('notas.xml', null, true);

  echo "<pre>";
  var_dump($xml);
  echo "</pre>";
  //var_dump($xml);
  //print_r($xml);
