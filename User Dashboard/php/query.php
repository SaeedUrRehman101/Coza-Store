<?php
include('connection.php');
$Cate_ImageAddress='img/category/';
$user_ImageAddress = 'img/User/';
$error_Name=$error_Img='';
$categoryName=$categoryImageName='';

if(isset($_POST['addCategory'])){
    $categoryName = $_POST['cateName'];
    $categoryImageName = $_FILES['cateImage']['name'];
    $categoryTemImage = $_FILES['cateImage']['tmp_name'];
    $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION); // path_extension => show extension of the files like it's jpg,jpeg,webp,and so on.
    $filePath = 'img/category/'.$categoryImageName;

    if(empty($categoryImageName)){
         $error_Img = 'Please select an Image.';
    }
    if(empty($categoryName)){
        $error_Name = 'Please fill out the fields.';
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
            echo '<script>alert("Only jpg, png, webp, or jpeg formats are allowed.")</script>';
        }
    }
    else{
        echo '<script>alert("File Upload failed.")</script>';
    }
}

// UPDATE CATEGORY;

if(isset($_POST['updateCategory'])){
    $categoryName = $_POST['cateName'];
    $categoryid = $_POST['cateId'];
    $categoryImageName = $_FILES['cateImage']['name'];

    $currentQuery = $run->prepare('select Category_Name,Category_Image from categories where id = :cateId');
    $currentQuery->bindParam('cateId',$categoryid);
    $currentQuery->execute();
    $currentCategories = $currentQuery->fetch(PDO::FETCH_ASSOC);
    $currentCate_Name = $currentCategories['Category_Name'];
    $currentCate_Image = $currentCategories['Category_Image'];

    $categoryImageChanged = !empty($categoryImageName);

    if($categoryName == $currentCate_Name && (!$categoryImageChanged || $categoryImageName == $currentCate_Image)){
        echo "<script>alert('You already set this data.')</script>";
    }
    // Check if the category name already exists
    // $checkQuery=$run->prepare('SELECT Count(*) from categories where Category_Name=:cateName AND id != :cateId');
    // $checkQuery->bindParam('cateName',$categoryName);
    // $checkQuery->bindParam('cateId',$categoryid);
    // $checkQuery->execute();
    // $exists = $checkQuery->fetchColumn();

    // if($exists > 0 && $categoryName !== $currentCate_Name){
    //     echo "<script>alert('You already set this data.')</script>";
    // }

    else{
        if($categoryImageChanged){ //if the uer updated the image then this condition will be ture
            $categoryTemImage =$_FILES['cateImage']['tmp_name'];
            $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION);
            $filePath ='img/category/'.$categoryImageName;
            if($extension == 'jpg' || $extension == 'webp' || $extension == 'png' || $extension == 'png' || $extension == 'jpeg'){
                if(move_uploaded_file($categoryTemImage,$filePath)){
                    $query = $run->prepare('update categories set Category_Name = :cateName , Category_Image = :cateImg where id = :cateId');
                    $query->bindParam('cateName',$categoryName);
                    $query->bindParam('cateImg',$categoryImageName);
                    $query->bindParam('cateId',$categoryid);
                    $query->execute();
                    echo '<script>alert("Category Updated into Your File.")</script>';
                }
            }
            else{
                echo '<script>alert("Only jpg, png, webp, or jpeg formats are allowed.")</script>';
            }
        }
        else{ // if the user don't upload any image the old image will be set in the input
            $query=$run->prepare('update categories set Category_Name = :cateName where id = :cateId');
            $query->bindParam('cateName',$categoryName);
            $query->bindParam('cateId',$categoryid);
            $query->execute();
            echo '<script>alert("Successfully Updated Your File.")</script>';
        }
    }

}

// <!-- DELETE CATEGORY -->

if(isset($_GET['cateDelid'])){
    $id = $_GET['cateDelid'];
    $query=$run->prepare('delete from categories where id = :cateId');
    $query->bindParam('cateId',$id);
    $query->execute();
    echo "<script>alert('Category Deleted Successfully.');
    location.assign('category.php');
    </script>
    ";
}


// ADD PRODUCT CATEGORY 

$Pro_ImageAddress='img/products/';

if(isset($_POST['addProduct'])){
    $productId = $_POST['proId'];
    $productName = $_POST['proName'];
    $productPrice = $_POST['proPrice'];
    $productQuantity = $_POST['proQuan'];
    $productDesc = $_POST['proDesc'];
    $productCateId = $_POST['proCateId'];
    $productImageName = $_FILES['proImage']['name'];
    $productTemImage = $_FILES['proImage']['tmp_name'];
    $extension = pathinfo($productImageName,PATHINFO_EXTENSION); // path_extension => show extension of the files like it's jpg,jpeg,webp,and so on.
    $filePath = 'img/products/'.$productImageName;

    if(empty($productImageName)){
         $error_Img = 'Please select an Image.';
    }
    if(empty($productName)){
        $error_Name = 'Please fill out the fields.';
    }
    else if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'webp' || $extension == 'png'){
        if(move_uploaded_file($productTemImage,$filePath)){
            $query=$run->prepare('INSERT INTO `products`(`Product_Name`, `Product_Price`, `Product_Quantity`, `Product_Description`, `Product_Image`, `Product_CatId`) VALUES(:pn,:pp,:pquan,:pdesc,:pImg,:pcateId)');
            $query->bindParam('pn',$productName);
            $query->bindParam('pp',$productPrice);
            $query->bindParam('pquan',$productQuantity);
            $query->bindParam('pdesc',$productDesc);
            $query->bindParam('pImg',$productImageName);
            $query->bindParam('pcateId',$productCateId);
            $query->execute();
            echo '<script>alert("data submited sucessfully")</script>';
        }
        else{
            echo '<script>alert("Only jpg, png, webp, or jpeg formats are allowed.")</script>';
        }
    }
    else{
        echo '<script>alert("File Upload failed.")</script>';
    }
}

