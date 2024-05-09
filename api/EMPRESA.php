<?php

include_once '../database/database.php';

    //GET: retornarà totes les empreses, endreçades alfabèticament pel nom.
    if($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['emp_id'])){
        $empresa=array();
        $result = mysqli_query($conn, "SELECT * FROM EMPRESA ORDER BY emp_nom ASC");
        while($row = mysqli_fetch_assoc($result)){
            $empresa[] = $row;
        }
        header ('Content-Type: application/json');
        echo json_encode($empresa);
    }

    //GET amb max=x: retornarà les x empreses amb la valoració mitja més alta.
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['max'])){
        $max=$_GET['max'];
        $empresa=array();
        $result = mysqli_query($conn, "SELECT * FROM EMPRESA ORDER BY emp_valoracio DESC LIMIT $max");
        while($row = mysqli_fetch_assoc($result)){
            $empresa[] = $row;
        }
        header ('Content-Type: application/json');
        echo json_encode($empresa);
    }



    //obtener empresas por emp_nom
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['emp_nom'])){
        $nom=$_GET['emp_nom'];
        $result = mysqli_query($con, "SELECT * FROM EMPRESA WHERE emp_nom LIKE '%".$nom."%'");
        $empresa = mysqli_fetch_assoc($result);~
        header ('Content-Type: application/json');
        echo json_encode($empresa);
    }

    //obtener empresas por emp_ubicacio
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['emp_ubicacio'])){
        $ubicacio=$_GET['emp_ubicacio'];
        $result = mysqli_query($con, "SELECT * FROM EMPRESA WHERE emp_ubicacio LIKE '%".$ubicacio."%'");
        $empresa = mysqli_fetch_assoc($result);
        header ('Content-Type: application/json');
        echo json_encode($empresa);
    }

    //obtener empresas por emp_sector
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['emp_sector'])){
        $sector=$_GET['emp_sector'];
        $result = mysqli_query($con, "SELECT * FROM EMPRESA WHERE emp_sector LIKE '%".$sector."%'");
        $empresa = mysqli_fetch_assoc($result);
        header ('Content-Type: application/json');
        echo json_encode($empresa);
    }

    //POST: permetrà donar d’alta una empresa nova.
    if($_SERVER['REQUEST_METHID'=='POST']){
        $data = json_decode(file_get_contents('php://input'), true);
        $id=$data['emp_id'];
        $nom = $data['emp_nom'];
        $ubicacio = $data['emp_ubicacio'];
        $sector = $data['emp_sector'];
        $descripcio= $data['emp_descripcio'];

        $result = mysqli_query($con, "INSERT INTO EMPRESA (emp_id, emp_nom, emp_ubicacio, emp_sector, emp_descripcio) VALUES ('$id', '$nom', '$ubicacio', '$sector', '$descripcio')");  

        if($result){
            $response =array('status' => 1, 'status_message' => 'Empresa agregada correctamente');
        }else{
            $response =array('status' => 0, 'status_message' => 'Error al agregar la empresa');
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    //PUT amb emp_id: permetrà modificar les dades de l’empresa amb el emp_id passat com a paràmetre.
    if($_SERVER[REQUEST_METHOD]=='PUT' && isset($_GET['emp_id'])){
        $id=$_GET['emp_id'];
        $data = json_decode(file_get_contents('php://input'), true);
        $nom = $data['emp_nom'];
        $ubicacio = $data['emp_ubicacio'];
        $sector = $data['emp_sector'];
        $descripcio= $data['emp_descripcio'];

        $result = mysqli_query($con, "UPDATE EMPRESA SET emp_nom='$nom', emp_ubicacio='$ubicacio', emp_sector='$sector', emp_descripcio='$descripcio' WHERE emp_id='$id'");

        if($result){
            $response =array('status' => 1, 'status_message' => 'Empresa modificada correctamente');
        }else{
            $response =array('status' => 0, 'status_message' => 'Error al modificar la empresa');
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    //DELETE amb emp_id: permetrà eliminar les dades de l’empresa amb l’emp_id passat com a paràmetre. També eliminarà les valoracions d’aquesta empresa.
    if($_SERVER['REQUEST_METHOD']=='DELETE' && isset($_GET['emp_id'])){
        $id=$_GET['emp_id'];
        $result = mysqli_query($con, "DELETE FROM EMPRESA WHERE emp_id='$id'");
        $result2 = mysqli_query($con, "DELETE FROM valoracio WHERE emp_id='$id'");

        if($result && $result2){
            $response =array('status' => 1, 'status_message' => 'Empresa eliminada correctamente');
        }else{
            $response =array('status' => 0, 'status_message' => 'Error al eliminar la empresa');
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    } 
?>