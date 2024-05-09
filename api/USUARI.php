<?php

    include_once '../database/database.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $data=json_decode(file_get_contents('php://input'), true);
        $password = md5($data['usu_contra']);
        $q="SELECT * FROM USUARI WHERE usu_nom='".$data['usu_nom']."' AND usu_contra='".$password."'";        
        $result = mysqli_query($con, $q);

        $usuari=array();

        if(mysqli_num_rows($result) > 0){
            $usuari['token'] = base64_encode(random_bytes(32));
        }

        header('Content-type: application/json');
        echo json_encode($usuari);
    }
?>