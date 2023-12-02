<?php
// Este script inicilizaría el chat siempre que se ejecutase
include 'conexion.php';

// Crear la tabla de mensajes si no existe.
// La base de datos debe estar creado y configurada en los datos de conexions
/**
* id: Identificador del mensaje.
* remitente: Remitente del mensaje.
* mensaje: Mensaje.
* created_at: Fecha y hora de creación del mensaje. 
**/
$sql = "CREATE TABLE IF NOT EXISTS mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    remitente VARCHAR(255) NOT NULL,
    mensaje TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );";
  $pdo->query($sql);
