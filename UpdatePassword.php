<?php 
session_start();
include_once(__DIR__."/classes/User.php");

if(isset ($_SESSION["user"])){
    $email = $_SESSION["user"];

    if(!empty($_POST)){
        try {
            $changePassword = new User;
            $changePassword->setNewPassword($_POST["newp1"]);
            $changePassword->setPasswordCheck($_POST["newp2"]);
            $changePassword->setOldPassword($_POST["oldpas"]);
            $changePassword->changePassword($email);


            header("Location: profile.php");
            





        } catch (\Throwable $th) {
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
    <title>Change your password</title>
</head>
<body>
<?php include("includes/nav.inc.php") ?>
<h1>Change your password here</h1>
    <form action="" method="post">
    
    <label for="pas1" style="display:block">Enter your new password</label>
    <input type="password" name="newp1" placeholder="" style="display:block">

    <label for="pas2" style="display:block"> Repeat your new password please</label>
    <input type="password" name="newp2" placeholder="" style="display:block">

    <label for="oldp" style="display:block">fill in your old password here and press change</label>
    <input type="password" name="oldpas" placeholder="" style="display:block">

    <button type="submit" name="changeE"> Change </button>
</body>
</html>