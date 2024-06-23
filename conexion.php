<?php
$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "root"; // Reemplaza con tu nombre de usuario de MySQL
$password = "tu_contraseña"; // Reemplaza con tu contraseña de MySQL
$dbname = "registro_estudiantes"; // Reemplaza con el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
