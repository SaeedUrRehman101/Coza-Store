<?php
include("components/header.php");
?>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-100 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<?php
				if(!isset($_SESSION['cart'])){
					?>
					<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class='container col-sm-2 col-md-5 col-lg-10 isotope-item'>
						<div class='stext-114 text-capitalize p-t-30 p-b-40 col-sm-5 col-lg-10 text-center'>No products found...</div>
						<div class='search-error'>
						<img src='images/light.png' class='col-sm-2 col-md-10 p-l-50' alt='IMG-PRODUCT'>;
						</div>
						</div>
					</div>
					<?php
				}
				if(count($_SESSION['cart']) === 0){
					?>
					<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
						<div class='container col-sm-2 col-md-5 col-lg-10 isotope-item'>
							<div class='stext-114 text-capitalize p-t-30 p-b-40 col-sm-5 col-lg-10 text-center'>No products found...</div>
							<div class='search-error'>
								<img src='images/light.png' class='col-sm-2 col-md-10 p-l-50' alt='IMG-PRODUCT'>;
							</div>
						</div>
					</div>
					<?php
				}
				else{
					?>
					<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
						<div class="m-l-25 m-r--38 m-lr-0-xl">
							<div class="wrap-table-shopping-cart">
								<table class="table-shopping-cart">
									<tr class="table_head">
										<th class="column-3 text-center">Id</th>
										<th class="column-1 text-center">Product</th>
										<th class="column-1 text-center">Product Name</th>
										<th class="column-3 text-center">Price</th>
										<th class="column-4 text-center">Quantity</th>
										<th class="column-5 text-center">Total</th>
										<th class="column-5 text-center">Remove Product</th>
									</tr>
									<?php
									if(isset($_SESSION['Name'])){
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $keys=> $values){
												$total = $values['proQuantity'] * $values['proPrice'];
												?>
												<tr class="table_row">
													<td class="column-3 text-center"><?php echo $values['proId'] ?></td>
													<td class="column-1 text-center">
														<div class="how-itemcart1">
															<img src="<?php echo $Pro_ImageAddress.$values['proImg'] ?>" alt="IMG">
														</div>
													</td>
													<td class="column-2 text-center"><?php echo $values['proName'] ?></td>
													<td class="column-3 text-center">$ <?php echo number_format($values['proPrice']) ?></td>
													<td class="column-4 text-center"><?php echo $values['proQuantity'] ?></td>
													<td class="column-5 text-center">$ <?php echo number_format($total) ?></td>
													<td class="column-5 text-center"><a href="?delCartId=<?php echo $values['proId'] ?>"><i class="fas fa-trash" style="color:red;"></i></a></td>
												</tr>
												<?php
											}
										}
									}
									?>
								</table>
							</div>

							<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
								<div class="flex-w flex-m m-r-20 m-tb-5">
									<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
										
									<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
										Apply coupon
									</div>
								</div>

								<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
									Update Cart
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									$<?php echo number_format($subTotal) ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									$<?php echo number_format($subTotal) ?>
								</span>
							</div>
						</div>

						<?php
						if(isset($_SESSION['cart'])){
							?>
							<a href="Order.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
							</a>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php
include("components/footer.php");
?>