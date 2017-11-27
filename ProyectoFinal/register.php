<?php 
$pass1=0;
$pass2=0;
if (!empty($_POST['submit'])) {
	$user=$_POST['usuario'];
	$cel=$_POST['celular'];
	$lug=$_POST['pais'];
	$pass1=$_POST['password'];
	$pass2=$_POST['password2'];
	$nomb=$_POST['nombre'];
	//echo $user."<br>".$cel."<br>".$lug."<br>".$pass1."<br>".$pass2."<br>";
	$servername = "localhost";
	$username = "boss";
	$password = "123";
	$dbname = "proyecto_final";
}
if ($pass1==$pass2) {
	if (!empty($user)) {
		if (!empty($cel)) {
			if (!empty($lug)) {
				if(!empty($nomb)){
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
	    				die("Connection failed: " . $conn->connect_error);
					} 

					$sql = "INSERT INTO usuarios (id,usuario, celular, pais, password, nombre)
					VALUES ('', '".$user."',  '".$cel."', '".$lug."', '".$pass1."', '".$nomb."')";
					if ($conn->query($sql) === TRUE) {
	    				header("Location: registro_exitoso.php");
					} else {
	    				echo "Error: " . $sql . "<br>" . $conn->error;
					}
					$conn->close();
				}else{
					echo "<script>alert('Ingrese su Nommbre');</script>";
				}
			}else{
				echo "<script>alert('Ingrese su Lugar de Nacimiento');</script>";
			}
		}else{
			echo "<script>alert('Ingrese su Numero Telefonico');</script>";
		}
	}else{
		echo "<script>alert('Ingrese su nombre de usuario');</script>";
	}
}else{
	echo "<script>alert('Sus contraseñas no son iguales');</script>";
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<body background="http://www.dgi-sll.com/wp-content/themes/Shuttershot/images/fondos/6.jpg">
	<div style="border: solid blue;background-image: url(https://vignette3.wikia.nocookie.net/angrybirds/images/a/a0/Fondo_de_navidad_Chat.png/revision/latest?cb=20141210232835&path-prefix=es)">
	<h1 style="text-align: center;color: white "><i>Pagina de Registro</i></h1>
	</div>
	<br>
	<div style="padding-left: 500px">
	<form action="register.php" method="POST">
		Usuario: <input type="text" name="usuario"><br><br>
		Numero Celular: <input type="text" name="celular"><br><br>
		Lugar de Nacimiento: <input type="text" name="pais"><br><br>
		Password: <input type="password" name="password"><br><br>
		Confirme su password: <input type="password" name="password2"><br><br>
		Nombre: <input type="text" name="nombre"><br><br>
		<input type="submit" name="submit" value="submit"><br>
	</form>
	</div>
	<br>
	<br>
	<br>
	<form method="link" action="main_test.html"> <input TYPE="submit" VALUE="volver al inicio"> </form>
	<br>
</body>
</html>