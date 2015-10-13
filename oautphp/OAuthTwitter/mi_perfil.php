<?php
@session_start();

require "autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

// Cargamos la configuración de Twitter.
require('oautphp/OAuthTwitter/config.php');

$access_token = $_SESSION['access_token'];
	$access_token_secret = $_SESSION['access_token_secret'];
					  
		$conexion = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
	$content = $conexion->get("account/verify_credentials");

	// Referencia de la API de Twitter: https://dev.twitter.com/rest/reference/get/statuses/user_timeline
	$mi_perfil = $conexion->get("users/search", array("q" => $_SESSION['usuario_twitter']));
		
		
					
				foreach($mi_perfil  as $perfil){				
				$_SESSION['nombre_usuario']= $perfil->name;	
				$_SESSION['imagen_usuario']=$perfil->profile_image_url;
				$_SESSION['imagen_portada']=$perfil->profile_banner_url;
				$_SESSION['cant_tweets']=$perfil->statuses_count;
				$_SESSION['cant_siguiendo']=$perfil->friends_count;
				$_SESSION['cant_seguidores']=$perfil->followers_count;
				$_SESSION['cant_favoritos']=$perfil->favourites_count;
				$_SESSION['creado']=$perfil->created_at;
				$_SESSION['localizacion']=$perfil->location;
				}
				?>
