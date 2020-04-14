<?php
    include_once(__DIR__ . "/../classes/User.php");
    session_start();
        $user = new User();
        $user->setUserId();

        $user->removeBuddy();

        $response = [
            'buddyId' => $user->getBuddyId()
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
?>