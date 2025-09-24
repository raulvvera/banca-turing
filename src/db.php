<?php
$host = "mysql-toronto.alwaysdata.net";
$user = "toronto";
$pass = "jis*#x3!xuG*3pp";
$dbname = "toronto_bd";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}
?>

