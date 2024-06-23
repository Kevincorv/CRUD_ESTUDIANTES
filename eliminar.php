<?php
include('conexion.php');

$id = $_GET['id'];

$sql = "DELETE FROM estudiantes WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success mt-3'>Registro eliminado exitosamente</div>";
    header("Location: index.html");
    exit();
} else {
    echo "<div class='alert alert-danger mt-3'>Error eliminando el registro: " . $conn->error . "</div>";
}
?>
