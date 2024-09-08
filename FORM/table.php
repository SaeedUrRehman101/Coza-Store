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

    <div class="container">
        <div class="table-responsive text-center mt-4">
            <table class="table table-primary">
                <thead>
                    <tr>
                    <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Course</th>
                        <th scope="col">Admission Fees</th>
                        <th scope="col">Monthly Fees</th>
                        <th scope="col">Days</th>
                        <th scope="col">Slots</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql=$run->query('select * from stddetail');
                    $result=$sql->fetchAll(PDO::FETCH_ASSOC);

                    foreach($result as $values){

                        ?>

                    <tr class="">
                        <td scope="row"><?php echo $values['id'] ?></td>
                        <td><?php echo $values['student_Name'] ?></td>
                        <td><?php echo $values['Email'] ?></td>
                        <td><?php echo $values['Phone_Number'] ?></td>
                        <td><?php echo $values['Cousre'] ?></td>
                        <td><?php echo $values['Admission_Fees'] ?></td>
                        <td><?php echo $values['Monthly_fees'] ?></td>
                        <td><?php echo $values['Days'] ?></td>
                        <td><?php echo $values['slots'] ?></td>
                    </tr>




                        <?php

                    }

                    ?>

                    
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>