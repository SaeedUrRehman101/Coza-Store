<?php
include('connection.php');

$error_msg='';

if(isset($_POST['addCategory'])){
    $categoryName = $_POST['cateName'];
    $categoryImageName = $_FILES['cateImage']['name'];
    $categoryTemImage = $_FILES['cateImage']['tmp_name'];
    $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION); // path_extension => show extension of the files like it's jpg,jpeg,webp,and so on.
    $filePath = 'img/category/'.$categoryImageName;

    if((!$categoryName) || (!$categoryImageName)){
        echo $error_msg = 'Please fill the fields.';
        // echo "<script>alert('Please fill the fields.')</script>";
    }
    else if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'webp' || $extension == 'png'){
        if(move_uploaded_file($categoryTemImage,$filePath)){
            $query=$run->prepare('insert into categories (Category_Name,Category_Image) values(:cnm,:cImg)');
            $query->bindParam('cnm',$categoryName);
            $query->bindParam('cImg',$categoryImageName);
            $query->execute();
            echo '<script>alert("data submited sucessfully")</script>';
        }
        else{
            echo '<script>alert("File Upload failed.")</script>';
        }
    }
    else{
        echo '<script>alert("Only jpg, png, webp, or jpeg formats are allowed.")</script>';
    }

}

?>
