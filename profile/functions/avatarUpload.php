<?php 
if(isset($_POST["submit"])){
    $file = $_FILES["avatar"];
    $fileName = $_FILES["avatar"]["name"];
    $fileError = $_FILES["avatar"]["error"];
    $fileType = $_FILES["avatar"]["error"];
    $fileTmpName = $_FILES["avatar"]["tmp_name"];
    $fileSize = $_FILES["avatar"]["size"];

    $fileExt = explode(".", $fileName);
    $fileExtention = strtolower(end($fileExt));
    
    $allowedFiles = array('jpg', 'jpeg','png');

    if(in_array($fileExtention, $allowedFiles)){
        if($fileError === 0){
            if(filesize < 1000000){
                $fileNameStorage = uniqid('', true).".".$fileExtention;
                $fileDestination = 'documents/github/phpproject/uploads/'.$fileNameStorage;

                move_uploaded_file($fileTmpName, $fileDestination);
                $succes = "You have succesfully uploaded your picture";
            }
            else{
                $error = "your filesize exceeds the limit";
            }
        }
        else{
            $error = "something went wrong please try again";
        }
    }
    else{
        $error = "we do not support this image type. please 
        use jpg, jpeg or png";
    }
    
    

}
