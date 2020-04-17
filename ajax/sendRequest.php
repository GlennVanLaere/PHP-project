<?php
    include_once(__DIR__ . "/../classes/User.php");
    session_start();
    use Postmark\PostmarkClient;
    if (!empty($_POST)) {
        $user = new User();
        $user->setUserId();
        $user->setBuddyId($_POST['receiver']);
        $receiver = $_POST['receiver'];

        if ($user->sendRequest()) {
            $user->sendRequestTrue();
        } else {
            $user->sendRequestFalse();
        }

        require_once('../vendor/autoload.php');
        $receiverEmail = $user->findReceiverEmail($receiver);
      
        $client = new PostmarkClient("6ba3c44e-a76f-4ca9-91e6-18ed5a57cd12");
    
        // Send an email:
        $sendResult = $client->sendEmail(
        "info@wakoodi.be",
        $receiverEmail,
        "Buddy Request",
        "Hi! you got a buddy request, go to your profile and check it out!"
        );

        $response = [
            'sender' => $user->getUserId(),
            'receiver' => $user->getBuddyId()
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>