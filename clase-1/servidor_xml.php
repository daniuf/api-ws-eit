<?php

/**
 * Creamos un "Web Service" que entrega como salida un documento XML
 */

$librosEnCasa = array(//Esta estructura/info vendria de nuestro origen de datos (DB, Archivo, Otro WebService)
		   array('titulo' => 'Harry Potter', 
			 'autor' => 'JR Rowling',
			 'editorial' => 'Planeta',
			 'anio' => 2009),
		   array('titulo' => 'El secreto de sus ojos',
			 'autor' => 'Eduardo Sacheri',
			 'editorial' => '',
			 'anio' => '')
		);

$xml = new SimpleXMLElement("<libros></libros>");
$xml->addAttribute('version', '1.0');
$xml->addAttribute('encoding', 'UTF-8');

for ($i = 0; $i < count($librosEnCasa); $i++) {

  $libro = $xml->addChild('libro');
  $libro->addAttribute('isbn');
  $libro->addChild('titulo', $librosEnCasa[$i]['titulo']);
  $libro->addChild('autor', $librosEnCasa[$i]['autor']);
  $libro->addChild('anio_publicacion', $librosEnCasa[$i]['anio']);
  $libro->addChild('editorial', $librosEnCasa[$i]['editorial']);
  $libro->addChild('imagen_tapa');
}

header("Content-Type: text/xml");
echo $xml->asXML();
