<?php
include_once '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['emp_id'])) {
    $id = $_GET['emp_id'];
    $data = json_decode(file_get_contents('php://input'), true);
    $nom = $data['emp_nom'];
    $ubicacio = $data['emp_ubicacio'];
    $sector = $data['emp_sector'];
    $descripcio = $data['emp_descripcio'];

    $result = mysqli_query($con, "UPDATE EMPRESA SET emp_nom='$nom', emp_ubicacio='$ubicacio', emp_sector='$sector', emp_descripcio='$descripcio' WHERE emp_id='$id'");

    if ($result) {
        $response = array('status' => 1, 'status_message' => 'Empresa modificada correctamente');
    } else {
        $response = array('status' => 0, 'status_message' => 'Error al modificar la empresa');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
