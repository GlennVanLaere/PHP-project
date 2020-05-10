<?php

include_once( __DIR__ . '/classes/User.php' );
session_start();

if (isset($_SESSION['user'])) {
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

    $register = $person->getAll();
    $totalRegister = count($register);

    $numberAccept = $person->getNumberAccept();
    $totalAccept = count($numberAccept);
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <title>Match</title>
</head>

<body>
    <?php include("app/frontend/includes/navbar.php") ?>
    <div class="welcome">
        <?php  echo '<h1> Hi, '.$info['firstName'].'  '. $info['lastName'].'!</h1>'; ?>
        <h2>Here You can find all your matches, based on various criteria.</h2>
    </div>
    <div class="stats">
        <p><?php echo "There are a total of " . $totalRegister . " students registered to the website!!" ?></p>
        <p><?php echo "A total of " . $totalAccept . " students found their match!!" ?></p>
    </div>
    <div class="msg">
        <?php if ($messageRead): ?>
        <p>🔔 There are new messages</p>
        <?php endif; ?>
    </div>

    <div class="container text-center">
        <div class="row d-flex justify-content-center">
            <div class="col-md-auto">

                <h3>Perfect Match:</h3>
                <?php foreach ($perfectMatch as $pm): ?>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><a
                                href="public.php?id=<?php echo $pm['id']; ?>"><?php echo $pm['firstName'] . " " . $pm['lastName']; ?></a>
                        </h6>
                        <?php $person->setBuddyId($pm['id']); ?>
                        <?php include("includes/buddyRequestButtons.inc.php") ?>
                        <p>Also listens to: <?php echo $pm['music'] . " music" ; ?></p>
                        <p>Also wachtes: <?php echo $pm['movies'] . " movies" ; ?></p>
                        <p>Also plays: <?php echo $pm['games'] . " games" ; ?></p>
                        <p>Also reads: <?php echo $pm['books'] . " books" ; ?></p>
                        <p>Also watches: <?php echo $pm['tvShows'] . " tvShows" ; ?></p>
                        <h4>Conclusion: 100% the perfect match!</h4>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(!$perfectMatch){ echo '<p>No perfect matches found.</p>'; } ?>
            </div>

            <div class="col-md-auto">

                <h3>Buddy Matches:</h3>
                <?php foreach ($buddyMatch as $bm): ?>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><a
                                href="public.php?id=<?php echo $bm['id']; ?>"><?php echo $bm['firstName'] . " " . $bm['lastName']; ?></a>
                        </h6>
                        <?php $person->setBuddyId($bm['id']); ?>
                        <?php include("includes/buddyRequestButtons.inc.php") ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="col-md-auto">

                <h3>Music Matches:</h3>
                <?php foreach ($musicMatch as $mum): ?>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">
                            <p><?php echo $mum['firstName'] . " " . $mum['lastName']; ?></p>
                        </h6>
                        <?php $person->setBuddyId($mum['id']); ?>
                        <?php include("includes/buddyRequestButtons.inc.php") ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(!$musicMatch){ echo '<p>No perfect matches found based on music.</p>'; } ?>
            </div>
            <div class="col-md-auto">
                <h3>Movies Matches:</h3>
                <?php foreach ($moviesMatch as $mom): ?>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">
                            <p><?php echo $mom['firstName'] . " " . $mom['lastName']; ?></p>
                        </h6>
                        <?php $person->setBuddyId($mom['id']); ?>
                        <?php include("includes/buddyRequestButtons.inc.php") ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(!$moviesMatch){ echo '<p>No perfect matches found based on movies.</p>'; } ?>
            </div>

            <div class="col-md-auto">

                <h3>Games Matches:</h3>
                <?php foreach ($gamesMatch as $gm): ?>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">
                            <p><?php echo $gm['firstName'] . " " . $gm['lastName']; ?></p>
                        </h6>
                        <?php $person->setBuddyId($gm['id']); ?>
                        <?php include("includes/buddyRequestButtons.inc.php") ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(!$gamesMatch){ echo '<p>No perfect matches found based on games.</p>'; } ?>
            </div>
            <div class="col-md-auto">

                <h3>Books Matches:</h3>
                <?php foreach ($booksMatch as $bm): ?>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">
                            <p><?php echo $bm['firstName'] . " " . $bm['lastName']; ?></p>
                        </h6>
                        <?php $person->setBuddyId($bm['id']); ?>
                        <?php include("includes/buddyRequestButtons.inc.php") ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(!$booksMatch){ echo '<p>No perfect matches found based on books</p>'; } ?>
            </div>
            <div class="col-md-auto">

                <h3>TvShows Matches:</h3>
                <?php foreach ($tvShowsMatch as $tm): ?>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">
                            <p><?php echo $tm['firstName'] . " " . $tm['lastName']; ?></p>
                        </h6>
                        <?php $person->setBuddyId($tm['id']); ?>
                        <?php include("includes/buddyRequestButtons.inc.php") ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(!$tvShowsMatch){ echo '<p>No perfect matches found based on tv-shows</p>'; } ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/buddyRequest.js"></script>
</body>

</html>