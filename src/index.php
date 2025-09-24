<?php
require_once "funciones.php";

$order = isset($_GET['order']) ? $_GET['order'] : "nombre";
$clientes = getClientes($order);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Banca Turing - Clientes</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <h1>Listado de Clientes</h1>
        <div class="centrar">
            <img src="./img/banco.jpg" alt="foto banco">
        </div>
    </header>

    <div id="principal">

        <table border="1">
            <tr>
                <th><a href="?order=dni">DNI</a></th>
                <th><a href="?order=nombre">Nombre</a></th>
                <th><a href="?order=direccion">Dirección</a></th>
                <th><a href="?order=telefono">Teléfono</a></th>
            </tr>
            <?php while ($row = $clientes->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['dni']) ?></td>
                <td><?= htmlspecialchars($row['nombre']) ?></td>
                <td><?= htmlspecialchars($row['direccion']) ?></td>
                <td><?= htmlspecialchars($row['telefono']) ?></td>
            </tr>
            <?php endwhile; ?>
            
        </table>
    
    </div>
    <p><a href="add.php">➕ Añadir Cliente</a></p> 
</body>

</html>