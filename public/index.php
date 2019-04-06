<?php

session_start();

						//echo "<br>-> Entrou no index.php <br>";

require_once '../vendor/autoload.php';
$init = new \App\Init;

//echo $init->getUrl();