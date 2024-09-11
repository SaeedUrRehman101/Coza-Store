<?php
include ("connection.php");
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
    <h1 class="text-center mt-2">Student Login Panel</h1>
    <div class="container mt-4">
        <form method="post" action="">
            <div style="margin: 0 10% 0 30%;">
                <div class="mb-3">
                    <label for="" class="form-label pe-3">Student Name</label>
                    <input type="text" class="form-control w-75" name="stdName" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Email</label>
                    <input type="email" class="form-control w-75" name="email" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Phone Number</label>
                    <input type="number" class="form-control w-75" name="phone" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Course</label>
                    <input type="text" class="form-control w-75" name="course" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Admission Fees</label>
                    <input type="number" class="form-control w-75" name="admissionfees" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Monthly Fees</label>
                    <input type="number" class="form-control w-75" name="monthlyfees" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Slots</label>
                    <input type="text" class="form-control w-75" name="slots" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <legend class="col-form-label col-sm-2 pt-0">Days</legend>

                <div class="btn-group" role="group" data-bs-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input type="checkbox" value="monday" class="me-2" name="days" id="" checked autocomplete="off" />
                        Monday
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" value="tuesday" class="me-2" name="days" id="" autocomplete="off" />
                        Tuesday
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" value="wednesday" class="me-2" name="days" id="" autocomplete="off" />
                        Wednesday
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" value="thursday" class="me-2" name="days" id="" autocomplete="off" />
                        Thursday
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" value="friday" class="me-2" name="days" id="" autocomplete="off" />
                        Friday
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" value="saturday" class="me-2" name="days" id="" autocomplete="off" />
                        Saturday
                    </label>
                </div>


                <div class="mt-2">
                    <button type="submit" name="userDetail" id="" class="btn btn-primary w-75">
                        Button
                    </button>
                </div>

            </div>


        </form>
    </div>



    <?php
    if(isset($_POST['userDetail'])){
        // echo "<script>alert('Data submited')</script>";

        $name=$_POST['stdName'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $course=$_POST['course'];
        $admission=$_POST['admissionfees'];
        $monthlyfee=$_POST['monthlyfees'];
        $slots=$_POST['slots'];
        if (isset($_POST['days'])) {
            if (is_array($_POST['days'])) {
                $days = implode(", ", $_POST['days']); // Convert array to comma-separated string
            } else {
                $days = $_POST['days']; // If only one checkbox is selected, it will be a string
            }
        }
        //  else {
        //     $days = ''; // Default value if no checkbox is selected
        // }
        

        // if(empty($name) || empty($email) || empty($phone) || empty($course) || empty($admission) || empty($monthlyfee) || empty($slots) || empty($days)){
        //      echo "<script>alert('Please fill the input field')</script>";
        // }
        if((!$name) || (!$email) || (!$phone) || (!$course) || (!$admission) || (!$monthlyfee) || (!$slots) || (!$days)){
            echo "<script>alert('Please fill the input field')</script>";
       }
        else{
            $form=$run->prepare('insert into stddetail(student_Name,Email,Phone_Number,Cousre,Admission_Fees,Monthly_fees,Days,slots)values(:nm,:em,:ph,:cur,:adfe,:mtfe,:dys,:sl)');

            $form->bindParam('nm',$name);
            $form->bindParam('em',$email);
            $form->bindParam('ph',$phone);
            $form->bindParam('cur',$course);
            $form->bindParam('adfe',$admission);
            $form->bindParam('mtfe',$monthlyfee);
            $form->bindParam('dys',$days);
            $form->bindParam('sl',$slots);
    
            $form->execute();
            echo "<script>alert('Data submited');
            location.assign('table.php');
            </script>";
            // echo "<script>location.assign("cart.html");</script>";
        }

       



    }
    ?>
    



</body>

</html>