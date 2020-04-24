<?php
    session_start();
    include_once(__DIR__ . "/classes/User.php");
    if(isset($_SESSION['user'])){
        
        $email = $_SESSION["user"];
        try{
            if(!empty($_POST)){
                $update = new User;
                $update->setMusic($_POST['music']);
                $update->setMovies($_POST['movies']);
                $update->setGames($_POST['games']);
                $update->setBooks($_POST['books']);
                $update->setTvShows($_POST['tvShows']);
                $update->setBuddy($_POST['buddy']);
                $update->updateTags($email);
            }
        } catch (\Throwable $t) {
            $error = $t->getMessage();
        }
        $tags = new User;
        $tags->setTags($tags, $email);
        $tags = $tags->getTags();
    } else {
        session_destroy();
        header("Location: login.php");
    }
        
        ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <title>Profile</title>
</head>
<body class="tag">
<?php include("includes/nav.inc.php") ?>
    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
    <div class="dropdown">
    <label for="buddy">Buddy:</label></br>
        <select name="buddy" class="btn btn-info btnGroup dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <option><?php echo $tags['buddy'] ?></option>
            <option>I am searching a buddy</option>
            <option>I want to be a buddy</option>>
        </select>
    </div>
    <div class="dropdown">
    <label for="music">Music:</label></br>
        <select name="music" class="btn btn-info btnGroup dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <option><?php echo $tags['music'] ?></option>
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
            <option><?php echo $tags['movies'] ?></option>
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
            <option><?php echo $tags['books'] ?></option>
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
            <option><?php echo $tags['games'] ?></option>
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
            <option><?php echo $tags['tvShows'] ?></option>
            <option>American series</option>
            <option>Dutch series</option>
            <option>News</option>
            <option>Quiz</option>
            <option>Sport</option>
            <option>Other</option>
        </select>
</div>
    <div>
        <input type="submit" value="Submit" class="btn btnu btn-primary">	
    </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>