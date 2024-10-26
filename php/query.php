<?php
include("User Dashboard/php/connection.php");
$userImage_Address = "User Dashboard/img/User/"; //User Image we got from signIn
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
// session_unset();
// unset($_SESSION['cart']);

if(isset($_POST['addtoCart'])){
   $proId = $_POST['proId'];
   $proName = $_POST['proName'];
   $proPrice = $_POST['proPrice'];
   $proImage = $_POST['proImg'];
   $proQuan = $_POST['proQuantity'];
   if(isset($_SESSION['Name'])){
        if(isset($_SESSION['cart'])){
            $cartQuantity = false; //jb bi cart ki id match nhi kry gi neechy jo condition hai us k hisab sy to ye false hai isy !$cartQuantity jo hai wo true usy set kr dygi
            foreach($_SESSION['cart'] as $keys=>$values){
                if($values['proId'] == $proId){
                    $cartQuantity = true;
                    $_SESSION['cart'][$keys]['proQuantity'] = $values['proQuantity'] + $proQuan;
                    echo "<script>alert('Just Cart Quantity is Updated..')</script>";
                }
            }
            if(!$cartQuantity){ // cartQuantity true ho means oper cart false hai to usy true set kr dyga is not operator k thorugh or phir product cart mai add ho jay ga second ya soo on products;
                $_SESSION['cart'][] = array("proId"=>$proId,"proName"=>$proName,"proPrice"=>$proPrice,"proImg"=>$proImage,"proQuantity"=>$proQuan);
                echo "<script>alert('Product is added into the cart...')</script>";
            }
            // is trha bi kr skty hai
            // if(!$cartQuantity){
            //     $cartCount = count($_SESSION['cart']);
            //     $_SESSION['cart'][$cartCount]=array("proId"=>$pId,"proName"=>$pName,"proPrice"=>$pPrice,"proQuantity"=>$pQuantity,"proImage"=>$pImage);
            //     echo "<script>alert('product add into cart')</script>";
            //  }
        }
        else{
            $_SESSION['cart'][0] = array("proId"=>$proId,"proName"=>$proName,"proPrice"=>$proPrice,"proImg"=>$proImage,"proQuantity"=>$proQuan);
            echo "<script>alert('Product is added into the cart...')</script>";
        }
   }
   else{
    echo "<script>alert('Somthing Went Wrong.')</script>";
   }
}

// <------------------------ DELETE CART  ------------------------>

if(isset($_GET['delCartId'])){
    $cartId = $_GET['delCartId'];
    foreach($_SESSION['cart'] as $keys => $values){
        if($values['proId'] == $cartId){
            unset($_SESSION['cart'][$keys]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "<script>alert('cart Deleted...')</script>";
        }
    }
}


            // <--------------------    REVIEW WORK    --------------------> 


date_default_timezone_set('Asia/Karachi');

function timeAgo($datetime) {
    // DateTime object bana rahe hain review time ke liye
    $reviewTime = new DateTime($datetime);
    
    // Current time ka DateTime object bana rahe hain
    $currentTime = new DateTime();

    // Time ka difference nikal rahe hain (interval)
    $interval = $currentTime->diff($reviewTime);

    // Minutes aur hours ka calculation
    $minutes = $interval->i; // Interval se minutes
    $hours = $interval->h + ($interval->d * 24); // Din ko hours mein convert kar rahe hain
    $month = $interval->m;
    $day = $interval->d;

    if($month>0){
        return $month . 'month' . ($month > 1 ? 's' : '') . 'ago';
    }
    if($day > 0){
        return $day . "d ago";
    }
    if ($hours > 0) {
        return $hours . 'h ago';
    }
    else {
        return $minutes . 'm ago';
    }
}

$revImage_Address = 'images/review/';
$revError = $revImgError = '';

if(isset($_POST['reviewBtn'])) {
    $userId = $_POST['userId'];
    $proId = $_POST['proId'];
    $userRev = $_POST['userReview'];
    $userRating = $_POST['starRating'];
    $revImg = $_FILES['reviewImage']['name']; // Array of image names

    if(empty($userRev)) {
        $revError = "Please fill out this field.";
    }

    if(empty($revImg[0])) { // Check if no image is selected
        $revImgError = "Please select an Image.";
    } 
    else {
        $uploadedImages = []; // Array to store uploaded image names

        foreach($revImg as $keys => $ImageName) {
            $revTemName = $_FILES['reviewImage']['tmp_name'][$keys]; // Temp name for each file
            $extension = pathinfo($ImageName, PATHINFO_EXTENSION); // Get the file extension
            $filePath = $revImage_Address . $ImageName; // Set the file path with original image name
            
            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'webp' || $extension == 'png') {
                if (move_uploaded_file($revTemName, $filePath)) {
                    $uploadedImages[] = $ImageName; // Store the original image name in array
                } else {
                    echo '<script>alert("Image upload failed.")</script>';
                }
            } else {
                echo '<script>alert("Only jpg, png, webp, or jpeg formats are allowed.")</script>';
            }
        }

        // Implode the image names array into a comma-separated string
        $imageString = implode(',', $uploadedImages);

        $query = $run->prepare(
            'INSERT INTO userreview (user_review, user_Image, userRatings, user_signId, review_ProId, review_time) 
                VALUES (:urev, :revImg, :urat, :userId, :revProId, NOW())'
        );

        $query->bindParam(':urev', $userRev);
        $query->bindParam(':revImg', $imageString); 
        $query->bindParam(':urat', $userRating);
        $query->bindParam(':userId', $userId);
        $query->bindParam(':revProId', $proId);

        $query->execute();
        echo '<script>alert("Review submitted successfully")</script>';
    }
}

            

