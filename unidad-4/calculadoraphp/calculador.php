<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <!-- Iconos-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
        if ($_REQUEST['radio1'] == "suma") {
            $suma = $_REQUEST['valor1'] + $_REQUEST['valor2'];
            echo "<p class='result-text'>La suma es: " . $suma . "</p>";
        } elseif ($_REQUEST['radio1'] == "resta") {
            $resta = $_REQUEST['valor1'] - $_REQUEST['valor2'];
            echo "<p class='result-text'>La resta es: " . $resta . "</p>";
        } elseif ($_REQUEST['radio1'] == "multiplicacion") {
            $multiplicacion = $_REQUEST['valor1'] * $_REQUEST['valor2'];
            echo "<p class='result-text'>La multiplicación es: " . $multiplicacion . "</p>";
        } elseif ($_REQUEST['radio1'] == "division") {
            if ($_REQUEST['valor2'] != 0) {
                $division = $_REQUEST['valor1'] / $_REQUEST['valor2'];
                echo "<p class='result-text'>La división es: " . $division . "</p>";
            } else {
                echo "<p class='result-text'>Error: No se puede dividir por cero.</p>";
            }
        } else {
            echo "<p class='result-text'>Operación no válida.</p>";
        }
        ?>
        <br> 
        <a href="index.html">Inicio</a>
    </div>
    
</body>
</html>
