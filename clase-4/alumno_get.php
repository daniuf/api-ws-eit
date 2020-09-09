<?php

echo "Recibimos peticion a /alumno por metodo GET".PHP_EOL;


if (isset($_GET['id'])) {
	echo "Tenemos que buscar la info de ".$_GET['id'];
}
