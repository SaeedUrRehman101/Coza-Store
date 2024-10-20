<?php
include("User Dashboard/php/connection.php");
$Cate_ImageAddress='User Dashboard/img/category/';
$Pro_ImageAddress='User Dashboard/img/products/';
$error_email = $error_name = $error_Phone = '';
$name_vali = $email_vali = $phone_vali = $password_vali = '';
$currentUser = '';
if(isset($_POST['signUp'])){
    $name = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $password = $_POST['password'];
    $checkPassword = sha1($password);
    $valid=true;
        if(empty($name)){
            $name_vali = "Please fill Out this Field";
            $valid = false;
        }
        if(empty($Email)){
            $email_vali = "Please fill Out this Field";
            $valid = false;
        }
        if(empty($Phone)){
            $phone_vali = "Please fill Out this Field";
            $valid = false;
        }
        if(empty($password)){
            $password_vali = "Please fill Out this Field";
            $valid = false;
        }
        if(!empty($name) && !preg_match("/^[A-Za-z\s]{3,20}$/",$name)){
            $name_vali = 'Please Enter Your Full Name🚫';
            $valid = false;
        }
        if(!empty($Email) && !preg_match("/^[\w]{3,17}[@][a-z]{5,8}[.][a-z]{3}$/",$Email)){
            $email_vali = "Please Enter the Valid Pattern Of your Email🚫";
            $valid = false;
        }
        if(!empty($Phone) && !preg_match("/^[\d]{11,11}$/",$Phone)){
            $phone_vali = "Please Enter your Correct Phone Number🚫";
            $valid = false;
        }
        if(!empty($password) && !preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$&#%!])[A-Za-z,\d,@#$%&!]{8,15}$/",$password)){
            $password_vali = "Invalid Pattern of Password (Password1@)🚫";
            $valid = false;
        }
    
    // elseif($phone === $currentUser['User_Phone']){
    //     $error_phone = "Phone Number Already Exist!";
    // }
    // if(!empty($currentUser)){
    // $Email === $currentUser['User_Email'] && $error_email = "Email Already Exist🚫";
    // $name === $currentUser['User_Name'] && $error_name = "Name Already Exist!";
    // // $phone === $currentUser['User_Phone'] && $error_phone = "Phone Number Already Exist";
    // }
        if($valid){
            $checkUser = $run->prepare('select User_Name,User_Email,User_Phone from signin where User_Email = :email OR User_Phone = :phone');
            $checkUser->bindParam('email', $Email);
            $checkUser->bindParam('phone', $Phone);
            $checkUser->execute();
            $currentUser = $checkUser->fetch(PDO::FETCH_ASSOC);

            if ($currentUser) {
                // Output the currentUser in the browser console
                echo "<script>console.log(".json_encode($currentUser['User_Phone']).");</script>";
                
                if($Email === $currentUser['User_Email']){
                    $error_email = "Email Already Exist🚫";
                    $valid = false;
                }
                if($name === $currentUser['User_Name']){
                    $error_name = "Name Already Exist🚫";
                    $valid = false;
                }
                if($Phone == $currentUser['User_Phone']){
                $error_Phone = "Phone Number Already Exist🚫";
                $valid = false;
                // echo "<script>console.log('Phone Match:', ".json_encode($currentUser['User_Phone'] == $Phone).");</script>";
                }
            }

        }
        if($valid){
            $query = $run->prepare('Insert into signin( User_Name, User_Email , User_Phone , User_Password ) Values(:pn,:pe,:pPhone,:pPass)');
            $query->bindParam('pn',$name);
            $query->bindParam('pe',$Email);
            $query->bindParam('pPhone',$Phone);
            $query->bindParam('pPass',$checkPassword);
            $query->execute();
            echo "<script>alert('Data Submitted Successfully.');
            </script>";
        }
    
}

if(isset($_POST['signIn'])){
    $Email = $_POST['email'];
    $password = $_POST['password'];
    $hashPassword = sha1($password);
    $valid = true;
    if(empty($Email)){
        $email_vali = "Please fill Out this Field";
        $valid = false;
    }
    if(empty($password)){
        $password_vali = "Please fill Out this Field";
        $valid = false;
    }
    if(!empty($Email) && !preg_match("/^[\w]{3,17}[@][a-z]{5,8}[.][a-z]{3}$/",$Email)){
        $email_vali = "Please Enter the Valid Pattern Of your Email🚫";
        $valid = false;
    }
    if(!empty($password) && !preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$&#%!])[A-Za-z,\d,@#$%&!]{8,15}$/",$password)){
        $password_vali = "Invalid Pattern of Password (Password1@)🚫";
        $valid = false;
    }
    if($valid){
        $query = $run->prepare('select * from signin where User_Email = :pe && User_Password = :pp');
        $query->bindParam('pe',$Email);
        $query->bindParam('pp',$hashPassword);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result){

            $_SESSION['Id'] = $result["userId"];
            $_SESSION['Name'] = $result["User_Name"];
            $_SESSION['Email'] = $result["User_Email"];
            $_SESSION['Phone'] = $result["User_Phone"];
            $_SESSION['Password'] = $result["User_Password"];
            $_SESSION['UserRole'] = $result["User_Role"];
            $_SESSION['User_Img'] = $result["User_Image"];
            $_SESSION['User_Bio'] = $result["User_Bio"];
            echo "<script>alert('LogedIn SuccessFully.')</script>";
            if($_SESSION['UserRole'] == "Admin"){
                echo "<script>location.assign('User Dashboard/Index.php')</script>";
            }
            else{
                echo "<script>location.assign('Index.php')</script>";
            }
        }
        else{
            $email_vali = "Email Address doesn't Exist🚫";
            $password_vali = "Password doesn't Exist🚫";
        }
    }
}

            // <--------------------    ADD TO CART    --------------------> 

