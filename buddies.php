<?php

include_once( __DIR__ . '/classes/User.php' );

$user = new User;
// $viewNames = $user->viewBuddies();
// $var = [$viewNames[0][0]["firstName"]];
// var_dump($viewNames);
// foreach ($var as $key){
//     echo $key;
//     echo $viewNames[1];
// }
$test = $user->output();
echo $test;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buddy list</title>
</head>
<body>
    <ul>
    <?php // foreach ($viewNames as $value):?>
    <li>
        <?php 
            //echo $value["firstName"] . $value["lastName"];
            //echo $value["buddyId"];
        ?>
    </li>
    <?php// endforeach;?>
    </ul>
</body>
</html>