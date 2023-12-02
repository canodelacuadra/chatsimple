<?php
include 'configuracion-db.php';
// Conectarse a la base de datos.
$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);