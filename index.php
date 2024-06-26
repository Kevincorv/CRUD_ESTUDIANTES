<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Estudiantes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">CRUD ESTUDIANTES</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
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

<div class="container mt-5">
    <h1 class="mb-4">Lista de Estudiantes</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Género</th>
                    <th>Carrera</th>
                    <th>Materias Cursadas</th>
                    <th>Número de Teléfono</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resultado = $conn->query("SELECT * FROM estudiantes");
                while ($fila = $resultado->fetch_assoc()) {
                    $fecha_nacimiento = new DateTime($fila['fecha_nacimiento']);
                    $hoy = new DateTime('today');
                    $edad = $fecha_nacimiento->diff($hoy)->y;
                    echo "<tr>
                            <td>{$fila['id']}</td>
                            <td>{$fila['nombre_completo']}</td>
                            <td>{$fila['fecha_nacimiento']}</td>
                            <td>{$fila['genero']}</td>
                            <td>{$fila['carrera']}</td>
                            <td>{$fila['materias_cursadas']}</td>
                            <td>{$fila['telefono']}</td>
                            <td>{$edad}</td>
                            <td>
                                <a href='editar.php?id={$fila['id']}' class='btn btn-warning btn-sm'>MODIFICAR</a>
                                <a href='eliminar.php?id={$fila['id']}' class='btn btn-danger btn-sm'>ELIMINAR  </a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
