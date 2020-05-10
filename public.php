<?php 

spl_autoload_register();
session_start();

if( isset($_SESSION['user']) ) {
    $user = New classes\User;
    $id = $_GET["id"];
    $profileData = $user->publicInfo($id);
    $buddyId = $profileData[0]["buddyId"];
    $buddyName =$user->getBuddyName($buddyId);
} else {
    header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <title>Profile user</title>
</head>
<body class="public">
<?php include("app/frontend/includes/navbar.php") ?>
    <h1><?php echo $profileData[0]["firstName"]." ". $profileData[0]["lastName"] ?></h1>
    <img class="img-thumbnail" src=" <?php echo $profileData[0]["avatar"]?> " alt="profilePicture">
    <h2>About me</h2>
    <p> <?php echo $profileData[0]["description"] ?></p>
    <h2>My buddies</h2>
    <?php if(isset($buddyName[0]["id"])): ?>
    <a href="public.php?id=<?php echo $buddyName[0]["id"] ?>" ><?php echo $buddyName[0]["firstName"]. " ". $buddyName[0]["lastName"] ?></a>
    <?php else:?>
    <p>nobody yet</p>
    <?php endif;?>  
</body>
</html>