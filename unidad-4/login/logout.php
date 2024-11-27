<?php
session_start();

// Elimina todas las variables de sesión
$_SESSION = array();

// Destruye la sesión
session_destroy();

// Redirige al usuario al login
header('Location: login.html');
exit;
?>
