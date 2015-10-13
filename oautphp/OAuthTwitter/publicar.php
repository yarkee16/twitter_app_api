<?php
@session_start();

require "autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

// Cargamos la configuración de Twitter.
require('config.php');

$_SESSION['pagina'] = $_SERVER['REQUEST_URI'];

// Si no tenemos el access token lo solicitamos redireccionando al login.php
if (!isset($_SESSION['access_token']))
	header('location: login.php');
else
{
	// Enviamos cabecera UTF-8
	header('Content-type: text/html; charset=utf-8');

	// Obtenemos el access_token y access_token_secret.
	// En este caso los sacamos de la variable de sesión.
	$access_token = $_SESSION['access_token'];
	$access_token_secret = $_SESSION['access_token_secret'];

	// Creamos la conexión con Twitter
	$conexion = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);

	// Si recibimos una actualización de estado lo publicamos.
	if (!empty($_POST['tweettexto']))
	{
		$conexion->post('statuses/update',array('status'=>$_POST['tweettexto']));
		echo "<h2>Su post se ha publicado en Twitter correctamente.</h2>";
		echo "<a href='publicar.php'>Volver</a>";
	}
}