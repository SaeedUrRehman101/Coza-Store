<?php
include ("connection.php");
?>

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
    <div class="container">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr class="text-center">
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">Price</th>
                        <th scope="2">Product Status</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                $sql = $run->query('select * from product');
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach($result as $values){
                    ?>

                    <tr class="text-center">
                        <td scope="row"><?php echo $values['id'] ?></td>
                        <td><?php echo $values['name'] ?></td>
                        <td><?php echo $values['Price'] ?></td>
                        <td><?php echo $values['pro_status'] ?></td>
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
