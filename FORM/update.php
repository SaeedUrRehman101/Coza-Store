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

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query=$run->prepare("select * from stddetail where id = :stdid");
    $query->bindParam('stdid',$id);
    $query->execute();
    $Data=$query->fetch(PDO::FETCH_ASSOC);
}
?>


<body>
    <h1 class="text-center mt-2">Update Login Panel</h1>
    <div class="container mt-4">
        <form method="post" action="">
            <input type="hidden" name="stdid" value="<?php echo $Data['id'] ?>">
            <div style="margin: 0 10% 0 30%;">
                <div class="mb-3">
                    <label for="" class="form-label pe-3">Student Name</label>
                    <input type="text" value="<?php echo $Data['student_Name'] ?>" class="form-control w-75" name="stdName" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Email</label>
                    <input type="email" value="<?php echo $Data['Email'] ?>" class="form-control w-75" name="email" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Phone Number</label>
                    <input type="number" value="<?php echo $Data['Phone_Number'] ?>" class="form-control w-75" name="phone" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Course</label>
                    <input type="text" value="<?php echo $Data['Cousre'] ?>" class="form-control w-75" name="course" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Admission Fees</label>
                    <input type="number" value="<?php echo $Data['Admission_Fees'] ?>" class="form-control w-75" name="admissionfees" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Monthly Fees</label>
                    <input type="number" value="<?php echo $Data['Monthly_fees'] ?>" class="form-control w-75" name="monthlyfees" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label pe-3">Slots</label>
                    <input type="text" value="<?php echo $Data['slots'] ?>" class="form-control w-75" name="slots" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <legend class="col-form-label col-sm-2 pt-0">Days</legend>

                <div class="btn-group" role="group" data-bs-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input type="checkbox" value="<?php echo $Data['Admission_Fees'] ?>" class="me-2" name="days" id="" checked autocomplete="off" />
                        Monday
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" value="<?php echo $Data['Days'] ?>" class="me-2" name="days" id="" autocomplete="off" />
                        Tuesday
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" value="<?php echo $Data['Days'] ?>" class="me-2" name="days" id="" autocomplete="off" />
                        Wednesday
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" value="<?php echo $Data['Days'] ?>" class="me-2" name="days" id="" autocomplete="off" />
                        Thursday
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" value="<?php echo $Data['Days'] ?>" class="me-2" name="days" id="" autocomplete="off" />
                        Friday
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" value="<?php echo $Data['Days'] ?>" class="me-2" name="days" id="" autocomplete="off" />
                        Saturday
                    </label>
                </div>


                <div class="mt-2">
                    <button type="submit" name="updateData" id="" class="btn btn-primary w-75">
                        Update
                    </button>
                </div>

            </div>


        </form>
    </div>

<?php
if(isset($_POST['updateData'])){

    $id=$_POST['stdid'];
    $name=$_POST['stdName'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $course=$_POST['course'];
    $admission=$_POST['admissionfees'];
    $monthlyfee=$_POST['monthlyfees'];
    $slots=$_POST['slots'];
    if(isset($_POST['days'])){
        if(is_array($_POST['days'])){
            $days=implode(',',$_POST['days']);
        }
        else{
            $days=$_POST['days'];
        }
    }

    $query=$run->prepare("update stddetail set student_Name = :nm , Email = :em , Phone_Number = :pn , Cousre = :cur ,Admission_Fees = :adfe,Monthly_fees = :mtfe ,Days = :dys, slots = :sl where id= :id");
    $query->bindParam('id',$id);
    $query->bindParam('nm',$name);
    $query->bindParam('em',$email);
    $query->bindParam('pn',$phone);
    $query->bindParam('cur',$course);
    $query->bindParam('adfe',$admission);
    $query->bindParam('mtfe',$monthlyfee);
    $query->bindParam('dys',$days);
    $query->bindParam('sl',$slots);
    $query->execute();
      echo "<script>alert('data update');
      location.assign('table.php')
      </script>";
}
?>



</body>

</html>