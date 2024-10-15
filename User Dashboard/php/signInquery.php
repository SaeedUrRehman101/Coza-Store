<?php
include('connection.php');
$name_vali = $email_vali = $phone_vali = $password_vali = '';
$currentUser = '';
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
                echo "<script>location.assign('Index.php')</script>";
            }
            else{
                echo "<script>location.assign('../Index.php')</script>";
            }
        }
        else{
            $email_vali = "Email Address doesn't Exist🚫";
            $password_vali = "Password doesn't Exist🚫";
        }
    }
}

?>