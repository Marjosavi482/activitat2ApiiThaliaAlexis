<?php
include_once '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['val_id'])) {
    $val_id = $_GET['val_id'];
    $result = mysqli_query($con, "DELETE FROM VALORACIO WHERE val_id='$val_id'");

    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'message' => 'Error al eliminar la valoración');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>