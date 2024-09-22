<?php
include('connection.php')
?>

<?php

$id= 5;
$query=$run->prepare('select * from practice_mysql where id > :id');
$query->bindParam('id',$id);
$query->execute();
$result=$query->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $values){
    echo "{$values['id']} ==> {$values['Student_Name']} ==> {$values['Batch_code']} ==> {$values['Email']} <br>";
}

?>