<?php

//Objetivo: Cargar el XML dentro de una variable de PHP, pero usando simplexml_load_file

  $xml = simplexml_load_file('notas.xml');

  if ($xml) {

   for ($i = 0; $i < count($xml->note); $i++) {
  
    echo "<h1>".$xml->note[$i]->heading."</h1>";
    echo "<p>Para: ".$xml->note[$i]->to."</p>";
    echo "<p>De: ".$xml->note[$i]->from."</p>";
    echo "<p>Fecha: ".$xml->note[$i]->fecha."</p>";
  
   }
  }
  //var_dump($xml);
  //print_r($xml);
