<?php

include_once(__DIR__."/classes/User.php");

 session_start();
 if( isset($_SESSION['user']) ) {
   $email = $_SESSION['user'];
   $person = new User;
   $info = $person->findCurrentUser($email);

   $perfectMatch = $person->findPerfectMatch($info);
   $buddyMatch = $person->findBuddyMatch($info);
   $musicMatch = $person->findMusicMatch($info);
   $moviesMatch = $person->findMoviesMatch($info);
   $gamesMatch = $person->findGamesMatch($info);

  }
 else {
   header("Location: login.php");
 }

 

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match</title>
</head>
<body>
    <p>current user:</p>
    <?php  echo $email ?>




    <p>Perfect Match:</p>
    <?php foreach ($perfectMatch as $pm): ?>
    <p><?php echo $pm['firstName'] . " " . $pm['lastName']; ?></p>
    <p>Also listens to: <?php echo $pm['music'] . " music" ; ?></p>
    <p>Also wachtes: <?php echo $pm['movies'] . " movies" ; ?></p>
    <p>Also plays: <?php echo $pm['games'] . " games" ; ?></p>
    <p>Also reads: <?php echo $pm['books'] . " books" ; ?></p>
    <p>Also watches: <?php echo $pm['tvShows'] . " tvShows" ; ?></p>
    <p>Conclusion: 100% the perfect match!</p>
    <p></p>
    <?php endforeach; ?>
    <?php if($perfectMatch ===NULL){ 
              echo '<p> no perfect matches found, search based on a tag </p>'; 
    } ?>

<p>Buddy Matches:</p>
    <?php foreach ($buddyMatch as $bm): ?>
    <p><?php echo $bm['firstName'] . " " . $bm['lastName']; ?></p>
    <?php endforeach; ?>

<p>Music Matches:</p>
    <?php foreach ($musicMatch as $mum): ?>
    <p><?php echo $mum['firstName'] . " " . $mum['lastName']; ?></p>
    <p></p>
    <?php endforeach; ?>
    <?php if($musicMatch ===NULL){ 
              echo '<p> no perfect matches found based on music, search based on another tag </p>'; 
    } ?>

<p>Movies Matches:</p>
    <?php foreach ($moviesMatch as $mom): ?>
    <p><?php echo $mom['firstName'] . " " . $mom['lastName']; ?></p>
    <p></p>
    <?php endforeach; ?>
    <?php if($moviesMatch ===NULL){ 
              echo '<p> no perfect matches found based on movies, search based on another tag </p>'; 
    } ?>

<p>Games Matches:</p>
    <?php foreach ($gamesMatch as $gm): ?>
    <p><?php echo $gm['firstName'] . " " . $gm['lastName']; ?></p>
    <p></p>
    <?php endforeach; ?>
    <?php if($gamesMatch ===NULL){ 
              echo '<p> no perfect matches found based on gamess, search based on another tag </p>'; 
    } ?>
</body>
</html>