<?php 

include_once( __DIR__ . '/classes/User.php' );
session_start();

if( isset($_SESSION['user']) ) {
    $user = New User;
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
    <h1><?php echo htmlspecialchars($profileData[0]["firstName"])." ". htmlspecialchars($profileData[0]["lastName"]) ?></h1>
    <img class="img-thumbnail" src=" <?php echo $profileData[0]["avatar"]?> " alt="profilePicture">
    <h2>About me</h2>
    <p> <?php echo htmlspecialchars($profileData[0]["description"] )?></p>
    <h2>My buddies</h2>
    <?php if(isset($buddyName[0]["id"])): ?>
    <a href="public.php?id=<?php echo htmlspecialchars($buddyName[0]["id"]) ?>" ><?php echo htmlspecialchars($buddyName[0]["firstName"]). " ". htmlspecialchars($buddyName[0]["lastName"]) ?></a>
    <?php else:?>
    <p>nobody yet</p>
    <?php endif;?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>