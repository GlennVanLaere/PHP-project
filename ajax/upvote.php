<?php
    include_once( __DIR__ . '/../classes/User.php' );
    session_start();

    if ( !empty($_POST) )
    {
        $user = new User();

        $response = [
            'status' => 'success'
        ];

        header( 'Content-Type: application/json' );
        echo json_encode( $response );
    }
?>