<?php
    session_start();
    include_once(__DIR__ . "/classes/Lists.php");
if(isset($_SESSION['user'])){

    if(!empty($_POST)){

        $search = new User;
        $search->setCurrentEmail($_SESSION['user']);
        $search->setCategory($_POST['category']);
        $search->setSearchTerm($_POST['searchTerm']);
        $result = $search->search();
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
    <title>Search</title>
</head>
<body>
    <form action="" method="post">
        <div class="form-group">
            <select name="category" required>
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

            <input type="text" name="searchTerm" class="form-control" placeholder="Search">
            
            <input type="submit" name="search" value="search">
        </div>
    </form>
    <?php if(!empty($_POST)){ ?>
        <?php foreach($result as $r): ?>
            <div>
                <img alt="<?php echo $r['profileImage']; ?>">
                <h2><?php echo $r['firstName'] . ' ' . $r['lastName']; ?></h2>
            </div>    
        <?php endforeach; ?>
    <?php }; ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>