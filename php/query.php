<?php
include("../User Dashboard/php/connection.php");
$error_email = $error_name = $error_Phone = '';
$name_vali = $email_vali = $phone_vali = $password_vali = '';
$currentUser = '';
if(isset($_POST['signIn'])){
    $name = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $password = $_POST['password'];
    $checkPassword = sha1($password);
    $checkUser = $run->prepare('select User_Name,User_Email,User_Phone from signin where User_Email = :email OR User_Phone = :phone');
    $checkUser->bindParam('email', $Email);
    $checkUser->bindParam('phone', $Phone);
    $checkUser->execute();
    $currentUser = $checkUser->fetch(PDO::FETCH_ASSOC);
    $valid=true;
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
    if(!preg_match("/^[A-Za-z\s]{3,20}$/",$name)){
        $name_vali = 'Please Enter Your Full Name🚫';
        $valid = false;
    }
    if(!preg_match("/^[\w]{3,17}[@][a-z]{5,8}[.][a-z]{3}$/",$Email)){
        $email_vali = "Please Enter the Valid Pattern Of your Email🚫";
        $valid = false;
    }
    if(!preg_match("/^[\d]{11,11}$/",$Phone)){
        $phone_vali = "Please Enter your Correct Phone Number🚫";
        $valid = false;
    }
    if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$&#%!])[A-Za-z,\d,@#$%&!]{8,15}$/",$password)){
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

?>

        <!-- <-----------------------    preg_match         -------------------------->

<!-- Agar aapko kisi string mein specific pattern ya substring dhundhna hai, toh preg_match istemal kar sakte hain. -->