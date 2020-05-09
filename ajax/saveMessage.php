<?php

spl_autoload_register();
session_start();
if ( !empty( $_POST ) ) {
    $user = new classes\User();
    $user->setUserId();
    $user->setBuddyId( $_POST['receiver'] );
    $user->setMessageText( $_POST['message'] );

    $user->saveMessage();

    $response = [
        'sender' => $user->getUserId(),
        'receiver' => $user->getBuddyId(),
        'message' => $user->getMessageText()
    ];

    header( 'Content-Type: application/json' );
    echo json_encode( $response );
}