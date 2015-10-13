<?php
session_start();
unset($_SESSION['access_token']);
unset($_SESSION['oauth_token_secret']);
if (!isset($_SESSION['access_token']))
	header('location: ../../index.html');
else
{
	header('location: inicio.php');
}
session_destroy();
?>