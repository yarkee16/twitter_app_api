<?php
@session_start();

require "autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

// Cargamos la configuración de Twitter.
require('config.php');

//echo "<h1>Autenticación OAuth con Twitter</h1>";

// Hacemos la conexión a Twitter usando el Consumer_key y el Consumer_Secret.
$conexion = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

// Solicitamos el Request Token que identificará a la aplicación en Twitter.
// ATENCIÓN !!! : en Twitter el Request Token se llama Oauth Token.

// Este token es válido solamente para un único uso
// Se necesita un consumer_key y consumer_secret para solicitar ese token.
$request_token = $conexion->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
//print_r($request_token);

// Los almacenamos en una variable de sesión.
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
  
// Una vez que ya tenemos los oauth_token y oauth_token_secret.
// Ahora es el paso de la autenticación del usuario.

// Necesitamos que el usuario se autentique en Twitter y permitir el acceso a la aplicación.
// En $url tenemos la url de autenticación dónde se le pasa el oauth_token.
$url = $conexion->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

// Creamos el hiperenlace para que el usuario se autentique.
// Cuando se haya producido la autenticación Twitter nos devolverá a la página callback.php
// que hemos definido en la petición del Request_token
// Y nos devolverá un oauth_token y oauth_verifier. 

//echo "<br/><a href='$url'><img src='https://twitteroauth.com/images/sign-in-with-twitter-link.png'></a>";

header("location: $url");