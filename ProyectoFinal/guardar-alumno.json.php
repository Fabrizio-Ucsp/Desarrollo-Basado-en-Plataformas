<?php  
session_start();
$ingreso=$_SESSION['usua'];
?>

<?php
//ini_set( 'display_errors', 0 );

header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);

$dbhost = "localhost";
$dbuser = "boss";
$dbpass = "123";
$db = "proyecto_final";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT fecha_enviado FROM mensajes WHERE fecha_enviado='" . $data["mensajeenviado"] . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$sql = "INSERT INTO mensajes (id,fecha_enviado, remitente, destinatario, contenido) ";
	$sql .= " VALUES ('','" . $data["fecha_enviado"] . "', '" . $ingreso . "', '";
	$sql .= $data["destinatario"] . "', '" . $data["contenido"] . "')";
}

$result = $conn->query($sql);

if ($result === TRUE) {
	echo '{"usuario": "' . $data["usuario"] . '"}';
}
else {
	echo '{"error": "No se pudo guardar el alumno"}';
}
$conn->close();
?>