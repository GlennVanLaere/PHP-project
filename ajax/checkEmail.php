<?php
    include_once( __DIR__ . '/../classes/User.php' );

    if ( isset( $_POST['email'] ) )
    {

        $email = $_POST['email'];
        $user = new User();
        $res = $user->checkEmail( $email );
        $user->setEmail($email);

        if ( $res ) {
            $response = [
                'available' => 'Email is not available'
            ];
        } else {
            $response = [
                'available' => 'Email is available'
            ];
        }

        header( 'Content-Type: application/json' );
        echo json_encode( $response );
    }
?>