<?php
    
spl_autoload_register();
session_start();
    
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    if (!empty($_POST)) {
        $search = new classes\Search;
        $search->setCurrentEmail($_SESSION['user']);
        $search->setCategory($_POST['category']);
        $search->setSearchTerm($_POST['searchTerm']);
        $result = $search->goSearch();

        $person = new classes\User;
        $info = $person->findCurrentUser($email);
        $person->setUserId();
        $userId = $person->getUserId();
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
    <title>Search</title>
</head>
<body>
    <?php include("app/frontend/includes/navbar.php") ?>
    <form action="" method="post">
        <div class="dropdown" >
            <select name="category" id="category" required class="btn btnGroup dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <option value="">Choose a category</option>
                <option value="email">Email</option>
                <option value="firstName">Firstname</option>
                <option value="lastName">Lastname</option>
                <option value="music">Music</option>
                <option value="movies">Movies</option>
                <option value="games">Games</option>
                <option value="books">Books</option>
                <option value="tvShows">Tv shows</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="searchTerm" class="form-control" id="searchBox" placeholder="Search" autocomplete="off">
        </div>
        <div class="searchResults" id="searchResults"></div>
        <div class="form-group">
            <input type="submit" name="search" value="search" class="btn btnu btn-primary">
        </div>
    </form>
    <div class="list">
        <?php if ( !empty( $_POST ) ) { ?>
            <?php if ( !empty( $result ) ): ?>
            <?php foreach ( $result as $pm ): ?>
            <p ><?php echo "<a href='public.php?id=" . htmlspecialchars( $pm['id'] ) . "'>" . htmlspecialchars( $pm['firstName'] ) . " " . htmlspecialchars( $pm['lastName'] ) . "</a>" ; ?></p>
            <?php $person->setBuddyId( $pm['id'] ); ?>
            <?php include( "includes/buddyRequestButtons.inc.php" ) ?>
            <p>Listens to: <?php echo htmlspecialchars( $pm['music'] . " music" ); ?></p>
            <p>Wachtes: <?php echo htmlspecialchars( $pm['movies'] . " movies" ); ?></p>
            <p>Plays: <?php echo htmlspecialchars( $pm['games'] . " games" ); ?></p>
            <p>Reads: <?php echo htmlspecialchars( $pm['books'] . " books" ); ?></p>
            <p>Watches: <?php echo htmlspecialchars( $pm['tvShows'] . " tvShows" ); ?></p>
            <p><?php echo htmlspecialchars( $pm['buddy'] ); ?></p>
            <?php endforeach; ?>
            <?php else: ?>
                <?php echo "<h1 class='blue'>Niets gevonden :( </h1>" ?>
            <?php endif; ?>
        <?php }; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/liveSearch.js"></script>
  </body>
</html>