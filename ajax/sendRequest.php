<?php
    include_once(__DIR__ . "/../classes/User.php");
    session_start();
    if (!empty($_POST)) {
        $user = new User();
        $user->setUserId();
        $user->setBuddyId($_POST['receiver']);

        if ($user->sendRequest()) {
            $user->sendRequestTrue();
        } else {
            $user->sendRequestFalse();
        }

        $response = [
            'sender' => $user->getUserId(),
            'receiver' => $user->getBuddyId()
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>