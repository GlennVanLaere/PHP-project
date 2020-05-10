<?php

include_once( __DIR__ . '/../classes/User.php' );
use Postmark\PostmarkClient;

if ( !empty( $_POST ) ) {

    $user = new User;
    $email = $_POST['email'];
    $token = $user->getToken( $email );
    //$content = "<a href='http://localhost/PHP-project/confirm.php?email=$email&token=$token'></a>";

    require_once( '../vendor/autoload.php' );
    $receiverEmail = $email;

    $client = new PostmarkClient( '6ba3c44e-a76f-4ca9-91e6-18ed5a57cd12' );

    // Send an email:
    $sendResult = $client->sendEmail(
        'info@wakoodi.be',
        $receiverEmail,
        'verification',
        "'http://localhost/PHP-project/confirm.php?email=$email&token=$token";
    );

    $response = [
        'receiver' => '12'
    ];

    header( 'Content-Type: application/json' );
    echo json_encode( $response );
}