// UPDATE PRODUCT CATEGORY 

if(isset($_POST['updateProduct'])){
    $productId = $_POST['proId'];
    $productName = $_POST['proName'];
    $productPrice = $_POST['proPrice'];
    $productQuantity = $_POST['proQuan'];
    $productDesc = $_POST['proDesc'];
    $productCateId = $_POST['proCatId'];
    $productImageName = $_FILES['proImage']['name'];

    $currentProQuery = $run->prepare('select Product_Id, Product_Name, Product_Price, Product_Quantity, Product_Description, Product_Image, Product_CatId FROM products WHERE Product_Id=:proId');
    $currentProQuery->bindParam('proId',$productId);
    $currentProQuery->execute();
    $currentProduct= $currentProQuery->fetch(PDO::FETCH_ASSOC);
    $productImageChanged = !empty($productImageName);

    if($productName == $currentProduct['Product_Name'] && $productPrice == $currentProduct['Product_Price'] && $productQuantity==$currentProduct['Product_Quantity'] && $productDesc==$currentProduct['Product_Description'] && (!$productImageChanged || $productImageName == $currentProduct['Product_Image']) && $productCateId == $currentProduct['Product_CatId']){
        echo "<script>alert('You already set this data.')</script>";
    }
    else{
        if($productImageChanged){
            $productTemImage = $_FILES['proImage']['tmp_name'];
            $extension = pathinfo($productImageName,PATHINFO_EXTENSION); // path_extension => show extension of the files like it's jpg,jpeg,webp,and so on.
            $filePath = 'img/products/'.$productImageName;
            if($extension == 'jpg' || $extension == 'webp' || $extension == 'png' || $extension == 'png' || $extension == 'jpeg'){
                if(move_uploaded_file($productTemImage,$filePath)){
                    $query = $run->prepare('update products set Product_Name= :pn, Product_Price= :ppric, Product_Quantity= :pquan, Product_Description= :pdesc, Product_Image= :pImg, Product_CatId= :pcatId WHERE Product_Id = :proId');
                    $query->bindParam('pn',$productName);
                    $query->bindParam('ppric',$productPrice);
                    $query->bindParam('pquan',$productQuantity);
                    $query->bindParam('pdesc',$productDesc);
                    $query->bindParam('pImg',$productImageName);
                    $query->bindParam('pcatId',$productCateId);
                    $query->bindParam('proId',$productId);
                    $query->execute();
                    echo '<script>alert("Product Updated into Your File.")</script>';
                }
            }
            else{
                echo '<script>alert("Only jpg, png, webp, or jpeg formats are allowed.")</script>';
            }
        }
        else{
            $query = $run->prepare('update products set Product_Name= :pn, Product_Price= :ppric, Product_Quantity= :pquan, Product_Description= :pdesc, Product_CatId= :pcateId WHERE Product_Id = :proId');
                $query->bindParam('pn',$productName);
                $query->bindParam('ppric',$productPrice);
                $query->bindParam('pquan',$productQuantity);
                $query->bindParam('pdesc',$productDesc);
                $query->bindParam('pcateId',$productCateId);
                $query->bindParam('proId',$productId);
                $query->execute();
            echo '<script>alert("Successfully Updated Your File.")</script>';
        }
    }
    

}



// DELETE PRODUCT 

if(isset($_GET['proCateDelid'])){
    $productId = $_GET['proCateDelid'];
    $query=$run->prepare('delete from products where Product_Id = :proId');
    $query->bindParam('proId',$productId);
    $query->execute();
    echo "<script>alert('Product deleted Successfully.');
    location.assign('product.php');
    </script>";
}

// -----------------------------------------------------------------

// Admin Profile;-


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
            $filePath = 'img/User/'.$Img;
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








<!-- FILES  -->

<!-- $_FILES['userfile']['tmp_name']
The temporary filename of the file in which the uploaded file was stored on the server.

$_FILES['userfile']['error'] -->


<!-- $_FILES['userfile']['name']
The original name of the file on the client machine. -->



<!-- PATH  -->

<!-- pathinfo — Returns information about a file path
pathinfo(string $path, int $flags = PATHINFO_ALL): array|string;
path
The path to be parsed.

flags
If present, specifies a specific element to be returned; one of PATHINFO_DIRNAME, PATHINFO_BASENAME, PATHINFO_EXTENSION or PATHINFO_FILENAME.

If flags is not specified, returns all available elements. -->
