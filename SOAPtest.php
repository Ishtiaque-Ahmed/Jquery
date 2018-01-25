<?php
    //phpinfo();
	echo "start"; ?>
<?php 
//Create the client object
$soapclient = new SoapClient('http://www.webservicex.net/globalweather.asmx?WSDL');

//Use the functions of the client, the params of the function are in 
//the associative array
$params = array('CountryName' => 'Spain', 'CityName' => 'Alicante');
$response = $soapclient->getWeather($params);

var_dump($response);

// Get the Cities By Country
$param = array('CountryName' => 'Spain');
$response = $soapclient->getCitiesByCountry($param);

var_dump($response);