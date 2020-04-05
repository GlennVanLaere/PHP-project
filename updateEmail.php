<?php 
session_start();
include_once(__DIR__."/classes/User.php");

if(isset($_SESSION["user"])){
    $email = $_SESSION["user"];

    if(!empty($_POST)){
        try {
            $newEmail = new User;
            $newEmail-> setOldEmail($_POST["oldE"]);
            $newEmail-> setNewEmail($_POST["newE1"]);
            $newEmail-> setNewEmailCheck($_POST["newE2"]);
            $newEmail->editEmail($email);
            $succes = "email changed";

        }
        
        
        
        catch (\Throwable $th) {
            $error = $th->getMessage();
        }


    }



}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change your email here</title>
</head>
<body>
<h1><?php ?></h1>
    <h1>Change your email here</h1>
    <form action="" method="post">
    
    <label for="old-email" style="display:block">Enter your old email</label>
    <input type="email" name="oldE" placeholder="enter old email here" style="display:block">
    <label for="new-email1" style="display:block"> enter your new email here</label>
    <input type="email" name="newE1" placeholder="enter your new email adress here" style="display:block">
    <label for="new-email2" style="display:block">repeat your new email</label>
    <input type="email" name="newE2" placeholder="repeat here" style="display:block">
    <button type="submit" name="changeE"> Change email now </button>

    
    
    
    </form>
</body>
</html>