<?php
@session_start();

require "autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

// Cargamos la configuración de Twitter.
require('config.php');

$access_token = $_SESSION['access_token'];
	$access_token_secret = $_SESSION['access_token_secret'];
					  
		$conexion = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
	$content = $conexion->get("account/verify_credentials");

	// Referencia de la API de Twitter: https://dev.twitter.com/rest/reference/get/statuses/user_timeline
	$prueba = $conexion->get("users/search", array("q" => $_SESSION['usuario_twitter']));
		
		
				print_r($prueba);
				foreach($prueba  as $p){				
					
				}
				?>