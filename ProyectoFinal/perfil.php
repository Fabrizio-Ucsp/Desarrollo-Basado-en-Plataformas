<?php  
session_start();
include 'check.php';
echo "<div style='border: solid blue;'><h1 style='text-align: center;color: white '><i>Hola ".$_SESSION['usua']."</i></h1></div>";
$ingreso=$_SESSION['usua'];
?>

<!DOCTYPE html>

<html>
<head>
	<title>Perfil del usuario</title>
</head>
<body background="http://www.dgi-sll.com/wp-content/themes/Shuttershot/images/fondos/6.jpg">
<div id="chat" style=" border:3px solid red; position: relative; " >
	<div id="usuarios" style="border: 1px solid black;position: absolute;width: 40%;margin-left: 55%;background-image: url(http://www.brighidstudio.com/wp-content/uploads/2016/11/tipos-de-usuarios-imagen1.png);">
		<h2>Usuarios:</h2> 
		<?php
		$servername = "localhost";
		$username = "boss";
		$password = "123";
		$dbname = "proyecto_final";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT usuario FROM usuarios ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        echo "<br>"." - <font face='impact' size=3 color='blue'>". $row["usuario"]. " " . "</font><br>";
		    }
		}

		$conn->close();
		?> 
	</div>
	<div id="mensajes_recibidos" style="border: 1px solid black;width: 50% ;padding: 15px;background-image: url(https://www-cdn.whatsapp.net/img/v4/whatsapp-promo.png?v=7ab7fe1);" >
		<h2>Mensajes Enviados Y recibidos:</h2>
		<?php
		if (!empty($_POST['submit'])) {
		$usuario_test=$_POST['usuario_conversar'];
		$servername = "localhost";
		$username = "boss";
		$password = "123";
		$dbname = "proyecto_final";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
		$sql = "SELECT remitente, contenido FROM mensajes where destinatario='$ingreso' and  remitente ='$usuario_test'";
		$result = $conn->query($sql);
		echo "<h2> Chat con: ".$usuario_test."</h2>";
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo " <p align=left style='color: #161715; background-color: #D3E85B' >". $row["contenido"]. "</p>";
			    }
			}

			$sql = "SELECT destinatario,contenido FROM mensajes where remitente='$ingreso' and destinatario='$usuario_test' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<p align=right style='color: #161715; background-color: #6BBF18' >". $row["contenido"] . "</p>";
			    }
			}
			$conn->close();
	}
	?>
	</div>

	<div id="mensaje_enviar" style="padding: 15px;border: solid black;height: 50%;">
		<?php 
		if (!empty($_POST['submit'])) {
			$mensaje_test=$_POST['mensa'];
			$destinataio_test=$_POST['destin'];
			$fecha_test=$_POST['fech'];
		}
			$servername = "localhost";
			$username = "boss";
			$password = "123";
			$dbname = "proyecto_final";
			if (!empty($mensaje_test)) {
				if (!empty($destinataio_test)) {
					if(!empty($fecha_test)){
						$conn = new mysqli($servername, $username, $password, $dbname);
						if ($conn->connect_error) {
			    			die("Connection failed: " . $conn->connect_error);
						} 

						$sql = "INSERT INTO mensajes (id,fecha_enviado, remitente, destinatario, contenido)
						VALUES ('', '".$fecha_test."',  '".$ingreso."', '".$destinataio_test."', '".$mensaje_test."')";
						if ($conn->query($sql) === TRUE) {
			    			header("Location: perfil.php");
						} else {
			    			echo "Error: " . $sql . "<br>" . $conn->error;
						}
						$conn->close();
					}else{
						echo "<script>alert('Ingrese la fecha');</script>";
					}
				}else{
					echo "<script>alert('Ingrese un mensaje');</script>";
				}
			}else{
				echo "<script>alert('Ingrese un destinatario');</script>";
			}
		?>
		<form action="perfil.php" method="POST" >
			Mensaje: <input type="text" name="mensa" value="Mensaje"><br>
			Destinatario: <input type="text" name="destin" value="Destinatario"><br>
			Fecha: <input type="text" name="fech" value="Fecha"><br>
			<input type="submit" name="submit" value="submit"><br>
		</form>
		<form action="perfil.php" method="POST">
			Usuario con el que deseas chatear: <input type="text" name="usuario_conversar">
			<input type="submit" name="submit" value="submit"><br>
		</form>
	</div>
	
</div>
<form method="link" action="cerrar_session.php"> <input TYPE="submit" VALUE="Cerrar Sesion"> </form>
<br>
</body>
</html>