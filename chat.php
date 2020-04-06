<?php
include_once(__DIR__."/classes/User.php");
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
</head>
    <input type="text" placeholder="type a message" id="inputMessage">
    <a href="#" id="btnSendMessage">Send</a>
<body>
    <script src="app.js"></script>
</body>
</html>