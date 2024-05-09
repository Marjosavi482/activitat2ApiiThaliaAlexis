<?php
include_once '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['val_id'])) {
    $val_id = $_GET['val_id'];
    $data = json_decode(file_get_contents('php://input'), true);
    $val_puntuacion = $data['val_puntuaci'];
    $val_comentario = $data['val_comentari'];

    $result = mysqli_query($con, "UPDATE VALORACIO SET val_puntuacion='$val_puntuacion', val_comentario='$val_comentario' WHERE val_id='$val_id'");

    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'message' => 'Error al modificar la valoración');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
