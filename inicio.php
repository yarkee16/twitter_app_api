<?php
session_start();
include('oautphp/OAuthTwitter/mi_perfil.php');	
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Twitter App</title>
<link rel="icon" type="image/png" href="/twitteryarkee/fondo/Twitter-icon-3.png" />
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css">	
<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300" rel="stylesheet" type="text/css">
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="js/respond.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/jquery.simplyCountable.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<!-- HTML5 shim for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->
</head>
<body onLoad="">
<div id="fondo"><img src="fondo/fondoimg.jpg" alt=""></div>
<div id="resultado" style="display:none"></div>
	<div class="gridContainer clearfix">
    <div id="cabecera">
    	<div id="cabinf">
        <div id="usuarioimg">
        <!--<a href='https://twitter.com/<?php echo $_SESSION['usuario_twitter']; ?>' target=_blank>--><img id="imagenperfil" src="<?php echo $_SESSION['imagen_usuario']; ?>" alt="Mi perfil"><!--</a>-->
        </div>
        <a href='https://twitter.com/<?php echo $_SESSION['usuario_twitter']; ?>' target=_blank>
        <div id="nombre_usuario_inicio">
		<?php echo "<span id='nombre'>".$_SESSION['nombre_usuario']."</span>"."<span id='usuario'>"."<br>@".$_SESSION['usuario_twitter']."</span>"; ?>
        </div></a>
        <div id="logo">
        <a href="inicio.php"><img src="fondo/Twitter.png" alt=""/></a>
        </div>
        <form action="oautphp/OAuthTwitter/cerrar_sesion.php" method="post" id="cerrarsesion" name="cerrarsesion"><input id="bsalir" type="submit" value="Cerrar sesion"><input id="salir" type="image" src="fondo/salir_menu_icono.png"></form></div>
    </div>
    <div id="menudl">
<ul class="menu">
        <li><a href="perfil.php">Ver perfil</a></li>
        <li><a href="perfil.php">Estados</a></li>
        <li><a href="oautphp/OAuthTwitter/cerrar_sesion.php">Salir</a></li>
      </ul>
</div>
    <div id="conttimeline">
    	<section id="timeline">
		<?php
			include('oautphp/OAuthTwitter/estados.php');
			mostrarTweets('tweets.txt'); 
		?>
	</section>
    </div>
		<div id="contenedortweet">
        	<div id="formtweet">
            	<span class="titulo">Publica tu Tweet...</span>
        		<form action="" name="tweet" id="tweet" method="post">
        			<textarea name="tweettexto" cols="50" rows="2" autofocus id="tweettexto" placeholder="¿Que estas pensando?..."></textarea>
                    <input type="submit" value="Twittear"><span id="contador"></span>
              </form>
          	</div>
        </div>
        <div id="botont">TWITTEAR ALGO</div>
	</div>
</body>
</html>
