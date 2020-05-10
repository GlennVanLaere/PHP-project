<?php

session_start();
include_once( __DIR__ . '/../classes/Search.php' );

$search = new Search();
$search->setCurrentEmail( $_SESSION['user'] );
$search->setSearchTerm( $_POST['searchTerm'] );
$search->setCategory( $_POST['category'] );

$response = $search->goSearch();

echo json_encode( $response );