//UPDATE REVIEW;-

if (isset($_POST['updReview'])) {
    $userId = $_POST['userId'];
    $proId = $_POST['proId'];
    $revId = $_POST['reviewId'];
    $userRev = $_POST['userReview'];
    $userRate = $_POST['starRating'];
    $revImg = $_FILES['reviewImage']['name']; // Yeh hamesha array hoga
    $revImgChanged = !empty($revImg);

    $currentrevQuery = $run->prepare('SELECT user_review, user_Image, userRatings FROM userreview WHERE review_Id = :revId');
    $currentrevQuery->bindParam('revId', $revId);
    $currentrevQuery->execute();
    $currentreview = $currentrevQuery->fetch(PDO::FETCH_ASSOC);

    if ($userRev == $currentreview['user_review'] && (!$revImgChanged || $revImg == $currentreview['user_Image']) && $userRate == $currentreview['userRatings']) {
        echo "<script>alert('You already set this data.')</script>";
    } else {
        if ($revImgChanged) {
            $uploadedImages = []; // Initialize as an array
            foreach ($_FILES['reviewImage']['name'] as $key => $ImageName) {
                $revTemName = $_FILES['reviewImage']['tmp_name'][$key];
                $extension = pathinfo($ImageName, PATHINFO_EXTENSION);
                $filePath = $revImage_Address . $ImageName;

                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'webp' || $extension == 'png') {
                    if (move_uploaded_file($revTemName, $filePath)) {
                        $uploadedImages[] = $ImageName;
                    }
                }
            }

            // Check if any images were uploaded before imploding
            if (!empty($uploadedImages)) {
                $imageString = implode(',', $uploadedImages); // Convert array to string
                $query = $run->prepare('UPDATE userreview SET user_review = :urev, user_Image = :uImg, userRatings = :urat, review_Time = NOW() WHERE review_Id = :revId');
                $query->bindParam('revId', $revId);
                $query->bindParam('urev', $userRev);
                $query->bindParam('urat', $userRate);
                $query->bindParam('uImg', $imageString);
                $query->execute();
                echo "<script>alert('Review Updated Successfully..')</script>";
            }
            else {
                echo "<script>alert('No images were uploaded.')</script>";
            }
        }
        else {
            $query = $run->prepare('UPDATE userreview SET user_review = :urev, userRatings = :urat WHERE review_Id = :revId');
            $query->bindParam('revId', $revId);
            $query->bindParam('urev', $userRev);
            $query->bindParam('urat', $userRate);
            $query->execute();
            echo "<script>alert('User Review Updated Successfully..')</script>";
        }
    }
}

//DELETE REVIEW;-

if(isset($_POST['deletReview'])){
    $revId = $_POST['delrevId'];
    $query= $run->prepare('delete from userreview where review_Id = :revId');
    $query->bindParam('revId',$revId);
    $query->execute();
    echo "<script>alert('Review Deleted Succesfully..')</script>";
}


// <----------------------------   DELIVERY INFORMATIOM   ---------------------------->

if(isset($_POST['orderPlace'])){
   $Id = $_SESSION['Id'];
   $userName = $_POST['name'];
   $userEmail = $_POST['email'];
   $userPhone = $_POST['phone'];
   $userAddress = $_POST['address'];
   $itemCounts = count($_SESSION['cart']);
   $proQuantities = 0;
   $subTotal = 0;
   function confirmationCode(){
    $randomNum = rand(1,999999);
    return $randomNum;
   };
   date_default_timezone_set("Asia/Karachi");
   $currentTime = time();
   $completeDate = date("D, M d, Y h:i A",$currentTime);
   $date = date("D, M d, Y ",$currentTime);
   $time = date("h:i A",strtotime($completeDate));
   $confirmation = confirmationCode();
   $proNames = [];

   foreach($_SESSION['cart'] as $keys=> $values){
    $proNames[] =$values['proName']; //invoice k liye yha names ko array mai collect kr layn gay
    $proQuantities += $values['proQuantity'];
    $subTotal += $values['proPrice']*$values['proQuantity']; //is trha write krna hai because jb hm $proQuantities ko agr yha likhy to wo 1 quantity zyada add krdyta hai;

    $orderQuery = $run->prepare('INSERT INTO `orders`(`product_Id`, `product_Name`, `product_Price`, `product_Quantity`, `user_Id`, `user_Email`, `user_Address`, `order_Date`, `order_Time`, `user_Name`, `product_Image`, `user_Phone`, `Confirmation`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
    $orderQuery->execute([$values['proId'],$values['proName'],$values['proPrice'],$values['proQuantity'],$Id,$userEmail,$userAddress,$date,$time,$userName,$values["proImg"],$userPhone,$confirmation]);

   }

   $allproNames = implode(',',$proNames);
   $invoiceQuery = $run->prepare('INSERT INTO `invoice`(`product_Names`, `user_Id`, `totalProductsQuanity`, `totalAmount`, `date`, `time`, `confirmationId`, `totalItems`) VALUES(?,?,?,?,?,?,?,?)');
   $invoiceQuery->execute([$allproNames,$Id,$proQuantities,$subTotal,$date,$time,$confirmation,$itemCounts]);
   echo "<script>alert('Ordered Placed Successfully.')</script>";

}


?>

        <!-- <-----------------------    preg_match         -------------------------->

<!-- Agar aapko kisi string mein specific pattern ya substring dhundhna hai, toh preg_match istemal kar sakte hain. -->


<!-- INSERT INTO `signin` (`userId`, `User_Name`, `User_Email`, `User_Phone`, `User_Password`, `User_Role`) VALUES (NULL, 'Admin', 'admin01@gmail.com', '1234567891', 'admin@01', 'Admin'); -->