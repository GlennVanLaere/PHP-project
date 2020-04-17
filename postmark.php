<?php

// Import the Postmark Client Class:
require_once('./vendor/autoload.php');
use Postmark\PostmarkClient;

$client = new PostmarkClient("6ba3c44e-a76f-4ca9-91e6-18ed5a57cd12");

// Send an email:
$sendResult = $client->sendEmail(
  "info@wakoodi.be",
  "info@wakoodi.be",
  "Buddy Request",
  "Hi! you got a buddy request, go to your profile and check it out!"
);

?>