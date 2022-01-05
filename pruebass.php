



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


class api{




function corre(){

	$url_api="api.stagingeb.com/v1/";
$module="properties";
$headers=array(
		'Content-Type: application/json',
		'X-Authorization: l7u502p8v46ba3ppgvj5y2aad50lb9'
	);
$curl = curl_init(); 


$url=$url_api.$module;
$peticion="GET";

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url, 
			CURLOPT_RETURNTRANSFER => true, 
			CURLOPT_FOLLOWLOCATION => true, 
			CURLOPT_ENCODING => "", 
			CURLOPT_MAXREDIRS => 10, 
			CURLOPT_TIMEOUT => 30, 
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
			CURLOPT_CUSTOMREQUEST => $peticion, 
			CURLOPT_HTTPHEADER => $headers, 
		)); 

$response = curl_exec($curl);

$err = curl_error($curl); 

curl_close($curl); 

if ($err) {
	echo "cURL Error #:" . $err; 
} else {
	
	$cadena=json_decode($response);

	echo "<div class='container-fluid'>
  			<div class='row'>";

	foreach ($cadena->content as $key=>$valor) {
		

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

}

}


$run_appi = new api();
$run_appi->corre();



?>



</body>
</html>
