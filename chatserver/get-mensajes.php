<?php
include 'conexion.php';

// Obtener los datos de la base de datos.
$sql = "SELECT * FROM mensajes ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Procesar los datos.
$mensajes= $stmt->fetchAll();

// Convertir los datos a JSON.
$json = json_encode($mensajes);

// Establecer el tipo de contenido de la respuesta.
header("Content-Type: application/json");

// Devolver la respuesta.
echo $json;


// Cerrar la conexión a la base de datos.
$pdo = null;

?>