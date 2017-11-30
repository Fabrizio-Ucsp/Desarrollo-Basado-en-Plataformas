<?php  
session_start();
//include 'check.php';
echo "<div style='border: solid blue;'><h1 style='text-align: center;color: white '><i>Hola ".$_SESSION['usua']."</i></h1></div>";
$ingreso=$_SESSION['usua'];
?>

<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<title>Perfil del usuario</title>
	<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
	<script>
		var GlobalUser;
		var alumnosPorCodigo = {};
		var mensajesPorRemitente = {};
		function cargarAlumnos() {
		  jQuery.ajax({method: "GET", url: "usuarios.json.php", dataType: 'text'}).done(function( responseText ) {
		      var json = JSON.parse(responseText);
		      var html = "<tr bgcolor='blue' style='color:white'><td>Usuario</td><td>pais</td><td>NumeroCelular</td><td>Nombre</td></tr>";
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
		  GlobalUser=usuario_test;
		  jQuery.ajax({method: "GET", url: "mensajes.json.php?usuario_test="+ usuario_test, dataType: 'text'}).done(function( responseText ) {
		      var json = JSON.parse(responseText);
		      var html = "<tr bgcolor='blue'><td>Enviado por </td><td>Fecha_enviado</td><td>Contenido</td><	/tr>";
		      for (var i=0; i<json.length; i++) {
		      	if (json[i].remitente==usuario_test) {
		          html += "<tr><td>" + json[i].remitente + "</td><td>";
		          html += json[i].fecha_enviado + "</td><td align='left'><span class='btn btn-primary,badge badge-warning'>";
		          html += json[i].contenido + "</span></td>";
		      	}else{
		      		html += "<tr><td>" + json[i].remitente + "</td><td>";
		          html += json[i].fecha_enviado + "</td><td align='right'><span class='btn btn-primary,badge badge-success'>";
		          html += json[i].contenido + "</span></td>";
		      	}
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
		  cargarMensajes(GlobalUser);
		  //alert(responseText);
		  });
		}
	</script>
</head>
<body onload="cargarAlumnos()" background="http://www.dgi-sll.com/wp-content/themes/Shuttershot/images/fondos/6.jpg">
<div id="chat" style=" border:3px solid red; position: relative; " >
	<div id="usuarios" style="position: absolute;width: 40%;margin-left: 50%;">
 
		<table id="alumnos" border="1" align="center" width="100%" class="table table-sm table-dark" >
 		</table>
			
	</div>
</div>
<div id="mensajes_recibidos" style="border: 1px solid black;width: 50% ;padding: 15px;background-image: url(https://www-cdn.whatsapp.net/img/v4/whatsapp-promo.png?v=7ab7fe1);" >
		<h2 >Mensajes Enviados Y recibidos:</h2>

		<table id="mensajes"  width="95%" class="table table-sm table-dark">
 		</table> 	

</div>
<div id="mensaje_enviar" style="padding: 15px;border: solid black;height: 200px;width: 855px;background-image: url(https://image.freepik.com/psd-gratis/fondo-geometrico-azul_1297-168.jpg)">
		<h3>Nuevo Mensaje</h3>
		 <table id="nuevo-mensaje" border="1">
		  <tr><td>fecha_enviado</td><td><input id="fecha_enviado" value="<?php echo date("Y/m/d"); ?>" /></td></tr>
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