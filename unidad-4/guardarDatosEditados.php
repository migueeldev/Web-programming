<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Estilos generales */
        body, html {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: Arial, sans-serif;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        /* Result box */
        .result-box {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        /* Link inicio */
        .result-box a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #343a40;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .result-box a:hover {
            background-color: #495057;
        }
        /* texto resultado */
        .result-text {
            font-size: 1.2em;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="result-box">
        <?php

        // Comprobamos si los datos necesarios fueron enviados en el formulario
        if(
            !isset($_POST["nombre"]) ||
            !isset($_POST["apellidos"]) ||
            !isset($_POST["sexo"]) ||
            !isset($_POST["correo_electronico"]) ||
            !isset($_POST["edad"]) ||
            !isset($_POST["fecha_nacimiento"]) ||
            !isset($_POST["id"])
        ) {
            echo "<p class='result-text' style='color: red;'>Faltan datos. Por favor, complete todos los campos.</p>";
        } else {
            // Si todos los datos están presentes, procesamos la actualización
            include_once "base_de_datos.php";

            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $sexo = $_POST["sexo"];
            $correo_electronico = $_POST["correo_electronico"];
            $edad = $_POST["edad"];
            $fecha_nacimiento = $_POST["fecha_nacimiento"];

            // Preparamos la consulta SQL para actualizar los datos
            $sentencia = $base_de_datos->prepare("UPDATE personas SET nombre = ?, apellidos = ?, sexo = ?, correo_electronico = ?, edad = ?, fecha_nacimiento = ? WHERE id = ?;");
            $resultado = $sentencia->execute([$nombre, $apellidos, $sexo, $correo_electronico, $edad, $fecha_nacimiento, $id]);

            // Verificamos si la actualización fue exitosa
            if ($resultado === TRUE) {
                echo "<p class='result-text' style='color: green;'>Cambios guardados correctamente.</p>";
            } else {
                echo "<p class='result-text' style='color: red;'>Algo salió mal. Verifica que la tabla y el ID existan.</p>";
            }
        }
        ?>

        <br>
        <a href="formulario.html">Inicio</a>
        <a href="listarPersonas.php">Consultar Registros</a>
    </div>
</body>
</html>