if(isset($_POST['addtoCart'])){
   $proId = $_POST['proId'];
   $proName = $_POST['proName'];
   $proPrice = $_POST['proPrice'];
   $proImage = $_POST['proImg'];

   if(isset($_SESSION['Name'])){
    if(isset($_SESSION['cart'])){
        echo "<script>alert('cart session already exist..')</script>";
       }
       else{
        $_SESSION['cart'][0] = array("proId"=>$proId,"proName"=>$proName,"proPrice"=>$proPrice,"proImg"=>$proImage);
        echo "<script>alert('Product is added into the cart...')</script>";
       }
   }
   else{
    echo "<script>alert('Somthing Went Wrong.')</script>";
   }
}

$revImage_Address = 'images/review/';

if(isset($_POST['reviewBtn'])){
    $userId = $_POST['userId'];
    $proId = $_POST['proId'];
    $userRev = $_POST['userReview'];
    $revImg = $_FILES['reviewImage']['name'];
    $revTemName = $_FILES['reviewImage']['tmp_name'];
    $extension = pathinfo($revImg, PATHINFO_EXTENSION);
    $filePath = $revImage_Address . $revImg;

    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'webp' || $extension == 'png') {
        if (move_uploaded_file($revTemName, $filePath)) {
            // INSERT query without WHERE clause
            $query = $run->prepare(
                'INSERT INTO userreview (user_review, user_Image, user_signId, review_ProId) 
                 VALUES (:urev, :revImg, :userId, :revProId)'
            );

            $query->bindParam('urev', $userRev);
            $query->bindParam('revImg', $revImg);
            $query->bindParam('userId', $userId);
            $query->bindParam('revProId', $proId);

            $query->execute();
            echo '<script>alert("Review submitted successfully")</script>';
        }
    }
}


if(isset($_POST['updReview'])){
    $userId = $_POST['userId'];
    $proId = $_POST['proId'];
    $revId = $_POST['reviewId'];
    $userRev = $_POST['userReview'];
    $revImg = $_FILES['reviewImage']['name'];
    $revImgChanged = !empty($revImg);
    if($revImgChanged){
        $revTemName = $_FILES['reviewImage']['tmp_name'];
        $extension = pathinfo($revImg, PATHINFO_EXTENSION);
        $filePath = $revImage_Address . $revImg;
        if($extension == 'jpg' || $extension == 'webp' || $extension == 'png' || $extension == 'png' || $extension == 'jpeg'){
            if(move_uploaded_file($revTemName,$filePath)){
                $query= $run->prepare('update userreview set user_review = :urev , user_Image = :uImg where review_Id = :revId');
                $query->bindParam('revId',$revId);
                $query->bindParam('urev',$userRev);
                $query->bindParam('uImg',$revImg);
                $query->execute();
                echo "<script>alert('Review Updated Succesfully..')</script>";
            }
        }
    }
    else{
        $query = $run->prepare('update userreview set user_review = :urev where review_Id = :revId');
        $query->bindParam('revId',$revId);
        $query->bindParam('urev',$userRev);
        $query->execute();
        echo "<script>alert('User Review Updated Succesfully..')</script>";
    }
}

if(isset($_POST['deletReview'])){
    $revId = $_POST['delrevId'];
    $query= $run->prepare('delete from userreview where review_Id = :revId');
    $query->bindParam('revId',$revId);
    $query->execute();
    echo "<script>alert('Review Deleted Succesfully..')</script>";
}



?>

        <!-- <-----------------------    preg_match         -------------------------->

<!-- Agar aapko kisi string mein specific pattern ya substring dhundhna hai, toh preg_match istemal kar sakte hain. -->


<!-- INSERT INTO `signin` (`userId`, `User_Name`, `User_Email`, `User_Phone`, `User_Password`, `User_Role`) VALUES (NULL, 'Admin', 'admin01@gmail.com', '1234567891', 'admin@01', 'Admin'); -->