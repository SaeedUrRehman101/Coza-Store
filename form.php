<?php
include("connection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <div class="container mt-4">
        <h1 class="text-center">Register Your Information</h1>
    </div>

    <div class="container mt-4">
        <form method="post" action="">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="" placeholder="Enter Your Full Name"
                    aria-describedby="fileHelpId" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="" placeholder="Enter Your Email Address"
                    aria-describedby="fileHelpId" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone" id="" placeholder="Enter Your Phoe Number"
                    aria-describedby="fileHelpId" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="" placeholder="Enter the Password"
                    aria-describedby="fileHelpId" />
            </div>

            <div class="container">
                <div class="d-grid gap-2">
                    <button type="submit" name="userDetail" id="" class="btn btn-primary">
                        Button
                    </button>
                </div>

            </div>

        </form>
    </div>

    <?php
    if(isset($_POST['userDetail'])){
        // echo "<script>alert('Your Data has been Submited..');</script>";
        $name=$_POST['name'];
        $email=$_POST['email'];
        // echo "Name: ". $name . "<br>";
        // echo "Email; ". $email; 
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $query=$run->prepare("insert into 9b(name,email,phone_number,password)values(:pn,:pe,:ph,:pp)");
        $query->bindParam('pn',$name);
        $query->bindParam('pe',$email);
        $query->bindParam('ph',$phone);
        $query->bindParam('pp',$password);
        $query->execute();
        echo "<script>alert('Data Insert')</script>";
    }
    // else{
    //     echo "Not any data is availiable";
    // }
    ?>



</body>

</html>