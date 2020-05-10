<?php

include_once( __DIR__ . '/../classes/Room.php' );
session_start();

$room = new Room();
$room->setCampusLetter( strtoupper( $_POST['campus'] ) );

$room->searchCampus();

$response = [
    'campus' => $room->getCampus(),
    'letter' => $room->getCampusLetter()
];

header( 'Content-Type: application/json' );
echo json_encode( $response );