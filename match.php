<?php

include_once(__DIR__."/classes/User.php");

 session_start();
 if( isset($_SESSION['user']) ) {
   $email = $_SESSION['user'];
   $person = new User;
   $info = $person->findCurrentUser($email);
  }
 else {
   header("Location: login.php");
 }

 

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match</title>
</head>
<body>
    <p>current user:</p>
    <?php  echo $email ?>




    <p>other users:</p>
    <?php foreach ($otherInfo as $other): ?>
    <p>Email: <?php echo $other['email']; ?> Name: <?php echo $other['firstName'] . " " . $other['lastName']; ?></p>
    <p></p>
    <?php endforeach; ?>

</body>
</html>