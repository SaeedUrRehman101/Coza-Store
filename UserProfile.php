<?php
include("components/header.php");
if($_SESSION['UserRole']!='User'){
    echo '<script>location.assign("index.php");</script>';
}
?>

<!-- Form Start -->
<div class="container p-t-100 px-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded p-4 mb-4">
            <h6 class="mb-4">My Profile</h6>
            <div class="list-group-item rounded-2 bg-light d-flex align-items-center">
                <div class="position-relative">
                    <?php
                    if($_SESSION['User_Img'] == "Null"){
                        ?>
                        <h1 class="bg-info rounded-circle d-flex justify-content-center align-items-center" style="width : 70px !important; height : 70px !important;">
                            <?php
                            $query = explode($_SESSION['Name'][0],$_SESSION['Name']);
                            echo $_SESSION['Name'][0];
                            ?>
                        </h1>
                        <?php
                    }
                    else{
                        ?>
                        <img class="rounded-circle" src="<?php echo $userImage_Address.$_SESSION["User_Img"] ?>" alt="" style="width: 80px; height: 80px;">
                        <?php
                    }
                    ?>
                </div>
                <div class="ms-3">
                    <h5 class="mb-0 text-dark">
                        <?php echo $_SESSION['Name'] ?>
                    </h5>
                    <?php
                    if($_SESSION['User_Bio'] == "Null"){
                        ?>
                        <span class="text-secondary">Prdouct Designer</span>
                        <?php
                    }
                    else{
                        ?>
                        <span class="text-secondary"><?php echo $_SESSION['User_Bio'] ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="bg-light rounded p-4">
            <div class="d-flex col-lg-12 justify-content-end mt-3">
                <button type="button" name="" class="btn btn-bg-secondary-subtle me-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $_SESSION['Id'] ?>"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</button>
            </div>
          <div class="rounded-2 bg-light d-flex flex-column">
                <h6 class="mb-4">Personal Information</h6>
                <div class="row">
                    <div class="col-lg-10 d-flex justify-content-between ms-4 pe-4 mb-4 border border-secondary-subtle rounded-2 p-2 ps-3">
                        <span class='text-secondary fw-normal'>First Name</span>
                        <?php
                            function separateName($fullName) {
                                $nameParts = explode(' ', $fullName);
                                // <------------ --------------->
                                // Just for practice
                                // $nameParts = explode($fullName[0], $fullName);
                                // print_r($fullName[0]); //A 
                                // <------------ --------------->
                                $first_Name = $nameParts[0];
                                $last_Name = implode(' ',array_slice($nameParts,1));
                                // print_r($last_Name);
                                return[
                                    'firstName' => $first_Name,
                                    'lastName' => $last_Name
                                ];

                            }
                            $separatedNames = separateName($_SESSION['Name']);

                            ?>
                            <span class='text-secondary fw-bolder'><?php echo $separatedNames['firstName'] ?></span>
                    </div>
                    <div class="col-lg-10 d-flex justify-content-between ms-4 pe-4 mb-4 border border-secondary-subtle rounded-2 p-2 ps-3">
                        <span class='text-secondary fw-normal'>Last Name</span>
                        <span class='text-secondary fw-bolder'><?php echo $separatedNames['lastName'] ?></span>
                    </div>
                    <div class="col-lg-10 d-flex justify-content-between ms-4 pe-4 mb-4 border border-secondary-subtle rounded-2 p-2 ps-3">
                        <span class='text-secondary fw-normal'>Email Adress</span>
                        <span class='text-secondary fw-bolder'><?php echo $_SESSION['Email'] ?></span>
                    </div>
                    <div class="col-lg-10 d-flex justify-content-between ms-4 pe-4 mb-4 border border-secondary-subtle rounded-2 p-2 ps-3">
                        <span class='text-secondary fw-normal'>Phone Number</span>
                        <span class='text-secondary fw-bolder'><?php echo $_SESSION['Phone'] ?></span>
                    </div>
                    <div class="col-lg-10 ms-4 mb-4 border border-secondary-subtle rounded-2 p-2 ps-3">
                        <h6 class="text-secondary fw-normal">Bio</h6>
                        <figure>
                            <blockquote class="blockquote">
                                <p><?php
                                if($_SESSION['User_Bio'] == "Null"){
                                    echo "<span class='text-secondary fw-normal fs-5'>Add a Bio</span>";
                                }
                                else{
                                    ?>
                                    <span class='text-secondary fw-normal fs-5'><?php echo $_SESSION['User_Bio'] ?></span>
                                    <?php
                                }
                                ?></p>
                            </blockquote>
                        </figure>
                    </div>
                    <div class="col-lg-10 ms-4 pe-4 mb-4 border border-secondary-subtle rounded-2 p-2 ps-3">
                        <!-- <span class='text-secondary fw-normal'><?php //echo $separatedNames['firstName'] ?> Image</span> -->
                        <h6 class="mb-4 text-secondary fw-normal"><?php echo $separatedNames['firstName'] ?> Image</h6>
                        <?php
                        if($_SESSION['User_Img'] == "Null"){
                            ?>
                             <div class="mb-3">
                                <label for="formFile" class="form-label">Add Image</label>
                                <input class="form-control" type="file" id="formFile" disabled>
                            </div>
                            <?php
                        }
                        else{
                            ?>

                            <img src="<?php echo $userImage_Address.$_SESSION['User_Img'] ?>" width="80" alt="">
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Form End -->

<!-- Modal -->
 <?php
 $query = $run->prepare('select * from signin where userId = :uid');
 $query->bindParam('uid',$_SESSION['Id']);
 $query->execute();
 $user = $query->fetch(PDO::FETCH_ASSOC);
//  print_r($user['User_Name']);
    ?>

<div class="modal fade z-index" id="exampleModal<?php echo $user['userId'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="mt-2" enctype="multipart/form-data">
                    <input type="hidden" name="userId" value="<?php echo $user["userId"] ?>">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control border border-0 border-bottom" id="name" placeholder="Your Name" value="<?php echo $user['User_Name'] ?>">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="phone" class="form-control border border-0 border-bottom" id="Phone" placeholder="Phone Number" value="<?php echo $user['User_Phone'] ?>">
                        <label for="Phone">Phone Number</label>
                    </div>
                    <div class="form-floating mb-3 ">
                        <input type="email" name="email" class="form-control border border-0 border-bottom" id="floatingInput" placeholder="name@example.com" value="<?php echo $user['User_Email'] ?>">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control border border-0 border-bottom" id="floatingPassword" placeholder="Password" value="<?php echo $user['User_Password'] ?>">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label"><?php echo $separatedNames['firstName'] ?> Image</label>
                        <input class="form-control" name="img" type="file" id="formFile">
                        <?php
                        if($_SESSION['User_Img'] == "Null"){
                        ?>
                    <h3 class="bg-info rounded-circle d-flex justify-content-center align-items-center mt-2" style="width : 40px !important; height : 40px !important;">
                        <?php
                        $query = explode($_SESSION['Name'][0],$_SESSION['Name']);
                        echo $_SESSION['Name'][0];
                        ?>
                    </h3>
                    <?php
                        }
                        else{
                        ?>
                        <img class="rounded-circle" src="<?php echo $userImage_Address.$_SESSION["User_Img"] ?>" alt="" style="width: 80px; height: 80px;">
                        <?php
                        }
                    ?>
                        <!-- <img src="<?php //echo $user_ImageAddress.$_SESSION['User_Img'] ?>" width="80" alt=""> -->
                    </div>
                    <div class="form-floating">
                            <?php
                            if($_SESSION['User_Bio'] == "Null"){
                            ?>
                            <textarea name="bio" class="form-control" placeholder="Add Bio" id="floatingTextarea" style="height: 150px;"></textarea>
                            <?php
                            }
                            else{
                                ?>
                                <textarea name="bio" class="form-control" placeholder="Add Bio" id="floatingTextarea" style="height: 150px;"><?php echo $_SESSION['User_Bio'] ?></textarea>
                                <?php
                            }
                            ?>
                        <label for="floatingTextarea">Bio</label>
                    </div>
                    <button type="submit" name="updateUser" class="btn btn-primary mt-4">Update</button>
                    <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include('components/footer.php');
?>