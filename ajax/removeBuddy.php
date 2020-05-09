<?php

spl_autoload_register();
session_start();
$user = new classes\User();
$user->setUserId();
$user->setBuddyId( $_POST['receiver'] );

$user->removeBuddy();

$response = [
    'id' => $user->getUserId(),
    'buddyId' => $user->getBuddyId()
];

header( 'Content-Type: application/json' );
echo json_encode( $response );