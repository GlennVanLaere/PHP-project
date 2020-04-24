<?php
    include_once(__DIR__."/classes/User.php");
    session_start();
    if (isset($_SESSION['user'])) {
        # code...
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
    <title>Room</title>
</head>
<body>
    <?php include("includes/nav.inc.php") ?>
    <h1>Room location</h1>
    <input id="campus" class="room" type="text" maxlength="1" size="1" placeholder="Z">
    <input id="floor" class="room" type="number" min="0" max="9" placeholder="2">
    <p class="d-inline">.</p>
    <input id="room" class="room" type="number" min="0" max="9" placeholder="0">
    <input id="room" class="room" type="number" min="0" max="9" placeholder="4">
    <p id="result">Room Z2.04 is located on the 2nd floor in Campus De Vest</p>
    <a href="#">View on Google Maps</a>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/room.js"></script>
</body>
</html>