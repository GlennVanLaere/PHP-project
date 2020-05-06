<?php
include_once( __DIR__ . '/../classes/User.php' );
session_start();
use Postmark\PostmarkClient;
if ( !empty( $_POST ) ) {
    $user = new User();
    $user->setUserId();
    $user->setBuddyId( $_POST['receiver'] );
    $receiver = $_POST['receiver'];

    if ( $user->sendRequest() ) {
        $user->sendRequestTrue();
    } else {
        $user->sendRequestFalse();
    }

    require_once( '../vendor/autoload.php' );
    $receiverEmail = $user->findReceiverEmail( $receiver );
    $senderId = $user->getUserId();
    $sender = $user->getCurrentFirstName();


    $client = new PostmarkClient( '6ba3c44e-a76f-4ca9-91e6-18ed5a57cd12' );

    // Send an email:
    $sendResult = $client->sendEmail(
        'info@wakoodi.be',
        $receiverEmail,
        'Buddy Request',
        'Hi! </br> You got a buddy request. </br> Go to <a href="http://buddy.merakea.be/">your profile</a> to find out who it is. </br> Greetings the Buddy-team.'
    );

    $response = [
        'sender' => $user->getUserId(),
        'receiver' => $user->getBuddyId()
    ];

    header( 'Content-Type: application/json' );
    echo json_encode( $response );
}
