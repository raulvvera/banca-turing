<?php
require_once "db.php";

// Verificar si un DNI ya existe en la tabla cliente
function dniExists($dni) {
    global $conn;
    $stmt = $conn->prepare("SELECT dni FROM cliente WHERE dni = ?");
    $stmt->bind_param("s", $dni);
    $stmt->execute();
    $result = $stmt->get_result();
    return ($result->num_rows > 0);
}

// Obtener listado de clientes con orden
function getClientes($orderBy = "nombre") {
    global $conn;
    $allowed = ["dni", "nombre", "direccion", "telefono"];
    if (!in_array($orderBy, $allowed)) {
        $orderBy = "nombre";
    }
    $sql = "SELECT * FROM cliente ORDER BY $orderBy ASC";
    return $conn->query($sql);
}
?>
