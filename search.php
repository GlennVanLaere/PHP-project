<?php
    session_start();
    include_once(__DIR__ . "/classes/Search.php");
if (isset($_SESSION['user'])) {
    if (!empty($_POST)) {
        $search = new Search;
        $search->setCurrentEmail($_SESSION['user']);
        $search->setCategory($_POST['category']);
        $search->setSearchTerm($_POST['searchTerm']);
        $result = $search->goSearch();
    }
} else {
    header("Location: logout.php");
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <title>Search</title>
</head>
<body>
    <?php include("includes/nav.inc.php") ?>
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
    <?php if (!empty($_POST)) { ?>
        <?php if (!empty($result)): ?>
        <?php foreach ($result as $r): ?>
            <div>
                <h2><?php echo htmlspecialchars($r['firstName'] . ' ' . $r['lastName']); ?></h2>
                <?php if($r['music'] != 'Make a choice'): ?>
                    <p>Also listens to: <?php echo htmlspecialchars($r['music']); ?></p>
                <?php endif; ?>
                <?php if($r['movies'] != 'Make a choice'): ?>
                    <p>Also wachtes: <?php echo htmlspecialchars($r['movies']); ?></p>
                <?php endif; ?>
                <?php if($r['games'] != 'Make a choice'): ?>
                    <p>Also plays: <?php echo htmlspecialchars($r['games']); ?></p>
                <?php endif; ?>
                <?php if($r['books'] != 'Make a choice'): ?>
                    <p>Also reads: <?php echo htmlspecialchars($r['books']); ?></p>
                <?php endif; ?>
                <?php if($r['tvShows'] != 'Make a choice'): ?>
                    <p>Also watches: <?php echo htmlspecialchars($r['tvShows']); ?></p>
                <?php endif; ?>
                <p><?php echo htmlspecialchars($r['buddy']); ?></p>
            </div>    
        <?php endforeach; ?>
        <?php else: ?>
            <?php echo "<h1 class='blue'>Niets gevonden :( </h1>" ?>
        <?php endif; ?>
    <?php }; ?>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/liveSearch.js"></script>
  </body>
</html>