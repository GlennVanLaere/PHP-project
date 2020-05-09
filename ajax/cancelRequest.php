<?php

spl_autoload_register();
session_start();
$user = new classes\User();
$user->setUserId();

$user->cancelRequest();

$response = [
    'sender' => $user->getUserId()
];

header( 'Content-Type: application/json' );
echo json_encode( $response );