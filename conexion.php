<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$basedatos = "registro_estudiantes";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contraseña, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
