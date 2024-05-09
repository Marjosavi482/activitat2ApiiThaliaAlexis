<?php

    $url ="/../../api/USUARI.php";

    $data = array(
        'usu_mail' => $_REQUEST['usu_mail'],
        'usu_contra' => $_REQUEST['usu_contra']
    );

    echo json_encode($data);

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // Cambiar a POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $json_response = json_decode($response, true);

        if (isset($json_response['token'])) {
            session_start();
            $_SESSION['token'] = $json_response['token'];
            header('Location: ../index.php');
        } else {
            header('Location: ../login.php?error=1');
        }
    }

?>