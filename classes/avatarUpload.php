<?php 


if(isset($_POST["submit"])){
    $file = $_FILES["avatar"];
    $fileName = $_FILES["avatar"]["name"];
    $fileError = $_FILES["avatar"]["error"];
    $fileType = $_FILES["avatar"]["error"];
    $fieSize = $_FILES["avatar"]["size"];

    $fileExt = explode(".", $fileName);
    $fileExtention = strtolower(end($fileExt));
    
    $allowedFiles = array('jpg', 'jpeg','png');

    if(in_array($fileExtention, $allowedFiles)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('', true).".".$fileExtention;
                $fileDestination = '/Users/glennvanlaere/Documents/GitHub/PHP-project/uploads/'.$fileNameNew;
                echo($fileTmpName);
                move_uploaded_file($fileTmpName, $fileDestination);

                header("Location: profile.php?succes");
                return $fileNameNew;
            }
            else{
                $error = "your filesize is to big";
            }
        }
        else{
            $error = "something went wrong";
        }
    }
    else{
        $error = "we do not support this image type. please 
        use jpg, jpeg or png";
    }
}