<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminacion</title>
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
        if (!isset($_GET["id"])) exit();
        $id = $_GET["id"];
        include_once "base_de_datos.php";
        $sentencia = $base_de_datos->prepare("DELETE FROM personas WHERE id = ?;");
        $resultado = $sentencia->execute([$id]);
        if($resultado === TRUE) echo "Eliminado correctamente";
        else echo "Algo salio mal";
        ?>
    <br> 
        <a href="formulario.html">Inicio</a>
        <a href="listarPersonas.php">Consultar Registros</a>
</div>   
</body>
</html>