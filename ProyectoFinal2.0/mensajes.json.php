<?php  
session_start();
$ingreso=$_SESSION['usua'];
?>

<?php
header("Content-Type: text/javascript");

$dbhost = "localhost";
$dbuser = "boss";
$dbpass = "123";
$db = "proyecto_final";

$usuario_test = $_GET["usuario_test"];

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT fecha_enviado, remitente, destinatario, contenido FROM mensajes WHERE remitente='$usuario_test' and destinatario='$ingreso' or remitente='$ingreso' and destinatario='$usuario_test' ORDER BY fecha_enviado";
$result = $conn->query($sql);
$users = array();

while($row = $result->fetch_assoc()) {
    $remitente = $row["remitente"];
    $item = '{"remitente": "' . $remitente . '", "fecha_enviado": "' . $row["fecha_enviado"];
    $item .= '", "destinatario": "' . $row["destinatario"];
    $item .= '", "contenido": "' . $row["contenido"]. '"}';
    array_push($users, $item);
}




echo "[" . implode(", ", $users) . "]";



$conn->close();
?>