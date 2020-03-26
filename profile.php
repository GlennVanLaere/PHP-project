<?php
include_once(__DIR__."/classes/User.php");
include_once(__DIR__."/classes/UploadFile.php");

$userID = 12;

if(isset($_POST["submit"])) {
    $user = User::findUser($userId);

    // Email aanpassen
    if(isset($_POST["email"])) {
        $user->setEmail($_POST["email"]);
    }

    // Description aanpassen
    if(isset($_POST["description"])) {
        $user->setDescription($_POST["description"]);
    }

    // File upload
    if(isset($_FILES["avatar"])) {
        $uploadFile = new UploadFile($_FILES['avatar']);
        $uploadFileUrl = $uploadFile->upload();

        $user->setProfilePicture($uploadFileUrl);
    }

    $user->save();
}


// $uploadChecks = new UploadChecks();
// if(isset($_POST["submit"])){
//     $uploadfile = new UploadFile($_FILES["avatar"]);

//     $uploadChecks.addFile($uploadFile);
// 	try {
// 		$uploadChecks.upload();
// 	} catch(\throwable $th) {
// 		$error = $th->getMessage();
// 	}
// }

//pofiel aanpassen is mogelijk
//opladen van foto / avatar
//Beperk de bestandstypes en bestandsgrootte
//Geef gebruiksvriendelijke feedback als de update mislukt, maar ook als die lukt
//Beschrijving / korte profieltekst (emoji’s bewaren moet mogelijk zijn)
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
</div>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="avatar">
            <button type="submit" name="submit">Upload profile picture</button>

            <input type="text" name="emailAdress">
        </form>
    
        <h1> <?php echo $error ?> </h1>
    
    </div>
    <title>Uw profiel</title>
</head>
<body>
    
</body>
</html>
