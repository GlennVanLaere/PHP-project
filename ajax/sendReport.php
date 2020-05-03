<?php
   include_once(__DIR__ . "/../classes/User.php");
   session_start();
   use Postmark\PostmarkClient;

   if (!empty($_POST)) {
       $user = new User;
       $user->setUserId();
       $reason = $_POST['reason'];
       $verbalAbuse = $_POST['verbalAbuse'];
       $hateSpeech = $_POST['hateSpeech'];
       $email = $user->getUserId();
       $buddy = $_SESSION['reportid'];

       require_once('../vendor/autoload.php');
      
        $client = new PostmarkClient("6ba3c44e-a76f-4ca9-91e6-18ed5a57cd12");
    
        // Send an email:
        $sendResult = $client->sendEmail(
        "info@wakoodi.be",
        "info@wakoodi.be",
        "Report",
        "From: $email <br> For: $buddy <br> Reason: $reason <br> Hate speech: $hateSpeech <br> Verbal abuse: $verbalAbuse"
        );

        $response = [
            'reason' => $reason,
            'verbalAbuse' => $verbalAbuse,
            'hateSpeech' => $hateSpeech
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
   }
?>