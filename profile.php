<?php
session_start();
include_once(__DIR__."/classes/User.php");

if(isset($_SESSION['user'])){
    $email = $_SESSION['user'];

    try {
        $user = new User;
        $showEmail = $user->viewEmail($email);
        $showDescription = $user->viewDescription($email);
        $viewAvatar = $user->showAvatar($email);
        
        
        if(!empty($_POST)){
            try {

                $file = $_FILES["avatar"];
                $fileName = $_FILES["avatar"]["name"];
                //$fileError = $_FILES["avatar"]["error"];
                $fileSize = $_FILES["avatar"]["size"];
                $fileTmpName = $_FILES["avatar"]["tmp_name"];
                
                $user->changeAvatar($email, $fileName, $fileSize, $fileTmpName,$file);
                

                // $user->setAvatarUpload($_POST["avatar"]);
                
                
            }
            catch (\Throwable $th) {
                $error = $th->getMessage();
            }
        }
        


    } catch (\Throwable $t) {
        $error = $t->getMessage();
    }
}
    









//pofiel aanpassen is mogelijk
//opladen van foto / avatar
//Beperk de bestandstypes en bestandsgrootte
//Geef gebruiksvriendelijke feedback als de update mislukt, maar ook als die lukt
//Beschrijving / korte profieltekst (emoji’s bewaren moet mogelijk zijn) //werkt op emoji na
//wachtwoord wijzigen lukt
//Wat is een veilige manier om dit te doen? Overleg met je team.
//email adres wijzigen
//Hoe kan je dit veilig toelaten? (wat als je even van je laptop weg bent en iemand je wachtwoord wijzigt?) Idem voor wachtwoord wijzigen.
//Zorg dat je hier aantoont dat je hebt nagedacht over een veilige procedure 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Profile</title>
</head>
<body>
    <div class="content">
        <div class="profilePicture">
        <h1>your profile</h1>
        <h2>profile picture</h2>
        <h2></h2>
        <img src="<?php echo $viewAvatar ?>" alt="#">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="avatar">
            <button type="submit" name="submitAvatar">Upload profile picture</button>
        </form>
        <h2>description</h2>
        <p> <?php echo $showDescription ?> </p>
        <a href="updateDescription.php"> change your description here</a>

        <h2>Email adress</h2>
        <p> <?php echo $showEmail ?> </p>
        <a href="updateEmail.php"> change your email adress here</a>

        <a href="updatePassword.php"> change your password here</a>
    
    </div>
    <title>Uw profiel</title>
</head>
<body>
    
</body>
</html>