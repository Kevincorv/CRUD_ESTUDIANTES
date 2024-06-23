<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CRUD Estudiantes</a>
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
        <h1 class="mt-5">Editar Estudiante</h1>
        <?php
        $id = $_GET['id'];
        $resultado = $conn->query("SELECT * FROM estudiantes WHERE id=$id");
        $fila = $resultado->fetch_assoc();
        ?>
        <form action="editar.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="nombre_completo">Nombre Completo</label>
                <input type="text" class="form-control" name="nombre_completo" value="<?php echo $fila['nombre_completo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $fila['fecha_nacimiento']; ?>" required>
            </div>
            <div class="form-group">
                <label for="genero">Género</label>
                <select class="form-control" name="genero" required>
                    <option value="Masculino" <?php if ($fila['genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                    <option value="Femenino" <?php if ($fila['genero'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera</label>
                <select class="form-control" name="carrera" required>
                    <option value="Ingeniería" <?php if ($fila['carrera'] == 'Ingeniería') echo 'selected'; ?>>Ingeniería</option>
                    <option value="Ciencias" <?php if ($fila['carrera'] == 'Ciencias') echo 'selected'; ?>>Ciencias</option>
                    <option value="Artes" <?php if ($fila['carrera'] == 'Artes') echo 'selected'; ?>>Artes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="materias_cursadas">Materias Cursadas</label>
                <input type="number" class="form-control" name="materias_cursadas" value="<?php echo $fila['materias_cursadas']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Número de Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?php echo $fila['telefono']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_completo = $_POST['nombre_completo'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $genero = $_POST['genero'];
            $carrera = $_POST['carrera'];
            $materias_cursadas = $_POST['materias_cursadas'];
            $telefono = $_POST['telefono'];

            $sql = "UPDATE estudiantes SET 
                    nombre_completo='$nombre_completo', 
                    fecha_nacimiento='$fecha_nacimiento', 
                    genero='$genero', 
                    carrera='$carrera', 
                    materias_cursadas='$materias_cursadas', 
                    telefono='$telefono' 
                    WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>Registro actualizado exitosamente</div>";
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger mt-3'>Error actualizando el registro: " . $conn->error . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
