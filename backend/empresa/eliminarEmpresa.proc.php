<?php
include_once '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['emp_id'])) {
    $id = $_GET['emp_id'];
    $result = mysqli_query($con, "DELETE FROM EMPRESA WHERE emp_id='$id'");
    $result2 = mysqli_query($con, "DELETE FROM valoracio WHERE emp_id='$id'");

    if ($result && $result2) {
        $response = array('status' => 1, 'status_message' => 'Empresa eliminada correctamente');
    } else {
        $response = array('status' => 0, 'status_message' => 'Error al eliminar la empresa');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
