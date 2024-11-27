<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit;
}

$now = time();
if ($now > $_SESSION['expire']) {
    session_destroy();
    header('Location: login.html?message=expired');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Perfil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    a:link { text-decoration: none; }
  </style>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Bienvenido <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></h1>
  <p>Mantén tu perfil actualizado</p> 
  <a href="logout.php">
    <button type="button" class="btn btn-success">Cerrar Sesión</button>
  </a>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <a href="#"><h3>Sobre Mí</h3></a>
      <p>Información sobre el usuario...</p>
    </div>
    <div class="col-sm-4">
      <a href="#"><h3>Ajustes</h3></a>
      <p>Configuraciones y preferencias de la cuenta...</p>
    </div>
    <div class="col-sm-4">
      <a href="#"><h3>Editar Perfil</h3></a>
      <p>Modifica tu información personal...</p>
    </div>
  </div>
</div>

</body>
</html>
