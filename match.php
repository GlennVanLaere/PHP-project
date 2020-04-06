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
   $booksMatch = $person->findBooksMatch($info);
   $tvShowsMatch = $person->findTvShowsMatch($info);
   
   $person->setUserId();
   $userId = $person->getUserId();

   $messageRead = $person->messageRead($userId); 
  }else {
   header("Location: login.php");
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Match</title>
</head>
<body>
    <?php if ($messageRead): ?>
    <p>🔔 There are new messages</p>
    <?php endif; ?>
   
    <?php  echo '<h1> Hi, '.$info['firstName'].'  '. $info['lastName'].'!</h1>'; ?>
    <h2>Here You can find all your matches, based on various criteria.</h2>
    <h3>Perfect Match:</h3>
    <?php foreach ($perfectMatch as $pm): ?>
    <p><?php echo $pm['firstName'] . " " . $pm['lastName']; ?></p>
    <?php $person->setBuddyId($pm['id']); ?>
    <?php include("includes/buddyRequestButtons.inc.php") ?>
    <p>Also listens to: <?php echo $pm['music'] . " music" ; ?></p>
    <p>Also wachtes: <?php echo $pm['movies'] . " movies" ; ?></p>
    <p>Also plays: <?php echo $pm['games'] . " games" ; ?></p>
    <p>Also reads: <?php echo $pm['books'] . " books" ; ?></p>
    <p>Also watches: <?php echo $pm['tvShows'] . " tvShows" ; ?></p>
    <h4>Conclusion: 100% the perfect match!</h4>
    <?php endforeach; ?>
    <?php if($perfectMatch ===NULL){ echo '<p>No perfect matches found.</p>'; } ?>

<h3>Buddy Matches:</h3>
    <?php foreach ($buddyMatch as $bm): ?>
    <p><?php echo $bm['firstName'] . " " . $bm['lastName']; ?></p>
    <?php $person->setBuddyId($bm['id']); ?>
    <?php include("includes/buddyRequestButtons.inc.php") ?>
    <?php endforeach; ?>

<h3>Music Matches:</h3>
    <?php foreach ($musicMatch as $mum): ?>
    <p><?php echo $mum['firstName'] . " " . $mum['lastName']; ?></p>
    <?php $person->setBuddyId($mum['id']); ?>
    <?php include("includes/buddyRequestButtons.inc.php") ?>
    <?php endforeach; ?>
    <?php if($musicMatch ===NULL){ echo '<p>No perfect matches found based on music.</p>'; } ?>

<h3>Movies Matches:</h3>
    <?php foreach ($moviesMatch as $mom): ?>
    <p><?php echo $mom['firstName'] . " " . $mom['lastName']; ?></p>
    <?php $person->setBuddyId($mom['id']); ?>
    <?php include("includes/buddyRequestButtons.inc.php") ?>
    <?php endforeach; ?>
    <?php if($moviesMatch ===NULL){ echo '<p>No perfect matches found based on movies.</p>'; } ?>

<h3>Games Matches:</h3>
    <?php foreach ($gamesMatch as $gm): ?>
    <p><?php echo $gm['firstName'] . " " . $gm['lastName']; ?></p>
    <?php $person->setBuddyId($gm['id']); ?>
    <?php include("includes/buddyRequestButtons.inc.php") ?>
    <?php endforeach; ?>
    <?php if($gamesMatch ===NULL){ echo '<p>No perfect matches found based on games.</p>'; } ?>

<h3>Books Matches:</h3>
    <?php foreach ($booksMatch as $bm): ?>
    <p><?php echo $bm['firstName'] . " " . $bm['lastName']; ?></p>
    <?php $person->setBuddyId($bm['id']); ?>
    <?php include("includes/buddyRequestButtons.inc.php") ?>
    <?php endforeach; ?>
    <?php if($booksMatch ===NULL){ echo '<p> no perfect matches found based on books, search based on another tag </p>'; } ?>

<h3>TvShows Matches:</h3>
    <?php foreach ($tvShowsMatch as $tm): ?>
    <p><?php echo $tm['firstName'] . " " . $tm['lastName']; ?></p>
    <?php $person->setBuddyId($tm['id']); ?>
    <?php include("includes/buddyRequestButtons.inc.php") ?>
    <?php endforeach; ?>
    <?php if($tvShowsMatch ===NULL){ echo '<p> no perfect matches found based on tv-shows, search based on another tag </p>'; } ?>

    <a href="logout.php">logout</a>
</body>
</html>