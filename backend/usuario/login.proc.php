<?php

    $url ="api/USUARI.php";

    $data=array(
        'usu_nom' => $_REQUEST['usu_nom'],
        'usu_contra' => $_REQUEST['usu_contra']
    );

    $ch=curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response=curl_exec($ch);

    if(curl_errno($ch)){
        echo 'Error: '.curl_error($ch);
    } else{
        $json_response=json_decode($response, true);

        if(isset($json_response['token'])){
            session_start();
            $_SESSION['token']=$json_response['token'];
            header('Location: ../index.php');
        } else{
            header('Location: ../login.php?error=1');
        }
    }

?>