<?php
    session_start();
    include_once(__DIR__ . "/classes/Faq.php");
    if (isset($_SESSION['user'])) {
        $id = $_GET['id'];
        $discussion = new Faq;
        $question = $discussion->CurrentQuestion($id);
        if (!empty($_POST['comment'])) {
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./../../css/style.css" />
</head>
<body>
<?php include_once('includes/nav.inc.php'); ?>
    <h2><?php echo htmlspecialchars($question['question']); ?></h2>
    <?php if (!empty($comment)): ?>
        <?php foreach ($comment as $c): ?>
            <p><?php echo htmlspecialchars($c['comment']); ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <form action="" method="post">
        <div class="form-group">
                <input type="text" name="comment" placeholder="Write a comment">
                <input type="submit" name="placeComment" value="Place a comment" class="btn btn-info">
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>