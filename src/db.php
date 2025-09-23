<?php
$host = "db";
$user = "root";
$pass = "test";
$dbname = "banco";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}
?>

