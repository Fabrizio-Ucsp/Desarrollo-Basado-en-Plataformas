<?php 
session_start();
if (!empty($_POST['submit'])) {
	$user=$_POST['usua'];
	$pass=$_POST['passw'];

	$servername = "localhost";
	$username = "boss";
	$password = "123";
	$dbname = "proyecto_final";
	if (!empty($user)) {

		if (!empty($pass)) {

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			  	die("Connection failed: " . $conn->connect_error);
			} 
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 


			$sql = "SELECT * FROM usuarios where usuario = '$user'and password = '$pass' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    
			    while($row = $result->fetch_assoc()) {
			    	$_SESSION['usua']=$row["usuario"];
			    	header("Location: perfil.php");
			    }
			} else {
			    echo "Usuario o Contraseña incorrectas";
			}
			$conn->close();


		}else{
			echo "<script>alert('Ingrese su password');</script>";
		}
	}else{
		echo "<script>alert('Ingrese su usuario');</script>";
	}
}
?>
	

<!DOCTYPE html>
<html>
<head>
	<title>Pagina de Login</title>
</head>
<body background="http://www.dgi-sll.com/wp-content/themes/Shuttershot/images/fondos/6.jpg">
	<div style="border: solid blue;background-image: url(https://vignette3.wikia.nocookie.net/angrybirds/images/a/a0/Fondo_de_navidad_Chat.png/revision/latest?cb=20141210232835&path-prefix=es)">
	<h1 style="text-align: center;color: white "><i>Inicio de Sesion</i></h1>
	</div>
	<br>
	<div style="text-align: center;">
	<form action="login.php" method="POST">
		Usuario: <input type="text" name="usua"><br><br>
		Password: <input type="password" name="passw"><br><br>
		<input type="submit" name="submit">
	</form>
	</div>
	<br>
	<br>
	<br>
	<form method="link" action="main_test.html"> <input TYPE="submit" VALUE="volver al inicio"> </form>
	<br>
</body>
</html>