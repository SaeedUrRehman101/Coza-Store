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

<body>

    <?php
$sql = $run->query("Select * from product");
// $sql = $run->query("Select * from product where Price between 4000 and 100000 and pro_status !='selling'");
$row = $sql->fetchAll(PDO::FETCH_ASSOC);
// $row = $sql->fetchAll(PDO::FETCH_OBJ);
// $row = $sql->fetchAll(PDO::FETCH_NUM);
// $row = $sql->fetch();
foreach($row as $value){
    echo "{$value['id']} - {$value['name']} - {$value['Price']} - {$value['Qunatity']} - {$value['pro_status']} <br>"; // for Associative array
    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";
}



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

?>
</body>

</html>