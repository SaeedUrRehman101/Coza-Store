<?php
include ('connection.php');
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

<body class="bg-secondary text-light">

    <?php
// $sql = $run->query("Select * from product");
// $sql = $run->query("Select * from product where Price between 4000 and 100000 and pro_status !='selling'");
// $row = $sql->fetchAll(PDO::FETCH_ASSOC);
// $row = $sql->fetchAll(PDO::FETCH_OBJ);
// $row = $sql->fetchAll(PDO::FETCH_NUM);
// $row = $sql->fetch();
// foreach($row as $value){
//     echo "{$value['id']} - {$value['name']} - {$value['Price']} - {$value['Qunatity']} - {$value['pro_status']} <br>"; // for Associative array
//     // echo "<pre>";
//     // print_r($row);
//     // echo "</pre>";
// }



// for NUM numaric array or for index array

// $numArray = $sql->fetchAll(PDO::FETCH_NUM);
// foreach($numArray as $value){
//     echo "{$value[0]} - {$value[1]} - {$value[2]} - {$value[4]} - {$value[5]} <br>";
// }



// for fetch object method

// $object =$sql->fetchAll(PDO::FETCH_OBJ);
// foreach($object as $values){
//     echo " * {$values->id} ==> {$values->name} ==> {$values->Price} ==> {$values->pro_status} <br>";
// }


// ----------------------------------------------------------------


// COUNT FUNCTION
// $checkVal = $sql->fetchAll(PDO::FETCH_ASSOC);

// if(count($checkVal)){
//    foreach($checkVal as $values){
//     echo " * {$values['id']}  ==> {$values['name']} ==> {$values['Price']} ==> {$values['pro_status']} <br>";
//    }
// }



// ------------------------------------------------------

// PREPARE 

?>


<div class="container">
        <table class="table table-primary">
            <thead>
                <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Product Status</th>
                </tr>

                <tbody>



<?php


$name = '%Infinix%';
$status = "best-selling";

$sql = $run->prepare('Select * from product where name like :name And pro_status = :status limit 5');
$sql->bindParam(':name',$name);
$sql->bindParam(':status',$status);
$sql->execute();

$result = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $values){

    ?>



<tr class="text-center">
    <td><?php echo $values['id'] ?></td>
    <td><?php echo $values['name'] ?></td>
    <td><?php echo $values['Price'] ?></td>
    <td><?php echo $values['pro_status'] ?></td>
</tr>


<?php


    // echo "{$values['id']} ==> {$values['name']} ==> {$values['pro_status']} <br>";
};

?>

</tbody>
</thead>
        </table>
    </div>
</body>

</html>