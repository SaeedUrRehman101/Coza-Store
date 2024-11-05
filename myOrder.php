<?php
include('components/header.php');
$query = $run->prepare('select * from orders where user_Id = :uId');
$query->bindParam('uId',$_SESSION['Id']);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$item =1;
?>
<div class="bg-secondary-subtle m-t-100 p-b-140">
    <div class="container">
        <div class="row p-t-20">
            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                <?php
                if(isset($_SESSION['Name']) && $_SESSION['UserRole'] == "Admin"){
                    $Orders = $run->query('select * from orders Order by Order_Time desc');
                    $Orders->execute();
                    $allOrdersresult = $Orders->fetchAll(PDO::FETCH_ASSOC);
                    if($allOrdersresult){
                        ?>
                        <h2 class="mtext-110 cl2 bor3 trans-04 m-r-32 m-tb-5">Order Details:</h2>
                        <?php
                        foreach($allOrdersresult as $orders){
                            $orderDate = $orders['order_Date'];
                            $nextDate = date("D, M d, Y", strtotime($orderDate . ' +5 days'));
                            ?>
                            <div class="bor10 p-lr-20 m-t-30 p-t-10 p-b-40 m-r-40 m-lr-0-xl p-lr-15-sm rounded-3 bg-white myOrder">
                                <h4 class="stext-106 cl2 bor3 trans-04 m-r-32 m-tb-5 border-bottom p-b-8 m-b-20">Package 1 of <?php echo $item++ ?></h4>
                                <div class="wrap-table-shopping-cart">
                                    <table class="table-shopping-cart">
                                        <tr class="table_head">
                                                            <th class="column-5 text-center">Product Image</th>
                                                            <th class="column-4 text-center">Product Name</th>
                                                            <th class="column-4 text-center">Quantity</th>
                                                            <th class="column-3 text-center">Price</th>
                                                            <th class="column-5 text-center">Address</th>
                                                            <th class="column-5 text-center">Order Date</th>
                                                            <th class="column-5 text-center">Recieving Date</th>
                                                            <th class="column-5 text-center">Remove</th>
                                        </tr>
                                        <tr class="table_row">
                                            <td class="column-3 text-center">
                                                <div class="how-itemcart1">
                                                    <img src="<?php echo $Pro_ImageAddress.$orders['product_Image'] ?>" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-3 text-center stext-110 cl2"><?php echo $orders['product_Name'] ?></td>
                                            <td class="column-3 text-center stext-110 cl2"><?php echo $orders['product_Quantity'] ?></td>
                                            <td class="column-3 text-center stext-110 cl2">$. <?php echo $orders['product_Price'] ?></td>
                                            <td class="column-3 text-center stext-110 cl2"><?php echo $orders['user_Address'] ?></td>
                                            <td class="column-3 text-center stext-110 cl2"> <?php echo $orders['order_Date'] ?></td>
                                            <td class="column-3 text-center stext-110 cl2"> <?php echo $nextDate; ?></td>
                                            <td class="column-5"><a class="flex-c-m stext-109 cl0 size-116 bg3 bor2 hov-btn3 p-lr-15 trans-04 pointer text-center" href="?delOrder=<?php echo $orders['Order_Id'] ?>">Cancel Order</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    else{
                        ?>
                        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                            <div class='container col-sm-2 col-md-5 col-lg-10 isotope-item'>
                                <div class='stext-114 text-capitalize p-t-30 p-b-40 col-sm-5 col-lg-10 text-center'>No Orders found...</div>
                                <div class='search-error'>
                                    <img src='images/light.png' class='col-sm-2 col-md-10 p-l-50' alt='IMG-PRODUCT'>;
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                }
                ?>
                <?php
                if($_SESSION['UserRole'] == 'User'){
                    if($result){
                        ?>
                        <h2 class="mtext-110 cl2 bor3 trans-04 m-r-32 m-tb-5">Order Details:</h2>
                        <?php
                            foreach($result as $Orders){
                                $orderDate = $Orders['order_Date'];
                                $nextDate = date("D, M d, Y", strtotime($orderDate . ' +5 days'));
                        ?>
                                <div class="bor10 p-lr-20 m-t-30 p-t-10 p-b-40 m-r-40 m-lr-0-xl p-lr-15-sm rounded-3 bg-white myOrder">
                                    <h4 class="stext-106 cl2 bor3 trans-04 m-r-32 m-tb-5 border-bottom p-b-8 m-b-20">Package 1 of <?php echo $item++ ?></h4>
                                    <div class="wrap-table-shopping-cart">
                                        <table class="table-shopping-cart">
                                            <tr class="table_head">
                                                                <th class="column-5 text-center">Product Image</th>
                                                                <th class="column-4 text-center">Product Name</th>
                                                                <th class="column-4 text-center">Quantity</th>
                                                                <th class="column-3 text-center">Price</th>
                                                                <th class="column-5 text-center">Address</th>
                                                                <th class="column-5 text-center">Order Date</th>
                                                                <th class="column-5 text-center">Recieving Date</th>
                                                                <th class="column-5 text-center">Remove</th>
                                            </tr>
                                            <tr class="table_row">
                                                <td class="column-3 text-center">
                                                    <div class="how-itemcart1">
                                                        <img src="<?php echo $Pro_ImageAddress.$Orders['product_Image'] ?>" alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-3 text-center stext-110 cl2"><?php echo $Orders['product_Name'] ?></td>
                                                <td class="column-3 text-center stext-110 cl2"><?php echo $Orders['product_Quantity'] ?></td>
                                                <td class="column-3 text-center stext-110 cl2">$. <?php echo $Orders['product_Price'] ?></td>
                                                <td class="column-3 text-center stext-110 cl2"><?php echo $Orders['user_Address'] ?></td>
                                                <td class="column-3 text-center stext-110 cl2"> <?php echo $Orders['order_Date'] ?></td>
                                                <td class="column-3 text-center stext-110 cl2"> <?php echo $nextDate; ?></td>
                                                <td class="column-5"><a class="flex-c-m stext-109 cl0 size-116 bg3 bor2 hov-btn3 p-lr-15 trans-04 pointer text-center" href="?delOrder=<?php echo $Orders['Order_Id'] ?>">Cancel Order</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <?php
                            }
                    }
                    else{
                        ?>
                        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                            <div class='container col-sm-2 col-md-5 col-lg-10 isotope-item'>
                                <div class='stext-114 text-capitalize p-t-30 p-b-40 col-sm-5 col-lg-10 text-center'>No Orders found...</div>
                                <div class='search-error'>
                                    <img src='images/light.png' class='col-sm-2 col-md-10 p-l-50' alt='IMG-PRODUCT'>;
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include('components/footer.php');
?>