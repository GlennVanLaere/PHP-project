<?php
include_once( __DIR__ . '/../classes/User.php' );
session_start();
if ( !empty( $_POST ) ) {
    $user = new User();
    $user->setUserId();
    $user->setReason( $_POST['text'] );
    $user->setBuddyId( $_POST['sender'] );

    $user->ignoreRequest();

    $response = [
        'sender' => $user->getBuddyId(),
        'reason' => $user->getReason()
    ];

    header( 'Content-Type: application/json' );
    echo json_encode( $response );
}