<?php
// Recibimos  la solicitud POST.
$data = json_decode(file_get_contents("php://input"));
// Obtener el  el remitente y  mensaje.
$remitente = $data->remitente;
$mensaje = $data->mensaje;

// Abrimos la conexion
include 'conexion.php';
// Guardar el mensaje en la base de datos.
$sql = "INSERT INTO mensajes (remitente, mensaje) VALUES (:remitente, :mensaje );";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":remitente", $remitente);
$stmt->bindParam(":mensaje", $mensaje);
$stmt->execute();


// Devolver una respuesta json.
$response = [
  "status" => "ok",
];
echo json_encode($response);

// Cerramos la conexión a la base de datos.
$pdo = null;

?>