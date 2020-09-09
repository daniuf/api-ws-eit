<?php

$key = '123456789oijnbvcfrtyuikjhbvffvbjiuyt';

if ($_SERVER['HTTP_KEY'] == $key) {//Si el API key es valido, proceso el request

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$input = json_decode(file_get_contents('php://input'));

	if ($input == null) {
  	  http_response_code(400);
	  $json = array('status' => "Bad request. Falta el JSON");
	  header("Content-Type: application/json");
	  echo json_encode($json);
	} else {
	  if (!isset($input->dni)) {
  	    http_response_code(400);
	    $json = array('status' => "Bad request. Falta clave DNI obligatoria");
	    header("Content-Type: application/json");
	    echo json_encode($json);
	    
	  } else {
	    //Ejecuto operacion de guardado y retorno el ID generado
  	    http_response_code(201);
	    $json = array('status' => "OK", 'id' => uniqid());
	    header("Content-Type: application/json");
	    echo json_encode($json);
          }
	}
  }

} else {

  http_response_code(401);
  $json = array('status' => "Unauthorized access");
  header("Content-Type: application/json");
  echo json_encode($json);
}
