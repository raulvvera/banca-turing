<?php
require_once "funciones.php";

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = trim($_POST["dni"]);
    $nombre = trim($_POST["nombre"]);
    $direccion = trim($_POST["direccion"]);
    $telefono = trim($_POST["telefono"]);

    if (dniExists($dni)) {
        $error = "❌ El DNI ya existe en la base de datos.";
    } else {
        $stmt = $conn->prepare("INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $dni, $nombre, $direccion, $telefono);
        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Error al guardar el cliente.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir Cliente - Banca Turing</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <h2>Añadir Cliente</h2>
        <div class="centrar">
            <img src="./img/banco.jpg" alt="foto banco">
        </div>

    </header>
    <div id="principal">


        <?php if ($error): ?>
        <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <label>DNI: <input type="text" name="dni" required></label><br>
            <label>Nombre: <input type="text" name="nombre" required></label><br>
            <label>Dirección: <input type="text" name="direccion" required></label><br>
            <label>Teléfono: <input type="text" name="telefono" required></label><br>
            <button type="submit">Guardar</button>
        </form>

    </div>
    <p><a href="index.php">⬅ Volver</a></p>
</body>

</html>