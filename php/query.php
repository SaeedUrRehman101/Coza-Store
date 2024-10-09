<?php
include("User Dashboard/php/connection.php");
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
?>

        <!-- <-----------------------    preg_match         -------------------------->

<!-- Agar aapko kisi string mein specific pattern ya substring dhundhna hai, toh preg_match istemal kar sakte hain. -->


<!-- INSERT INTO `signin` (`userId`, `User_Name`, `User_Email`, `User_Phone`, `User_Password`, `User_Role`) VALUES (NULL, 'Admin', 'admin01@gmail.com', '1234567891', 'admin@01', 'Admin'); -->