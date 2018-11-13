<?php
if(isset($_POST['submit'])){

        $fileName = $_FILES['img']['name'];
        $fileSize = $_FILES['img']['size'];
        $fileError = $_FILES['img']['error'];
        $fileTmp_name = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));


        $allowed = array('jpg','jpeg','png');

        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize<1000000){
                    $fileNewName = uniqid('',true).".".$fileActualExt;
                    $fileDestination = 'upload/'.$fileNewName;
                    move_uploaded_file($fileTmp_name,$fileDestination);
                    header("Location: upload.php?upload=success");
                    exit();
                }else{
                    echo 'too large file bitch!';}
            }else{
                echo 'error bitch!!';
            }
        }else{
            echo 'not my type bitch!!!';
        }

}