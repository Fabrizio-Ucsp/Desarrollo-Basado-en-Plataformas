<?php  
session_start();
//include 'check.php';
echo "<div style='border: solid blue;'><h1 style='text-align: center;color: white '><i>Hola ".$_SESSION['usua']."</i></h1></div>";
$ingreso=$_SESSION['usua'];
?>

<!DOCTYPE html>

<html>
<head>
	<title>Perfil del usuario</title>
	<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
	<script>
		var alumnosPorCodigo = {};
		var mensajesPorRemitente = {};
		function cargarAlumnos() {
		  jQuery.ajax({method: "GET", url: "usuarios.json.php", dataType: 'text'}).done(function( responseText ) {
		      var json = JSON.parse(responseText);
		      var html = "<tr bgcolor='blue'><td>Usuario</td><td>pais</td><td>NumeroCelular</td><td>Nombre</td></tr>";
		      for (var i=0; i<json.length; i++) {
		          html += "<tr onclick='cargarMensajes(\"" + json[i].usuario + "\")'><td>" + json[i].usuario + "</td><td>";
		          html += json[i].pais + "</td><td>";
		          html += json[i].celular + "</td><td>";
		          html += json[i].nombre + "</td>";
				  
				  alumnosPorCodigo[json[i].usuario] = json[i];
		      }
		      jQuery("#alumnos").html(html);
		  });
		}
		function cargarMensajes(usuario_test) {
		  jQuery.ajax({method: "GET", url: "mensajes.json.php?usuario_test="+ usuario_test, dataType: 'text'}).done(function( responseText ) {
		      var json = JSON.parse(responseText);
		      var html = "<tr bgcolor='blue'><td>Remitente</td><td>Fecha_enviado</td><td>destinatario</td><td>contenido</td></tr>";
		      for (var i=0; i<json.length; i++) {
		          html += "<tr " + json[i].remitente + "><td>" + json[i].remitente + "</td><td>";
		          html += json[i].fecha_enviado + "</td><td>";
		          html += json[i].destinatario + "</td><td>";
		          html += json[i].contenido + "</td>";
		      
		      mensajesPorRemitente[json[i].usuario] = json[i];
		      }
		      jQuery("#mensajes").html(html);
		  });
		}
		function guardarMensaje() {
		  var mensajeenviado = {
		  "fecha_enviado": jQuery("#fecha_enviado").val(),
		  "destinatario":  jQuery("#destinatario").val(),
		  "contenido":  jQuery("#contenido").val()
		  };
		  jQuery.ajax({method: "POST", url: "guardar-alumno.json.php", data: JSON.stringify(mensajeenviado), dataType: 'text'}).done(function( responseText ) {
		  cargarAlumnos();
		  //alert(responseText);
		  });
		}
	</script>
</head>
<body onload="cargarAlumnos()" background="http://www.dgi-sll.com/wp-content/themes/Shuttershot/images/fondos/6.jpg">
<div id="chat" style=" border:3px solid red; position: relative; " >
	<div id="usuarios" style="border: 1px solid black;position: absolute;width: 40%;margin-left: 55%;background-color: #18BF9C;">
 
		<table id="alumnos" border="1" align="center" width="100%" >
 		</table>
		
	</div>
	<div id="mensajes_recibidos" style="border: 1px solid black;width: 50% ;padding: 15px;background-image: url(https://www-cdn.whatsapp.net/img/v4/whatsapp-promo.png?v=7ab7fe1);" >
		<h2 >Mensajes Enviados Y recibidos:</h2>

		<table id="mensajes" border="1" width="95%">
 		</table>


	</div>

	<div id="mensaje_enviar" style="padding: 15px;border: solid black;height: 50%;">
		<h3>Nuevo Mensaje</h3>
		 <table id="nuevo-mensaje" border="1">
		  <tr><td>fecha_enviado</td><td><input id="fecha_enviado" /></td></tr>
		  <tr><td>destinatario</td><td><input id="destinatario" /></td></tr>
		  <tr><td>contenido</td><td><input id="contenido" /></td></tr>
		 </table>
		 <button onclick="guardarMensaje()">Enviar</button>
		</body>

	</div>
	
</div>
<form method="link" action="cerrar_session.php"> <input TYPE="submit" VALUE="Cerrar Sesion"> </form>
<br>
</body>
</html>