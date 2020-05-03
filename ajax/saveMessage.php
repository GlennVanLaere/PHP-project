<?php
include_once( __DIR__ . '/../classes/User.php' );
session_start();
if ( !empty( $_POST ) ) {
    $user = new User();
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