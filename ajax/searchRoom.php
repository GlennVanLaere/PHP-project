<?php
include_once( __DIR__ . '/../classes/User.php' );
session_start();
$user = new User();
$user->setCampusLetter( strtoupper( $_POST['campus'] ) );

$user->searchCampus();

$response = [
    'campus' => $user->getCampus(),
    'letter' => $user->getCampusLetter()
];

header( 'Content-Type: application/json' );
echo json_encode( $response );