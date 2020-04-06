<?php
include_once(__DIR__."/classes/User.php");
session_start();
if (isset($_SESSION['user'])) {
    $user = new User;
    $user->setUserId();
    $allMessages = User::getAllMessages($user->getUserId(), $_GET['messageid']);
    $user->userReadMessage();
    $email = $_SESSION['user'];

    $info = $user->findCurrentUser($email);
    $matchType = $user->matchType($info);
} else {
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
    <?php include("includes/nav.inc.php") ?>
    <p><?php if(isset($matchType)){echo $matchType;} ?></p>
    <div id="messages">
    <?php foreach($allMessages as $m): ?>
    <?php $user->setCurrentFirstName($m['sender']); ?>
    <div><?php echo $user->getCurrentFirstName()["firstName"] . ": " . $m['message']; ?></div>
    <?php endforeach; ?>
    </div>
    <input type="text" placeholder="type a message" id="inputMessage">
    <a href="#" id="btnSendMessage">Send</a>
<body>
    <script src="app.js"></script>
</body>
</html>