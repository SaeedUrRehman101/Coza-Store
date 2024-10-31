<?php
include("connection.php");
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


// include("User Dashboard/php/connection.php");
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
   if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
    }
   if(isset($_SESSION['Name'])){
        if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
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

if (isset($_POST['orderPlace'])) {
    $Id = $_SESSION['Id'];
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPhone = $_POST['phone'];
    $userAddress = $_POST['address'];
    $itemCounts = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    $proQuantities = 0;
    $subTotal = 0;
    $imgUrl = 'http://localhost/PHP/Web%20Panel/User%20DashBoard/img/products/';
    
    function confirmationCode() {
        $randomNum = rand(1, 999999);
        return $randomNum;
    }
    
    date_default_timezone_set("Asia/Karachi");
    $currentTime = time();
    $completeDate = date("D, M d, Y h:i A", $currentTime);
    $date = date("D, M d, Y ", $currentTime);
    $time = date("h:i A", strtotime($completeDate));
    $nextDate = date("D, M d, Y ", strtotime('+5 days'));
    $confirmation = confirmationCode();
    $proNames = [];
    $itemNumber = 1;

    // <------//FOR EMAIL STYLEING AND ALSO WE SET THE MEDIA QUERIES IN OUR MIND SO I LIKE THAT K HUM PX,REM,EM KO NA USE KARAIN IT'S NOT WELL WORKING IN EMAIL ELSE YE BETTER HAI K HM "VW" IS TOO MUCH BETTER.------>
    // Email content header with center-aligned image
    $emailBody = '<div style="text-align: center;">
                    <img src="https://i.postimg.cc/xT74QnfK/Green-Minimalist-Online-Shop-Logo-Icon.png" width="200" height="200" alt="Store Icon" />
                  </div>';
    
    // Package title and details
    $emailBody .= '<div style="font-size: 20px; text-align: center; color:rgb(13, 205, 15); padding-left:15%;padding-right:15%">Thanks for shopping with us!</div>';
    $emailBody .= '<div style="padding-left:15%; padding-right:15%;">';
    $emailBody .= '<div style="font-size: .9rem; padding-top:30px;">Hi '.$userName.',</div>';
    $emailBody .= '<div style="font-size: .9rem; border-bottom:5px solid #ddd; padding-bottom:10px; padding-top:10px; text-align:justify;">We received your Order Details on '.$date.' '.$time.' and you will be paying for this via Cash On Delivery. We are getting your order ready and will let you know once you confirm your Order.Your Confirmation Code is <b>'.$confirmation.'</b>. We wish you enjoy shopping with us and hope to see you again real soon!</div>';
    $emailBody .= '</div>';

    // Loop through cart items
    foreach ($_SESSION['cart'] as $keys => $values) {
        $proNames[] = $values['proName'];
        $proQuantities += $values['proQuantity'];
        $subTotal += $values['proPrice'] * $values['proQuantity'];

        // Insert order details into database
        $orderQuery = $run->prepare('INSERT INTO `orders`(`product_Id`, `product_Name`, `product_Price`, `product_Quantity`, `user_Id`, `user_Email`, `user_Address`, `order_Date`, `order_Time`, `user_Name`, `product_Image`, `user_Phone`, `Confirmation`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $orderQuery->execute([$values['proId'], $values['proName'], $values['proPrice'], $values['proQuantity'], $Id, $userEmail, $userAddress, $date, $time, $userName, $values["proImg"], $userPhone, $confirmation]);

        $emailBody .= '<div style="padding-left:15%; padding-right:15%; color:black !important;">';
        $emailBody .= '<div style="font-size: .9rem; margin-top: 20px; padding-bottom:10px;"><img src="https://i.postimg.cc/bJhBDTWL/Package.png" style="width: 20px; height: 20px;" alt="Package Icon" /> Package '.$itemNumber++.':</div>';
        $emailBody .= '<div style="color: #666; padding-bottom:10px;">Sold by: Combine Communication</div>';
        $emailBody .= '<div style="color: #666; padding-bottom:10px;">Estimated Delivery Dates: '.$date.' - '.$nextDate.'</div>';
        $emailBody .= '</div>'; 

        // Add product details to email body
        $emailBody .= '<div style="padding-top: 10px; margin-top: 10px; padding-left:15%; padding-right:15%;">';

        // Product Image
        // $emailBody .= '<div style="text-align: center;">
        //                 <img src="' . $imgUrl . $values["proImg"] . '" width="100" height="100" alt="Product Image" style="border: 1px solid #ddd; padding: 5px;"/>
        //               </div>';

        // Product Details
        $emailBody .= '<div>
                        <div style="font-size: 16px; font-weight: bold; padding-bottom:5px;">' . $values['proName'] . '</div>
                        <div style="color: #666; padding-bottom:5px;">6GB + 128GB, 6.88 Inches IPS HD+ Display, Mediatek Helio G81 Ultra, 5160 mAh - 18W wired</div>
                        <div style="font-size: .9rem; color: #d9534f; padding-bottom:5px;">$. ' . number_format($values['proPrice'] * $values['proQuantity']) . '</div>
                        <div style="border-bottom: 5px solid #ddd; padding-bottom:10px;">Quantity: ' . $values['proQuantity'] . '</div>
                      </div>';

        $emailBody .= '</div>';
        // $itemNumber++;
    }

    $emailBody .= '<div style="padding-left:15%; padding-right:15%;">';
    // $emailBody .= '<div style="font-size: .9rem; margin-top: 20px; color:black; display: flex; flex-direction: row; justify-content: space-between;">Total Amount:<span style="font-size: .9rem; font-weight: bold; color:rgb(13, 205, 15);"> $. ' . number_format($subTotal) . '</span></div>';
    $emailBody .= '<table cellpadding="0" cellspacing="0" style="width:100%; margin-top:.9rem;">';
    $emailBody .= '<tbody>';
    $emailBody .= '<tr>
                        <td valign="top" style="width:69%; font-size: .9rem;  color:black;">Total Amount:</td>
                        <td align="right" valign="top" colspan="1" style="font-size: .9rem; font-weight: bold; color:rgb(13, 205, 15);">$. ' . number_format($subTotal) . '</td>
                    </tr>';
    $emailBody .= '</tbody>';
    $emailBody .= '</table>';
    $emailBody .= '</div>';

    $order = $run->prepare('select * from orders where Confirmation = :cId');
    $order->bindParam('cId',$confirmation);
    $order->execute();
    $result = $order->fetchAll(PDO::FETCH_ASSOC);
    $orderIds = array();
    foreach($result as $OrderID){
        $orderIds[]= $OrderID['Order_Id'];
    }
    $orderIdstr = implode(',',$orderIds);
    $allproNames = implode(',', $proNames);
    // print_r($orderIdstr);
    $invoiceQuery = $run->prepare('INSERT INTO `invoice`(`product_Names`, `user_Id`, `totalProductsQuanity`, `totalAmount`, `date`, `time`, `confirmationId`, `totalItems`) VALUES(?,?,?,?,?,?,?,?)');
    $invoiceQuery->execute([$allproNames, $Id, $proQuantities, $subTotal, $date, $time, $confirmation, $itemCounts]);
    $invoiceId = $run->lastInsertId();
    foreach($result as $Order){
        $orderId = $Order['Order_Id'];
        $invoiceOrder = $run->prepare('INSERT INTO `invoice_orderid`(`invoice_OrderId`, `OrderId`) VALUES (?,?)');
        $invoiceOrder->execute([$invoiceId,$orderId]);
    }
    echo "<script>location.assign('shippingInfo.php');</script>";

    try {
        // Mail settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'surthunder01@gmail.com';
        $mail->Password   = 'tusv nrzc erpu wesg';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('surthunder01@gmail.com', 'Coza Store');
        $mail->addAddress($userEmail, $userName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Delivery Confirmation Code.';
        $mail->Body    = $emailBody; // Assign dynamically generated HTML content to email body
        $mail->AltBody = 'This is the plain text email for order confirmation';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



// <----------------------------   SEARCH WORK   ---------------------------->

if(isset($_POST['searchProduct'])){
    $searchProduct = $_POST['searchProduct'];
    $query = $run->prepare("select * from products where upper(Product_Name) like '%$searchProduct%' or upper(Product_Description) like '%$searchProduct%'");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if($result){
        foreach($result as $Products){
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $Products['Product_CatId'] ?>">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="<?php echo $Pro_ImageAddress.$Products['Product_Image'] ?>" alt="IMG-PRODUCT">
    
    
                            <a href="#product<?php echo $Products['Product_Id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" id="<?php echo $Products['Product_Id'] ?>">
                                Quick View
                            </a>
        
                        </div>
    
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.php?proId=<?php echo $Products['Product_Id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-uppercase">
                                    <?php echo $Products["Product_Name"] ?>
                                </a>
    
                                <span class="stext-105 cl3">
                                $, <?php echo $Products['Product_Price'] ?>
                                </span>
                            </div>
    
                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
    else{
        echo "<div class='container col-sm-2 col-md-5 col-lg-10 isotope-item'>
						<div class='stext-114 text-capitalize p-t-30 p-b-40 col-sm-5 col-lg-10 text-center'>No products found...</div>
						<div class='search-error'>
						<img src='images/light.png' class='col-sm-2 col-md-10 p-l-50' alt='IMG-PRODUCT'>;
						</div>
						</div>";
    }
    
}

// <----------------------------   Order Confirmation Code   ---------------------------->
$confrimationCode_Error = '';
if (isset($_POST['confirmCode'])) {
    $confirmCode = $_POST['confirmCode'];
    $invoiceId = $_POST['invoiceId']; // invoiceId ko POST se lene ka code

    // Query to get order details using invoiceId and check confirmation code
    $Orders = $run->prepare('SELECT ord.*, inOrd.* FROM invoice_orderid inOrd INNER JOIN orders ord ON inOrd.OrderId = ord.Order_Id WHERE inOrd.invoice_OrderId = :invId');
    $Orders->bindParam(':invId', $invoiceId);

    try {
        if ($Orders->execute()) {
            $OrdersCode = $Orders->fetch(PDO::FETCH_ASSOC);
            
            // Check if confirmation code matches
            if ($OrdersCode && $OrdersCode['Confirmation'] == $confirmCode) {
                $confrimationCode_Error = 'Code is Correct';
                $response = [
                    'message' => $confrimationCode_Error,
                    'success' => true
                ];
    unset($_SESSION['cart']);
            } else {
                $confrimationCode_Error = 'Code is Incorrect';
                $response = [
                    'message' => $confrimationCode_Error,
                    'success' => false
                ];
            }
        }
    } 
    catch (PDOException $e) {
        // Database query failed: show the error message
        echo json_encode(['success' => false, 'message' => 'Database query failed: ' . $e->getMessage()]);
        exit;
    }
    
    // Send response
    echo json_encode($response);
    exit;
}


if(isset($_POST['proceedButton'])){
    unset($_SESSION['cart']);
    echo "<script>alert('Ordered Placed Successfully.')
    location.assign('index.php');
    </script>";
}

// <----------------------------   USER PROFILE   ---------------------------->


if(isset($_POST['updateUser'])){
    $id = $_POST['userId'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $bio = $_POST['bio'];
    $Img = $_FILES['img']['name'];
    $userImg = !empty($Img);
    $userCheckInput = $run->prepare('select User_Name, User_Phone , User_Password , User_Email , User_Bio , User_Image from signin where userId = :uid');
    $userCheckInput->bindParam('uid',$id);
    $userCheckInput->execute();
    $checkInputs = $userCheckInput->fetch(PDO::FETCH_ASSOC);
    if($checkInputs['User_Password'] == $password && $checkInputs['User_Email'] == $email && $checkInputs['User_Name']==$name && $checkInputs['User_Phone']==$phone && (!$userImg || $checkInputs['User_Image'] == $Img) && $checkInputs['User_Bio'] == $bio){
        echo "<script>alert('You already set this Data.')</script>";
    }
    else{
        if(!empty($name)){
            $_SESSION['Name'] = $_POST['name'];
        }
        if(!empty($phone)){
            $_SESSION['Phone'] = $_POST['phone'];
            // print_r($_POST['phone']);
        }
        if(!empty($email)){
            $_SESSION['Email'] = $_POST['email'];
        }
        if(!empty($password) && $password != $checkInputs['User_Password']){
            $hashPassword = sha1($password);
            $_SESSION['Password'] = $hashPassword;
            // echo "SESSION Password: " . $_SESSION['Password'] . "<br>";
            // echo "Input Password : " . $hashPassword . "<br>";
        }
        if(!empty($bio)){
            $_SESSION['User_Bio'] = $bio;
        }
        if($userImg){
            $_SESSION["User_Img"] = $Img;
            $tempName = $_FILES['img']['tmp_name'];
            $extension = pathinfo($Img,PATHINFO_EXTENSION);
            $filePath = $userImage_Address.$Img;
            if($extension == 'jpg' || $extension == 'webp' || $extension == 'png' || $extension == 'png' || $extension == 'jpeg'){
                if(move_uploaded_file($tempName,$filePath)){
                    $query = $run->prepare('update signin set User_Name = :un, User_Phone = :uph , User_Password = :upass , User_Email = :ue , User_Image = :uImg , User_Bio = :ub where userId = :uid');
                    $query->bindParam('uid',$id);
                    $query->bindParam('un',$_SESSION['Name']);
                    $query->bindParam('uph',$_SESSION['Phone']);
                    $query->bindParam('upass',$_SESSION['Password']);
                    $query->bindParam('ue',$_SESSION['Email']);
                    $query->bindParam('uImg',$_SESSION['User_Img']);
                    $query->bindParam('ub',$_SESSION['User_Bio']);
                    $query->execute();
                    echo '<script>alert("Successfully Updated Your File.")</script>';
                    // print_r($checkInputs['User_Password']);
                    // print_r($_SESSION['Password']);
                }
            }
        }
        else{
            $query = $run->prepare('update signin set User_Name = :un, User_Phone = :uph , User_Password = :upass , User_Email = :ue , User_Bio = :ub where userId = :uid');
                    $query->bindParam('uid',$id);
                    $query->bindParam('un',$_SESSION['Name']);
                    $query->bindParam('uph',$_SESSION['Phone']);
                    $query->bindParam('upass',$_SESSION['Password']);
                    $query->bindParam('ue',$_SESSION['Email']);
                    $query->bindParam('ub',$_SESSION['User_Bio']);
                    $query->execute();
                    echo '<script>alert("Successfully Updated Your File.")</script>';
        }
    }
    
}

?>

        <!-- <-----------------------    preg_match         -------------------------->

<!-- Agar aapko kisi string mein specific pattern ya substring dhundhna hai, toh preg_match istemal kar sakte hain. -->


<!-- INSERT INTO `signin` (`userId`, `User_Name`, `User_Email`, `User_Phone`, `User_Password`, `User_Role`) VALUES (NULL, 'Admin', 'admin01@gmail.com', '1234567891', 'admin@01', 'Admin'); -->