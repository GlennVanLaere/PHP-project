<?php
    include_once(__DIR__ . "/../classes/User.php");
    session_start();
        $user = new User();

        $response = [
            'campus' => "Z",
            'floor' => 2
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
?>