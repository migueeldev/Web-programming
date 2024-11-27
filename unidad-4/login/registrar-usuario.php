<?php
include 'conexion.php';

// Activar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Recibir datos del formulario
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$form_pass = $_POST['password'] ?? '';

if (empty($username) || empty($email) || empty($form_pass)) {
    die("Error: Faltan datos en el formulario.");
}

// Conectar a la base de datos
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si el usuario ya existe
$stmt = $conexion->prepare("SELECT * FROM $tbl_name WHERE nombre_usuario = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

/* Funciona pero no se ve con buen estilo
if ($result->num_rows > 0) {
  // Mensaje cuando el usuario ya existe
  echo "<div class='container' style='margin-top: 50px;'>";
  echo "<div class='alert alert-danger text-center'>";
  echo "<h4><strong>Error:</strong> Nombre de Usuario ya asignado, ingresa otro.</h4>";
  echo "<a href='index.html' class='btn btn-danger'>Escoger otro Nombre</a>";
  echo "</div>";
  echo "</div>";
} else {
  // Insertar el nuevo usuario
  $stmt = $conexion->prepare("INSERT INTO usuarios (nombre_usuario, password, email) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $form_pass, $email);

  if ($stmt->execute()) {
      // Mensaje de éxito
      echo "<div class='container' style='margin-top: 50px;'>";
      echo "<div class='alert alert-success text-center'>";
      echo "<h1>¡Gracias por registrarte!</h1>";
      echo "<p>Bienvenido(a), <strong>" . htmlspecialchars($username) . "</strong>.</p>";
      echo "<p><a href='login.html' class='btn btn-success'>Iniciar Sesión</a></p>";
      echo "</div>";
      echo "</div>";
  } else {
      // Mensaje de error en la base de datos
      echo "<div class='container' style='margin-top: 50px;'>";
      echo "<div class='alert alert-danger text-center'>";
      echo "<h4><strong>Error:</strong> No se pudo crear el usuario.</h4>";
      echo "<p>" . htmlspecialchars($stmt->error) . "</p>";
      echo "</div>";
      echo "</div>";
  }
} */

if ($result->num_rows > 0) {
  // Mensaje cuando el usuario ya existe
  echo "
  <!DOCTYPE html>
  <html lang='en'>
  <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Error de Registro</title>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  </head>
  <body>
      <div class='container' style='margin-top: 50px;'>
          <div class='alert alert-danger text-center'>
              <h4><strong>Error:</strong> Nombre de Usuario ya asignado, ingresa otro.</h4>
              <a href='index.html' class='btn btn-danger'>Escoger otro Nombre</a>
          </div>
      </div>
  </body>
  </html>";
} else {
  // Insertar el nuevo usuario
  $stmt = $conexion->prepare("INSERT INTO usuarios (nombre_usuario, password, email) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $form_pass, $email);

  if ($stmt->execute()) {
      // Mensaje de éxito
      echo "
      <!DOCTYPE html>
      <html lang='en'>
      <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Registro Exitoso</title>
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
      </head>
      <body>
          <div class='container' style='margin-top: 50px;'>
              <div class='alert alert-success text-center'>
                  <h1>¡Gracias por registrarte!</h1>
                  <p>Bienvenido(a), <strong>" . htmlspecialchars($username) . "</strong>.</p>
                  <p><a href='login.html' class='btn btn-success'>Iniciar Sesión</a></p>
              </div>
          </div>
      </body>
      </html>";
  } else {
      // Mensaje de error en la base de datos
      echo "
      <!DOCTYPE html>
      <html lang='en'>
      <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Error de Registro</title>
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
      </head>
      <body>
          <div class='container' style='margin-top: 50px;'>
              <div class='alert alert-danger text-center'>
                  <h4><strong>Error:</strong> No se pudo crear el usuario.</h4>
                  <p>" . htmlspecialchars($stmt->error) . "</p>
              </div>
          </div>
      </body>
      </html>";
  }
}


// Cerrar conexión
$stmt->close();
$conexion->close();
?>
