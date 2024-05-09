<?php

    include_once '../database/database.php';

    //GET: retornarà totes les valoracions, endreçades per la data, de més recent a més antiga.GET: retornarà totes les valoracions, endreçades per la data, de més recent a més antiga.
    if($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['emp_id']) && !isset($_GET['option'])){
        $valoraciones=array();
        $result = mysqli_query($conn, "SELECT * FROM VALORACIO ORDER BY val_data DESC");
        while($row = mysqli_fetch_assoc($result)){
            $valoraciones[] = $row;
        }
        header ('Content-Type: application/json');
        echo json_encode($valoraciones);
    }

    //GET amb emp_id: retornarà totes les valoracions de l’empresa amb l’emp_id passat com a paràmetre, endreçades per la data, de més recent a més antiga.
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['emp_id']) && !isset($_GET['option'])){
        $emp_id=$_GET['emp_id'];
        $valoraciones=array();
        $result = mysqli_query($con, "SELECT * FROM VALORACIO WHERE emp_id='$emp_id' ORDER BY val_data DESC");
        while($row = mysqli_fetch_assoc($result)){
            $valoraciones[] = $row;
        }
        header ('Content-Type: application/json');
        echo json_encode($valoraciones);
    }

    //GET amb emp_id i option=average: retornarà la puntuació mitja de totes les valoracions de l’empresa amb l’emp_id passat com a paràmetre.
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['emp_id']) && isset($_GET['option']) && $_GET['option'] == 'average'){
        $emp_id=$_GET['emp_id'];
        $result = mysqli_query($con, "SELECT AVG(val_puntuacio) AS average_rating FROM VALORACIO WHERE emp_id='$emp_id'");
        $row = mysqli_fetch_assoc($result);
        $average_rating = $row['average_rating'];
        $response = array('average_rating' => $average_rating);
        header ('Content-Type: application/json');
        echo json_encode($response);
    }

    //POST amb emp_id: permetrà donar d’alta una nova valoració sobre l’empresa amb l’emp_id passat com a paràmetre.
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['emp_id'])){
        $data = json_decode(file_get_contents('php://input'), true);
        $emp_id=$_GET['emp_id'];
        $val_puntuacio=$data['val_puntuacio'];
        $val_comentari=$data['val_comentari'];
        $val_data=date('Y-m-d H:i:s');
        $result = mysqli_query($con, "INSERT INTO VALORACIO (emp_id, val_puntuacio, val_comentari, val_data) VALUES ('$emp_id', '$val_puntuacio', '$val_comentari', '$val_data')");
        if($result){
            $response = array('status' => 1, 'status_message' => 'Valoración creada correctamente');
        }else{
            $response = array('status' => 0, 'status_message' => 'Error al crear la valoración');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    //DELETE amb val_id: permetrà eliminar la valoració amb el val_id passat com a paràmetre.
    if($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['val_id'])){
        $val_id=$_GET['val_id'];
        $result = mysqli_query($con, "DELETE FROM VALORACIO WHERE val_id='$val_id'");
        if($result){
            $response = array('status' => 1, 'status_message' => 'Valoración eliminada correctamente');
        }else{
            $response = array('status' => 0, 'status_message' => 'Error al eliminar la valoración');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
   

?>