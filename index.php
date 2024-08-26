<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        
    <!-- <label for="">Starting Number</label>
    <input class="num1" type="number">

    <label for="">Ending Number</label>
    <input class="num2" type="number">

    <button class="btn">Click</button> -->
    <?php 

    for($i=1;$i<=10;$i++){
        
        if($i%5==0){
            ?>
            <p><?php echo $i ?> FizzBuzz</p>
            <?php
        }
        else if($i%2==0){
            ?>
            <p><?php echo $i ?>Fizz</p>
            <?php
        }
        else{
            ?>
            <p><?php echo $i ?>Buzz</p>
                <?php
        }
    }
    ?>

    </body>



</html>
