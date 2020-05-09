<?php
   
   spl_autoload_register();
    session_start();
        $search = new classes\Search();
        $search->setCurrentEmail($_SESSION['user']);
        $search->setSearchTerm($_POST['searchTerm']);
        $search->setCategory($_POST['category']);

        $response = $search->goSearch();

        echo json_encode($response);
