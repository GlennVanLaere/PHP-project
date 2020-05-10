<?php

include_once( __DIR__ . '/../classes/User.php' );
session_start();

$user = new User();
$user->setUserId();

$user->cancelRequest();

$response = [
    'sender' => $user->getUserId()
];

header( 'Content-Type: application/json' );
echo json_encode( $response );