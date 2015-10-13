<?php
@session_start();

require "autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

// Cargamos la configuración de Twitter.
require('config.php');

// En la página de callback comprobamos si el oauth token que nos devuelve en el callback desde Twitter
//  coincide con el que tenemos grabado en la variable de sesión.
if (isset($_REQUEST['oauth_token']) && $_REQUEST['oauth_token'] !== $_SESSION['oauth_token']) {
    die(' Error en la autenticación '.$_SESSION['oauth_token']);
}

// Si llega aquí se supone que el usuario se ha autenticado correctamente y solamente
// nos falta intercambiar los request_token de la aplicación por los access_token 
// que nos permitirán acceder a Twitter como ese usuario recién autenticado.
// Estos datos son los que tendríamos que almacenar si quisiéramos por ejemplo 
// publicar en Twitter con ese usuario en cualquier momento.

// Creamos de nuevo la conexión a Twitter pero en este caso pasando 
// el request_token y request_token_secret para intercambiarlos por los access token y access token secret.
$conexion = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

// Obtenemos finalmente los Access Token en las variables oauth_token y oauth_token_secret
$access_token = $conexion->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));

// Ahora es cuando guardaríamos en la base de datos o en una sesión los access_token y access_token_secret de ese usuario.
$_SESSION['access_token'] = $access_token['oauth_token'];
$_SESSION['access_token_secret'] = $access_token['oauth_token_secret'];
$_SESSION['usuario_twitter'] = $access_token['screen_name'];

//echo $_SESSION['access_token']['screen_name'];
if (isset($_SESSION['pagina']))
	header("location: {$_SESSION['pagina']}");
else
	echo "<h2>Autenticación realizada con éxito.</h2>";
	header("location: ../../inicio.php");
//print_r($access_token);