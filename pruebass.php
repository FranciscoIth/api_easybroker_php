

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


	<title></title>
</head>
<body>


<?php

$curl = curl_init(); //inicia la sesión cURL

$url_api="api.stagingeb.com/v1/";
$module="properties";
$headers=array(
		'Content-Type: application/json',
		'X-Authorization: l7u502p8v46ba3ppgvj5y2aad50lb9'
	);
$url=$url_api.$module;
$peticion="GET";

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url, //url a la que se conecta
			CURLOPT_RETURNTRANSFER => true, //devuelve el resultado como una cadena del tipo curl_exec
			CURLOPT_FOLLOWLOCATION => true, //sigue el encabezado que le envíe el servidor
			CURLOPT_ENCODING => "", // permite decodificar la respuesta y puede ser"identity", "deflate", y "gzip", si está vacío recibe todos los disponibles.
			CURLOPT_MAXREDIRS => 10, // Si usamos CURLOPT_FOLLOWLOCATION le dice el máximo de encabezados a seguir
			CURLOPT_TIMEOUT => 30, // Tiempo máximo para ejecutar
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // usa la versión declarada
			CURLOPT_CUSTOMREQUEST => $peticion, // el tipo de petición, puede ser PUT, POST, GET o Delete dependiendo del servicio
			CURLOPT_HTTPHEADER => $headers, //configura las cabeceras enviadas al servicio
		)); //curl_setopt_array configura las opciones para una transferencia cURL

$response = curl_exec($curl);// respuesta generada


$err = curl_error($curl); // muestra errores en caso de existir

curl_close($curl); // termina la sesión 

if ($err) {
	echo "cURL Error #:" . $err; // mostramos el error
} else {
	
	$cadena=json_decode($response);

	echo "<div class='container-fluid'>
  			<div class='row'>";

	foreach ($cadena->content as $valor) {
		// code...

		echo "<div class='col-sm-6'>";
		echo "<ul><li>";
		print_r($valor->title);
			echo "</div>
					</div>";

		echo "<div class='col-sm-6'>";
		echo "<img src='";
		print_r($valor->title_image_thumb);
		echo "'>";
		echo "</ul></li>";
		echo "</div>";
		echo "</div>";
		
	}

	echo "</div>
</div>";


}


///cambio de prueba

?>



</body>
</html>



