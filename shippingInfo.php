<?php
include('components/header.php');
$order = $run->prepare('select * from orders where user_Id = :uId');
$order->bindParam('uId',$_SESSION['Id']);
$order->execute();
$orderInfo = $order->fetch(PDO::FETCH_ASSOC);
$invoice = $run->prepare('select * from invoice where user_Id = :uId');
$invoice->bindParam('uId',$_SESSION['Id']);
$invoice->execute();
$invoiceInfo = $invoice->fetch(PDO::FETCH_ASSOC);
$item=1;
?>
<div class="bg-secondary-subtle m-t-100 p-b-140">
    <div class="container">
        <div class="row p-t-20">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="bor10 p-lr-20 p-t-10 p-b-40 m-r-40 m-lr-0-xl p-lr-15-sm rounded-3 bg-white">
                    <h4 class="stext-106 cl2 bor3 trans-04 m-r-32 m-tb-5">Shipping & Billing:</h4>
                    <div class="flex-w flex-t bor12 p-t-13 p-b-13 p-l-20">
							<div class="size-208">
								<span class="stext-110 cl2">
									<?php echo $orderInfo['user_Name'] ?>
								</span>
							</div>

							<div class="size-209">
								<span class="stext-110 cl2">
                                    <?php echo $orderInfo['user_Phone'] ?>
								</span>
							</div>
					</div>
                    <div class="flex-w flex-t bor12 p-t-13 p-b-13 p-l-20">
							<div class="size-208">
								<span class="stext-110 cl2">
									Address
								</span>
							</div>

							<div class="size-209">
								<span class="stext-110 cl2">
                                    <?php echo $orderInfo['user_Address'] ?>
								</span>
							</div>
					</div>
                </div>
                <?php
                    $query = $run->prepare('select * from orders where user_Id = :uId');
                    $query->bindParam('uId',$_SESSION['Id']);
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $Order){
                        ?>
                        <div class="bor10 p-lr-20 m-t-30 p-t-10 p-b-40 m-r-40 m-lr-0-xl p-lr-15-sm rounded-3 bg-white">
                            <h4 class="stext-106 cl2 bor3 trans-04 m-r-32 m-tb-5">Package 1 of <?php echo $item++ ?></h4>
                            <table class="table-shopping-cart">
                                <tr class="table_row">
                                    <td class="column-3 text-center">
                                        <div class="how-itemcart1">
                                            <img src="<?php echo $Pro_ImageAddress.$Order['product_Image'] ?>" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-3 text-center"><span class="stext-110 cl2"><?php echo $Order['product_Name'] ?></span></td>
                                    <td class="column-3 text-center">Qty: <span class="stext-110 cl2"><?php echo $Order['product_Quantity'] ?></span></td>
                                    <td class="column-3 text-center">Price: <span class="stext-110 cl2">$. <?php echo $Order['product_Price'] ?></span></td>

                                </tr>
                            </table>
                            
                        </div>
                        <?php
                    }
                ?>
            </div>
			<div class="col-sm-12 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-20 p-t-10 p-b-40 m-r-40 m-lr-0-xl p-lr-15-sm rounded-3 bg-white">
                    <h4 class="stext-106 bor3 trans-04 m-r-32 m-tb-5 cl2">Confirmation Code:</h4>
                    <form method="dialog">
                        
                            <div class="bor8 bg0 m-b-12 m-t-20 m-l-40 m-r-40">
                                <input onKeyPress="if(this.value.length==6) return false;" class="stext-111 cl8 plh3 size-111 p-lr-15" id="confirmCode" type="number" name="confirmCode" placeholder="Confirmation Code">
                            </div>
                            <small style="font-weight: 600; letter-spacing: .1vw" id="codeMessage" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"></small>
                        
                    </form>
                    <h4 class="stext-106 bor3 trans-04 m-r-32 m-tb-5 cl2 p-t-20">Order Summary:</h4>
                    <div class="flex-w flex-t p-t-13 p-b-13">
                        <div class="size-210">
                            <span class="stext-110 cl2">Total Items (<?php echo $invoiceInfo['totalItems'] ?> items)</span>
                        </div>

                        <div class="size-210 text-end">
                            <span class="stext-110 cl2">$. <?php echo number_format($invoiceInfo['totalAmount']) ?></span>
                        </div>
					</div>
                    <div class="flex-w flex-t p-t-13 bor12 p-b-13">
							<div class="size-210">
								<span class="stext-110 cl2">Delivery Fee</span>
							</div>

							<div class="size-210 text-end">
								<span class="stext-110 cl2">$. 0</span>
							</div>
					</div>
                    <div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-210">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-210 p-t-1 text-end">
								<span class="mtext-110 cl2">
									$. <?php echo number_format($invoiceInfo['totalAmount']) ?>
								</span>
							</div>
					</div>
                    <form method="post">
                    <button id="proceedButton" type="submit" name="proceedButton" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer confirmCodeBtn" disabled>Proceed to Checkout </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('components/footer.php');
?>