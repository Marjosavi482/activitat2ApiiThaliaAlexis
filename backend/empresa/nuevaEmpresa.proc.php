<?php
include_once '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['emp_id'];
    $nom = $data['emp_nom'];
    $ubicacio = $data['emp_ubicacio'];
    $sector = $data['emp_sector'];
    $descripcio = $data['emp_descripcio'];

    $result = mysqli_query($con, "INSERT INTO EMPRESA (emp_id, emp_nom, emp_ubicacio, emp_sector, emp_descripcio) VALUES ('$id', '$nom', '$ubicacio', '$sector', '$descripcio')");

    if ($result) {
        $response = array('status' => 1, 'status_message' => 'Empresa agregada correctamente');
    } else {
        $response = array('status' => 0, 'status_message' => 'Error al agregar la empresa');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>