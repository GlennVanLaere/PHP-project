<?php
    session_start();
    include_once(__DIR__ . "/classes/User.php");
    if(isset($_SESSION['user'])){
        $id = $_GET['id'];
        $discussion = new user;
        $question = $discussion->CurrentQuestion($id);
        if(!empty($_POST['comment'])){
            $place = $discussion->placeComment($_POST['comment'], $id);
        }
        $comment = $discussion->getComments($id);

    } else {
        header("Location: logout.php");
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion</title>
</head>
<body>
    <h2><?php echo htmlspecialchars($question['question']); ?></h2>
    <?php if(!empty($comment)): ?>
        <?php foreach($comment as $c): ?>
            <p><?php echo htmlspecialchars($c['comment']); ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <form action="" method="post">
            <input type="text" name="comment" placeholder="Write a comment">
            <input type="submit" name="placeComment" value="Place a comment">
    </form>
</body>
</html>