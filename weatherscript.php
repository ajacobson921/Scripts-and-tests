<?php

//Made by Dr. Wallapak Tavanapong, Iowa State University and edited by Aaron Jacobson

//Note: you'll need your own API key from Forecast.io 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.forecast.io/forecast/APIKEY/latitude,longitude');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // ensure that curl_exec return the data not print out on the browser
if (!$ch) {
	die( "Cannot allocate a new PHP-CURL handle" );
}

// Get the data from the site and save it in the variable data which is in JSON format
$data=curl_exec($ch);

//print $data; // uncomment this to see what the site returns -- it's the JSON file.

if ($data != "") {
   // decode the JSON format to become a PHP object;
   $dataobj = json_decode($data);
   // Show the weather
   $weather = "Weather at location: ".$dataobj->currently->icon.PHP_EOL;
   $temp = "It is ".$dataobj->currently->temperature." degrees F.".PHP_EOL;
   echo $weather;
   echo $temp;

}

curl_close($ch);

?>