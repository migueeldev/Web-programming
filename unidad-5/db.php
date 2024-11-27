<?php
$host = 'localhost'; 
$dbname = 'u298556559_real_state';  
$user = 'u298556559_migueeldev';          
$password = 'Lmdev271';       

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
