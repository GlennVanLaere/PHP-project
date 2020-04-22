<?php
    include_once(__DIR__ . "/../classes/User.php");
       
    session_start();
    $user = new User();
    $user->setEmail($_POST['email']);
    
    $user->checkEmail($email);
    if($res){
        $response = [
            "available" => "Email is not available"
        ];
    }else{
        $response = [
            "available" => "Email is available"
        ];
    }

        header('Content-Type: application/json');
        echo json_encode($response);
?>