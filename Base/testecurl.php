<?php 

use Base\Curl;

require_once 'icurl.php';
require_once 'Curl.php';

$curl = new Curl('https://swapi.co/api/');

echo "<pre> Curl Class for to make request <br />";

print_r($curl);

$curl->curl_setopt();

$ArSWJson = $curl->getOutput();

echo "Result from: https://swapi.co/api/ <br />";

print_R($curl->convertJSonResponse());

echo "</pre>";


$curl = new Curl('https://swapi.co/api/people/4/');

echo "<pre> Curl Class for to make request <br />";

print_r($curl);

$curl->curl_setopt();

$ArSWJson = $curl->getOutput();

echo "Result from: https://swapi.co/api/ <br />";

print_R($curl->convertJSonResponse());

echo "</pre>";