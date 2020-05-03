<?php
session_start();
include_once(__DIR__."/classes/User.php");

if( isset( $_SESSION['user'] ) ) {
    $email = $_SESSION['user'];

    $user = new User();
    $moderator = $user->moderator($email);
    $moderator = $moderator['moderator'];
    if(isset($_POST['undoModerator'])){
        $user->undoModerator($email);
        header("Location: profile.php");
    }
    if(isset($_POST['makeModerator'])){
        $user->makeModerator($email);
        header("Location: profile.php");
    }

    try {
        //$user = new User();
        $showEmail = $user->viewEmail($email);
        $showDescription = $user->viewDescription($email);
        $viewAvatar = $user->showAvatar($email);
        $buddyId = $user->findBuddyId($email);
        $showBuddy = $user->showBuddy($buddyId);
        
        if(!empty($_POST)){
            try {
                $file = $_FILES["avatar"];
                $fileName = $_FILES["avatar"]["name"];
                //$fileError = $_FILES["avatar"]["error"];
                $fileSize = $_FILES["avatar"]["size"];
                $fileTmpName = $_FILES["avatar"]["tmp_name"];
                
                $user->changeAvatar($email, $fileName, $fileSize, $fileTmpName,$file);  
            }
            catch (\Throwable $th) {
                $error = $th->getMessage();
            }
        }
    } catch (\Throwable $t) {
        $error = $t->getMessage();
    }
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
    <title>Profile</title>
</head>
<body class="profile">
<?php include("app/frontend/includes/navbar.php") ?>
    <div class="content">
        <div class="profilePicture">
        <h1>Your profile</h1>
        <h2>Profile picture</h2>
        <h2></h2>
        <img src="<?php echo $viewAvatar ?>" alt="#">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="avatar" class="btn">
            <button type="submit" name="submitAvatar" class="btn btn-primary">Upload profile picture</button>
        </form>
        <h2>Bio</h2>
        <p> <?php echo $showDescription ?> </p>
        <a href="updateDescription.php">Change description</a>

        <h2>Email adress</h2>
        <p> <?php echo $showEmail ?> </p>
        <a href="updateEmail.php">Change email</a>

        <a href="updatePassword.php">Change password</a>
    
    </div>
    <div class="buddy">
    <h2>Your buddy:</h2>
    <?php if($buddyId != false): ?>
            <img src="<?php echo $showBuddy['avatar']; ?>" alt="">
            <?php echo $showBuddy['firstName']." ".$showBuddy['lastName']; ?>
    <?php else: ?>
        <p>You don't have a buddy yet</p>
    <a href="match.php" class="btn btn-primary">Go find one</a>
    <?php endif; ?>
    </div>
    <div class="moderator">
        <h2>Moderator</h2>
        <p>Easy to test pin questions feature</p>
        <form action="" method="post">
        <?php if($moderator == 1): ?>
            <input type="submit" class="btn btn-success" value="Undo moderator" name="undoModerator">
        <?php else: ?>
            <input type="submit" class="btn btn-success" value="Become a moderator" name="makeModerator">
        <?php endif; ?>
        </form>
    </div>    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
