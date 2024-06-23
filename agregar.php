<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Estudiante</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            background-image: url('img/catolica_sanignacio.jpeg'); /* Ruta de tu imagen de fondo */
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco con transparencia */
            background-blend-mode: lighten; /* Mezcla para la transparencia */
            background-size: cover; /* Cubrir toda la pantalla */
            background-attachment: fixed; /* Fijar la imagen de fondo */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CRUD ESTUDIANTES</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Lista de Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agregar.php">Agregar Estudiante</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
    <div class="form-container">
        <h1 class="mt-5">Agregar Estudiante</h1>
        <form action="agregar.php" method="POST">
            <div class="form-group">
                <label for="nombre_completo">Nombre Completo</label>
                <input type="text" class="form-control" name="nombre_completo" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" required>
            </div>
            <div class="form-group">
                <label for="genero">Género</label>
                <select class="form-control" name="genero" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera</label>
                <select class="form-control" name="carrera" required>
                    <option value="Ingeniería">Ingeniería</option>
                    <option value="Ciencias">Ciencias</option>
                    <option value="Artes">Artes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="materias_cursadas">Materias Cursadas</label>
                <input type="number" class="form-control" name="materias_cursadas" required>
            </div>
            <div class="form-group">
                <label for="telefono">Número de Teléfono</label>
                <input type="text" class="form-control" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" class="form-control" name="edad" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Estudiante</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_completo = $_POST['nombre_completo'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $genero = $_POST['genero'];
            $carrera = $_POST['carrera'];
            $materias_cursadas = $_POST['materias_cursadas'];
            $telefono = $_POST['telefono'];
            $edad = calcularEdad($fecha_nacimiento);

            $sql = "INSERT INTO estudiantes (nombre_completo, fecha_nacimiento, genero, carrera, materias_cursadas, telefono, edad)
                    VALUES ('$nombre_completo', '$fecha_nacimiento', '$genero', '$carrera', '$materias_cursadas', '$telefono', '$edad')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>Nuevo registro creado exitosamente</div>";
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        }

        function calcularEdad($fecha_nacimiento) {
            $fecha_nacimiento = new DateTime($fecha_nacimiento);
            $hoy = new DateTime('today');
            $edad = $fecha_nacimiento->diff($hoy)->y;
            return $edad;
        }
        ?>
    </div>
</body>
</html>
