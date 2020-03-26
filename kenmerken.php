<?php
    session_start();
    //include_once(__DIR__ . "/classes/CurrentUser.php");
    include_once(__DIR__ . "/classes/Kenmerken.php");
    if(isset($_SESSION['user'])){

        $email = $_SESSION["user"];
        
        if(!empty($_POST)){
            $update = new currentKenmerken;
            $update->setMuziek($_POST['muziek']);
            $update->setFilms($_POST['films']);
            $update->setGames($_POST['games']);
            $update->setBoeken($_POST['boeken']);
            $update->setTvprogrammas($_POST['tvprogrammas']);
            $update->updateKenmerken($email);
        }
        
        $kenmerk = new currentKenmerken;
        $kenmerk->setKenmerk($kenmerk, $email);
        $kenmerk = $kenmerk->getKenmerk();
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
    <title>Profiel</title>
</head>
<body>
    <form action="" method="POST">
    <div class="form-group">
        <label for="muziek">Muziek</label>
        <select value="b" name="muziek">
            <option><?php echo $kenmerk['muziek'] ?></option>
            <option>Electronisch</option>
            <option>Hiphop</option>
            <option>Jazz</option>
            <option>Klassieke</option>
            <option>K-pop</option>
            <option>Popmuziek</option>
            <option>Rock</option>
        </select>
    </div>
    <div class="form-group">
        <label for="films">Films</label>
        <select name="films">
            <option><?php echo $kenmerk['films'] ?></option>
            <option>Actie</option>
            <option>Animatiefilm</option>
            <option>Avonturenfilm</option>
            <option>Drama</option>
            <option>horror</option>
            <option>Komedie</option>
            <option>Misdaadfilm</option>
            <option>Romantiek</option>
            <option>Superheldenfilm</option>
            <option>Thriller</option>
            <option>Western</option>
        </select>
    </div>
    <div class="form-group">
    <label for="boeken">Boeken</label>
        <select name="boeken">
            <option><?php echo $kenmerk['boeken'] ?></option>
            <option>Actie</option>
            <option>Detectieve</option>
            <option>Drama</option>
            <option>horror</option>
            <option>Komedie</option>
            <option>Romantiek</option>
            <option>Thriller</option>
        </select>
    </div>
    <div class="form-group">
    <label for="games">Games</label>
        <select name="games">
            <option><?php echo $kenmerk['games'] ?></option>
            <option>Actie</option>
            <option>Avonturen</option>
            <option>First-person</option>
            <option>horror</option>
            <option>Komedie</option>
            <option>Party-games</option>
            <option>Puzzle</option>
            <option>Race</option>
            <option>Sandbox</option>
            <option>Sport</option>
            <option>Superheldenfilm</option>
        </select>
    </div>
    <div class="form-group">
    <label for="tvprogrammas">Tv-programma's</label>
        <select name="tvprogrammas">
            <option><?php echo $kenmerk['tvprogrammas'] ?></option>
            <option>Amerikaanse series</option>
            <option>Nieuws</option>
            <option>Quiz</option>
            <option>Sport</option>
            <option>Vlaamse series</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Bevestigen" class="btn btn-primary">	
    </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>