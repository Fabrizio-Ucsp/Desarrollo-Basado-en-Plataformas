<?php
header("Content-Type: text/javascript");

$dbhost = "localhost";
$dbuser = "boss";
$dbpass = "123";
$db = "proyecto_final";
 
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT usuario, celular, pais, nombre FROM usuarios";
$result = $conn->query($sql);
$users = array();

while($row = $result->fetch_assoc()) {
    $usuario = $row["usuario"];
    $item = '{"usuario": "' . $usuario . '", "nombre": "' . $row["nombre"];
    $item .= '", "celular": "' . $row["celular"];
    $item .= '", "pais": "' . $row["pais"]. '"}';
    array_push($users, $item);
}
echo "[" . implode(", ", $users) . "]";

$conn->close();
?>