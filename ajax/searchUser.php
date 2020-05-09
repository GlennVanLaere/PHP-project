<?php
   
   include_once( __DIR__ . '/../classes/User.php' );
    session_start();
        $search = new Search();
        $search->setCurrentEmail($_SESSION['user']);
        $search->setSearchTerm($_POST['searchTerm']);
        $search->setCategory($_POST['category']);

        $response = $search->goSearch();

        echo json_encode($response);
