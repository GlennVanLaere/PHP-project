<?php

spl_autoload_register();
session_start();
$user = new classes\User();
$user->setCampusLetter( strtoupper( $_POST['campus'] ) );

$user->searchCampus();

$response = [
    'campus' => $user->getCampus(),
    'letter' => $user->getCampusLetter()
];

header( 'Content-Type: application/json' );
echo json_encode( $response );