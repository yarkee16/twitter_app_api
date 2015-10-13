$(document).ready(function() {
	$("#tweet").submit(function(){
	tweet=$("#tweettexto").val();
	
	if(tweet==""){
		$(".error").remove();
		$("#resultado").append('<div class="error">Es imposible enviar un tweet en blanco.!!</div>');
		$("#resultado").fadeIn();
		setTimeout(function(){$("#resultado").fadeOut();},3000);
	}
	else{
		$.ajax({
			type:'POST',
			url:"oautphp/OAuthTwitter/publicar.php",
			data:$(this).serialize()
		});
		$(".error").remove();
		$("#resultado").append('<div class="error">El tweet ha sido publicado con exito.!!</div>');
		$("#resultado").fadeIn();
		setTimeout(function(){$("#resultado").fadeOut();},3000);
		setTimeout(function(){location.reload();},4000);
		$("#tweettexto").val("");
	}
	return false;
	});
	$("#contenedortweet").slideToggle();
	$("#botont").click(function(){
		$("#contenedortweet").slideToggle();
	});
});
$(document).ready(function() {
	$("#tweettexto").simplyCountable({
	counter:'#contador',
	maxCounter:140,
	strictMax:true,
	});
	$("#menudl").slideToggle();
	$("#usuarioimg").click(function(){
		$("#menudl").slideToggle();
	});
});

function limpiarform(){
	$("#tweettexto").val("");
}
