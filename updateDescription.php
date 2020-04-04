<?php 
include_once(__DIR__."/classes/User.php");

$description = new User;
if(!empty($_POST)){
    try {
        $description->setDescription($_POST["description"]);

        $description->editDescription();
    
    } 
    catch (\Throwable $th) {
        $error = $th->getMessage();
    }

}

$placeholderDes = $description->viewDescription();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change your description</title>
</head>
<body>
    <form action="" method="post">
        <label for="dscrptn" style="display:block"> your description</label>
        <textarea name="description" id="description" cols="30" rows="10" style="display:block"> <?php echo $placeholderDes ?> </textarea>
        <button type="submit" name="updateDes" style="">Update</button>
    </form>
</body>
</html>