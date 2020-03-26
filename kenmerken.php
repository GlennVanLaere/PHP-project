<?php
    session_start();
    include_once(__DIR__ . "/classes/CurrentUser.php");
    
    
    if(!empty($_POST)){
        $muziek = $_POST['muziek'];
        $films = $_POST['films'];
        $games = $_POST['games'];
        $boeken = $_POST['boeken'];
        $tvprogrammas = $_POST['tvprogrammas'];

        $conn = Db::getConnection();
        $statement = $conn->prepare("UPDATE `users` SET `muziek`=:muziek,`films`=:films,`games`=:games,`boeken`=:boeken,`tvprogrammas`=:tvprogrammas WHERE id = 27");
        $statement->bindValue(':muziek', htmlspecialchars($muziek));
        $statement->bindValue(':films', htmlspecialchars($films));
        $statement->bindValue(':games', htmlspecialchars($games));
        $statement->bindValue(':boeken', htmlspecialchars($boeken));
        $statement->bindValue(':tvprogrammas', htmlspecialchars($tvprogrammas));
        $statement->execute();
        header("Location: index.php");
    }

        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM `users` WHERE `id` = 27");
        $statement->execute();
        $kenmerk = $statement->fetch(PDO::FETCH_ASSOC);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel</title>
</head>
<body>
    <form action="" method="POST">
    <div>
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
    <div>
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
    <div>
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
    <div>
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
    <div>
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
        <input type="submit" value="Bevestigen">	
    </div>
    </form>
    </body>
</html>