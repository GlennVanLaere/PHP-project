<?php

session_start();
include_once( __DIR__ . '/classes/User.php' );

if ( isset( $_SESSION['user'] ) ) {
    $email = $_SESSION['user'];

    $user = new User();
    $moderator = $user->moderator($email);
    $moderator = $moderator['moderator'];
    if (isset($_POST['undoModerator'])) {
        $user->undoModerator($email);
        header("Location: profile.php");
    }
    if (isset($_POST['makeModerator'])) {
        $user->makeModerator($email);
        header("Location: profile.php");
    }

    try {
        $showEmail = $user->viewEmail($email);
        $showDescription = $user->viewDescription($email);
        $viewAvatar = $user->showAvatar($email);
        $buddyId = $user->findBuddyId($email);
        $showBuddy = $user->showBuddy($buddyId);
        
        if (isset($_POST['submitAvatar'])) {
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
    
    try {
        if (isset($_POST['tags'])) {
            $user = new User;
            $user->setMusic($_POST['music']);
            $user->setMovies($_POST['movies']);
            $user->setGames($_POST['games']);
            $user->setBooks($_POST['books']);
            $user->setTvShows($_POST['tvShows']);
            $user->setBuddy($_POST['buddy']);
            $user->updateTags($email);
        }
    } catch (\Throwable $t) {
        $error = $t->getMessage();
    }
    $user->setTags($user, $email);
    $user = $user->getTags();
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
            <img src="<?php echo htmlspecialchars($viewAvatar) ?>" alt="#">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="avatar" class="btn">
                <button type="submit" name="submitAvatar" class="btn btn-primary">Upload profile picture</button>
            </form>
            <h2>Bio</h2>
            <p> <?php echo htmlspecialchars($showDescription) ?> </p>
            <a href="updateDescription.php">Change description</a>
            <h2>Email adress</h2>
            <p> <?php echo htmlspecialchars($showEmail) ?> </p>
            <a href="updateEmail.php">Change email</a>
            <a href="updatePassword.php">Change password</a>
        </div>
        <div class="buddy">
        <h2>Your buddy:</h2>
        <?php if($buddyId != false): ?>
                <img src="<?php echo htmlspecialchars($showBuddy['avatar']); ?>" alt="">
                <?php echo htmlspecialchars($showBuddy['firstName'])." ".htmlspecialchars($showBuddy['lastName']); ?>
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
        <div class="characteristics">
            <form action="" method="POST">
            <div class="dropdown">
            <label for="buddy">Buddy:</label></br>
                <select name="buddy" class="btn btn-info btnGroup dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <option><?php echo htmlspecialchars($user['buddy']); ?></option>
                    <option>I am searching a buddy</option>
                    <option>I want to be a buddy</option>>
                </select>
            </div>
            <div class="dropdown">
            <label for="music">Music:</label></br>
                <select name="music" class="btn btn-info btnGroup dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <option><?php echo htmlspecialchars($user['music']); ?></option>
                    <option>Electro</option>
                    <option>Hiphop</option>
                    <option>Jazz</option>
                    <option>Classic</option>
                    <option>K-pop</option>
                    <option>Popmusic</option>
                    <option>Rock</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="dropdown">
            <label for="movies">Movies:</label></br>
                <select name="movies" class="btn btn-info btnGroup dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <option><?php echo htmlspecialchars($user['movies']); ?></option>
                    <option>Action</option>
                    <option>Adventure</option>
                    <option>Animation</option>
                    <option>Comedy</option>
                    <option>Crime</option>
                    <option>Drama</option>
                    <option>Horror</option>
                    <option>Romantic</option>
                    <option>Superhero</option>
                    <option>Thriller</option>
                    <option>Western</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="dropdown">
            <label for="books">Books:</label></br>
                <select name="books" class="btn btn-info btnGroup dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <option><?php echo htmlspecialchars($user['books']); ?></option>
                    <option>Action</option>
                    <option>Comedy</option>
                    <option>Comics</option>
                    <option>Detective</option>
                    <option>Drama</option>
                    <option>Horror</option>
                    <option>Romantic</option>
                    <option>Thriller</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="dropdown">
            <label for="games">Games:</label></br>
                <select name="games" class="btn btn-info btnGroup dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <option><?php echo htmlspecialchars($user['games']); ?></option>
                    <option>Action</option>
                    <option>Adventure</option>
                    <option>Comedy</option>
                    <option>First-person</option>
                    <option>Horror</option>
                    <option>Party-games</option>
                    <option>Puzzle</option>
                    <option>Race</option>
                    <option>Sandbox</option>
                    <option>Sport</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="dropdown">
                <label for="tvShows">Tv-Shows:</label></br>
                    <select name="tvShows" class="btn btn-info btnGroup dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <option><?php echo htmlspecialchars($user['tvShows']); ?></option>
                        <option>American series</option>
                        <option>Dutch series</option>
                        <option>News</option>
                        <option>Quiz</option>
                        <option>Sport</option>
                        <option>Other</option>
                    </select>
            </div>
            <div>
                <input type="submit" value="Update characteristics" class="btn btnu btn-primary" name="tags">	
            </div>
            </form>
        </div>
    </div>
    <!-- end characteristics -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
