<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1><?php
$name = 'saeed';
// if(is_string($name) && $name !== ''){
//     echo "Variable is avaliable";
// }
// else{
//     echo "Variable is not avaliable";
// }

if(!$name){
    echo 'Variable is not avaliable';
}
else{
    echo "Variable value is present";
}




?></h1>

</body>
</html>