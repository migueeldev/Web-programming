<?php
if (!isset($_GET["id"])) exit("No se proporcionó un ID válido.");
$id = $_GET["id"];
include_once "base_de_datos.php";

$sentencia = $base_de_datos->prepare("SELECT * FROM personas WHERE id = ?;");
$sentencia->execute([$id]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);

if ($persona === FALSE) {
    echo "No existe ninguna persona con ese ID.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h3>Editar Persona</h3>
            </div>
            <div class="card-body">
                <form method="post" action="guardarDatosEditados.php">
                    <!-- Campo oculto para el ID -->
                    <input type="hidden" name="id" value="<?php echo $persona->id; ?>">

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $persona->nombre; ?>" required>
                    </div>

                    <!-- Apellidos -->
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $persona->apellidos; ?>" required>
                    </div>

                    <!-- Género -->
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Género</label>
                        <select class="form-select" id="sexo" name="sexo" required>
                            <option value="">--Selecciona--</option>
                            <option value="M" <?php echo $persona->sexo === 'M' ? "selected" : ""; ?>>Masculino</option>
                            <option value="F" <?php echo $persona->sexo === 'F' ? "selected" : ""; ?>>Femenino</option>
                        </select>
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo_electronico" value="<?php echo $persona->correo_electronico; ?>" required>
                    </div>

                    <!-- Edad -->
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $persona->edad; ?>" required>
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $persona->fecha_nacimiento; ?>" required>
                    </div>

                    <!-- Botón para Guardar Cambios -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        <a href="consultarPersona.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
