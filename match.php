<?php
 session_start();
 if( isset($_SESSION['user']) ) {
   $user = $_SESSION['user'];
   $currentUser = $user;
 }
 else {
   header("Location: login.php");
 }

 include_once(__DIR__."/classes/User.php");
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
    <?php  echo $currentUser ?>
</body>
</html>