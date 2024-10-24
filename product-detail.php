<?php
include("components/header.php");
?>

	<?php
	if(isset($_GET['proId'])){
		$productId = $_GET['proId'];
		$query = $run->prepare('select p.*,c.id,c.Category_Name from Products p Inner Join Categories c on p.Product_CatId = c.id where p.Product_Id = :pid');
		$query->bindParam('pid',$productId);
		$query->execute();
		$Data = $query->fetch(PDO::FETCH_ASSOC);

	}
	?>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-100 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.php?cateId=<?php echo $Data['Product_CatId'] ?>" class="stext-109 cl8 hov-cl1 trans-04">
				<?php echo $Data["Category_Name"] ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
			<?php echo $Data["Product_Name"] ?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="<?php echo $Pro_ImageAddress.$Data['Product_Image'] ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo $Pro_ImageAddress.$Data['Product_Image'] ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $Pro_ImageAddress.$Data['Product_Image'] ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="<?php echo $Pro_ImageAddress.$Data['Product_Image'] ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo $Pro_ImageAddress.$Data['Product_Image'] ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $Pro_ImageAddress.$Data['Product_Image'] ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="<?php echo $Pro_ImageAddress.$Data['Product_Image'] ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo $Pro_ImageAddress.$Data['Product_Image'] ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $Pro_ImageAddress.$Data['Product_Image'] ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14 text-uppercase">
						<?php echo $Data['Product_Name'] ?>
						</h4>

						<span class="mtext-106 cl2">
							$<?php echo $Data['Product_Price'] ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
						<?php echo $Data['Product_Description'] ?>
						</p>
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Size S</option>
											<option>Size M</option>
											<option>Size L</option>
											<option>Size XL</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Red</option>
											<option>Blue</option>
											<option>White</option>
											<option>Grey</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<form method='post'>
								<input type="hidden" name="proId" value='<?php echo $Data['Product_Id'] ?>'>
								<input type="hidden" name="proName" value='<?php echo $Data['Product_Name'] ?>'>
								<input type="hidden" name="proImg" value='<?php echo $Data['Product_Image'] ?>'>
								<input type="hidden" name="proPrice" value='<?php echo $Data['Product_Price'] ?>'>
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="proQuantity" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<?php
										if(!isset($_SESSION['Name'])){
											?>
											<button type="button" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" data-bs-toggle="popover"  data-bs-html="true" title="Alert! <a class='cl1' href='SignIn.php'>LogIn</a>" data-bs-content="Please First Login to Your Account.">Add to cart</button>
											<?php
										}
										else{
											?>
											<button type='submit' name='addtoCart' class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
												Add to cart
											</button>
											<?php
										}
										?>
									</div>
								</div>
							</form>
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-40">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
							<?php echo $Data['Product_Description'] ?>
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

											<span class="stext-102 cl6 size-206">
												0.79 kg
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

											<span class="stext-102 cl6 size-206">
												110 x 33 x 100 cm
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												60% cotton
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												Black, Blue, Grey, Green, Red, White
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												XL, L, M, S
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<?php
										if(!isset($_SESSION['Name'])){
											$query = $run->prepare('select urev.*,sign.* from userreview urev inner join signin sign on urev.user_signId = sign.userId where review_ProId =:revProId ORDER BY review_Time DESC');
											$query->bindParam('revProId',$Data['Product_Id']);
											$query->execute();
											$result= $query->fetchAll(PDO::FETCH_ASSOC);
											foreach($result as $review){
												$starRating = $review['userRatings'];
												$ImageString = $review['user_Image'];
												$ImagesArray = explode(',', $ImageString);
												?>
												<div class="flex-w flex-t p-b-68">
													<div class="review_Date"><?php echo timeAgo($review['review_Time']) ?></div>
														<?php
														if($review['User_Image'] == "Null"){
															?>
															<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
															<h1 style="width : 70px !important; height : 70px !important; padding :5% 30%;background-color:rgb(206 206 206) !important;">
																<?php
																$query = explode($review['User_Name'][0],$review['User_Name']);
																echo strtoupper($review['User_Name'][0]);
																?>
															</h1>
															</div>
															<?php
														}
														else{
															?>
															<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
															<img src="<?php echo $userImage_Address.$review['User_Image'] ?>" alt="AVATAR">
															</div>
															<?php
														}
														?>
														<div class="size-207">
															<div class="flex-w flex-sb-m p-b-17">
																<span class="mtext-107 cl2 p-r-20 text-capitalize">
																	<?php echo $review['User_Name'] ?>
																</span>
																<span class="fs-18 cl11">
																<?php
																	for($i=1; $i<=5; $i++){
																		if($i<=$starRating){
																			echo '<i class="zmdi zmdi-star"></i>';
																		}
																		else{
																			echo '<i class="zmdi zmdi-star-outline"></i>';
																		}
																	}
																	?>
																</span>
															</div>
															<div class="size-207">
																<?php
																foreach($ImagesArray as $Images){
																	?>
																	<img class="reviewImg me-4" src="<?php echo $revImage_Address.$Images ?>" alt="AVATAR">
																	<?php
																}
																?>
															</div>
															<p class="stext-102 cl6">
															<?php echo $review['user_review'] ?>
															</p>
														</div>
													</div>
												<?php
											}
											?>
											<h1 class='mtext-101 cl3 m-r-16 text-center'>No Reviews Found..</h1>
											<!-- Add review -->
											<form class="w-full">
													<h5 class="mtext-108 cl2 p-b-7">Add a review</h5>
													<div class="flex-w flex-m p-t-20 p-b-23">
														<span class="stext-102 cl3 m-r-16">
															Your Rating
														</span>
														<span class="wrap-rating fs-18 cl11 pointer">
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<input class="dis-none" type="number" name="rating">
														</span>
													</div>
													<div class="row p-b-25">
														<div class="col-12 p-b-5">
															<label class="stext-102 cl3" for="review">Write your Product review</label>
															<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="userReview"></textarea>
														</div>
														<div class="col-12 p-b-5 mt-4">
															<div class="mb-3">
																<label for="formFileMultiple" class="form-label stext-102 cl3">Pictures speak louder than words</label>
																<input class="form-control stext-102 cl3" name='reviewImage' type="file" id="formFileMultiple" multiple>
															</div>
														</div>
													</div>

													<button type="button" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-html="true" title="Alert! <a class='cl1' href='SignIn.php'>LogIn</a>" data-bs-content="Please First LogIn to Your Account.">Write a Review</button>
												</form>
											<?php
										}
										?>
										<!-- Review -->
										<?php
										if(isset($_SESSION['Name'])){
											$query = $run->prepare('select urev.*,sign.* from userreview urev inner join signin sign on urev.user_signId = sign.userId where review_ProId =:rId ORDER BY review_Time DESC');
											// $query = $run->prepare('select * from userreview where review_ProId =:rId');
											$query->bindParam('rId',$Data['Product_Id']);
											$query->execute();
											$result = $query->fetchAll(PDO::FETCH_ASSOC);
											if($result){
												foreach($result as $review){
													$starRating = $review['userRatings'];
													$ImageString = $review['user_Image'];
													$imagesArray = explode(',', $ImageString);
													if($review['user_signId'] == $_SESSION['Id']){
														?>
														<div class="flex-w flex-t p-b-68">
														<div class="review_Date"><?php echo timeAgo($review['review_Time']) ?></div>
																<?php
																if($review['User_Image'] == "Null"){
																	?>
																	<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
																	<h1 style="width : 70px !important; height : 70px !important; padding :5% 30%;background-color:rgb(206 206 206) !important;">
																		<?php
																		$query = explode($review['User_Name'][0],$review['User_Name']);
																		echo strtoupper($review['User_Name'][0]);
																		?>
																	</h1>
																	</div>
																	<?php
																}
																else{
																	?>
																	<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
																	<img src="<?php echo $userImage_Address.$review['User_Image'] ?>" alt="AVATAR">
																	</div>
																	<?php
																}
																?>															
															<div class="size-207">
																<div class="flex-w flex-sb-m p-b-5">
																	<span class="mtext-107 cl2 p-r-20 text-capitalize">
																		<?php echo $review['User_Name'] ?>
																	</span>
																	<span class="fs-18 cl11">
																		<?php
																		 for ($i = 1; $i <= 5; $i++) {
																			if ($i <= $starRating) {
																				echo '<i class="zmdi zmdi-star"></i>'; // Full star
																			} else {
																				echo '<i class="zmdi zmdi-star-outline"></i>'; // Empty star
																			}
																		}
																		?>
																	</span>
																	<div class="d-flex justify-content-start reviewModal align-items-baseline w-25">
																		<div class="border rounded-3 w-100 h-100 options hidden">
																			<a href="#staticBackdrop<?php echo $review['review_Id'] ?>" class="border-dark-subtle h-50 w-100 d-flex justify-content-start align-items-center text-center ps-3" data-bs-toggle="modal"><i class="fa-regular fa-pen-to-square pe-2"></i> Edit</a>
																			<a class="border-dark-subtle w-100 d-flex h-50 justify-content-start align-items-center text-center ps-3" href="#delReview<?php echo $review['review_Id'] ?>" data-bs-toggle="modal">
																			<i class="fa-solid fa-trash pe-2"></i>Delete</a>
																		</div>
																		<div class="reviewEdit">
																			<button type="button" class="btn toggleOptions">
																				<i class="fa-solid fa-ellipsis-vertical"></i>
																			</button>
																		</div>
																	</div>

																</div>
																<div class="size-207">
																	<!-- <img class="reviewImg me-4" src="<?php //echo $revImage_Address.$imagesArray[1]?>" alt="AVATAR"> -->
																	<?php
																	foreach($imagesArray as $Images){
																		?>
																		<img class="reviewImg me-4" src="<?php echo $revImage_Address.$Images
																		 ?>" alt="AVATAR">
																		<?php
																	}
																	?>
																</div>
																<p class="stext-102 cl6">
																<?php echo $review['user_review'] ?>
																</p>
															</div>
														</div>
														<!--Update Review Modal -->
														<div class="modal fade" id="staticBackdrop<?php echo $review['review_Id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
																	<div class="modal-header">
																		<h1 class="modal-title fs-5" id="staticBackdropLabel">Update Your Review</h1>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																		<form class="w-full" method="post" enctype="multipart/form-data">
																			<input type="hidden" name="userId" value='<?php echo $_SESSION['Id'] ?>'>
																			<input type="hidden" name="proId" value="<?php echo $review['review_ProId'] ?>">
																			<input type="hidden" name="reviewId" value="<?php echo $review['review_Id'] ?>">
																			<h5 class="mtext-108 cl2 p-b-7">
																				Edit your review
																			</h5>
																			<div class="flex-w flex-m p-t-20 p-b-23">
																				<span class="stext-102 cl3 m-r-16">Your Rating</span>
																				<span class="wrap-rating fs-18 cl11 pointer" id="starRating">
																					<?php
																					for ($i = 1; $i <= 5; $i++) {
																						if ($i <= $starRating) {
																							echo '<i class="item-rating pointer zmdi zmdi-star"></i>'; // Full star
																						} else {
																							echo '<i class="item-rating pointer zmdi zmdi-star-outline"></i>'; // Empty star
																						}
																					}
																					?>
																				</span>
																				<!-- Hidden field to capture the star rating -->
																				<input type="hidden" class="starRatingValue" name="starRating" value="<?php echo $starRating; ?>">
																			</div>
																			<div class="row p-b-25">
																				<div class="col-12 p-b-5">
																					<label class="stext-102 cl3" for="review">Edit your Product review</label>
																					<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="userReview"><?php echo $review['user_review'] ?></textarea>
																				</div>
																				<div class="col-12 p-b-5 mt-4">
																					<div class="mb-3">
																						<label for="formFileMultiple" class="form-label stext-102 cl3">Pictures speak louder than words</label>
																						<input class="form-control stext-102 cl3" name='reviewImage[]' type="file" id="formFileMultiple" multiple>
																						<?php
																						if (is_array($imagesArray)) {
																							foreach ($imagesArray as $Images) {
																								?>
																								<img src="<?php echo $revImage_Address . $Images ?>" width="80" alt="">
																								<?php
																							}
																						} else {
																							echo "<p>No images available.</p>";
																						}
																						?>
																					</div>
																				</div>
																			</div>
																			<button type="submit" name="updReview" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
																				Update Review
																			</button>
																		</form>
																	</div>
																</div>
															</div>
														</div>

														<!--Delete Review Modal -->
														<div class="modal fade" id="delReview<?php echo $review['review_Id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
																<div class="modal-header">
																	<h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<!-- <div class="modal-body">
																</div> -->
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																	<form method="post">
																		<input type="hidden" name="delrevId" value="<?php echo $review['review_Id'] ?>">
																	<button type="submit" name="deletReview" class="btn btn-danger">Delete</button>
																	</form>
																</div>
																</div>
															</div>
														</div>
														<?php
													}
													else{
														?>
														<div class="flex-w flex-t p-b-68">
														<div class="review_Date"><?php echo timeAgo($review['review_Time']) ?></div>
															<?php
															if($review['User_Image'] == "Null"){
																?>
																<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
																<h1 style="width : 70px !important; height : 70px !important; padding :5% 30%;background-color:rgb(206 206 206) !important;">
																	<?php
																	$query = explode($review['User_Name'][0],$review['User_Name']);
																	echo strtoupper($review['User_Name'][0]);
																	?>
																</h1>
																</div>
																<?php
															}
															else{
																?>
																<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
																<img src="<?php echo $userImage_Address.$review['User_Image'] ?>" alt="AVATAR">
																</div>
																<?php
															}
															?>	
															<div class="size-207">
																<div class="flex-w flex-sb-m p-b-17">
																	<span class="mtext-107 cl2 p-r-20 text-capitalize">
																		<?php echo $review['User_Name'] ?>
																	</span>
																	<span class="fs-18 cl11">
																		<?php
																		 for ($i = 1; $i <= 5; $i++) {
																			if ($i <= $starRating) {
																				echo '<i class="zmdi zmdi-star"></i>'; // Full star
																			} else {
																				echo '<i class="zmdi zmdi-star-outline"></i>'; // Empty star
																			}
																		}
																		?>
																	</span>
																</div>
																<div class="size-207">
																	<?php
																	foreach($imagesArray as $Images){
																		?>
																	<img class="reviewImg me-4" src="<?php echo $revImage_Address.$Images ?>" alt="AVATAR">
																		<?php
																	}
																	?>
																</div>
																<p class="stext-102 cl6">
																<?php echo $review['user_review'] ?>
																</p>
															</div>
														</div>
														<?php
													}
												}
												?>
												<!-- Add review -->
												<form class="w-full" method="post" enctype="multipart/form-data">
													<input type="hidden" name="userId" value='<?php echo $_SESSION['Id'] ?>'>
													<input type="hidden" name="proId" value="<?php echo $Data['Product_Id'] ?>">
													<h5 class="mtext-108 cl2 p-b-7">
														Add a review
													</h5>
													<div class="flex-w flex-m p-t-20 p-b-23">
														<span class="stext-102 cl3 m-r-16">Your Rating</span>
														<span class="wrap-rating fs-18 cl11 pointer" id="starRating">
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														</span>
														<!-- Hidden field to capture the star rating -->
														<input type="hidden" class="starRatingValue" name="starRating" value="0">
													</div>
													<div class="row p-b-25">
														<div class="col-12 p-b-5">
															<label class="stext-102 cl3" for="review">Write your Product review</label>
															<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="userReview"></textarea>
															<div id="fileHelpId" class="text-danger fw-medium"><?php echo $revError ?></div>
														</div>
														<div class="col-12 p-b-5 mt-4">
															<div class="mb-3">
																<label for="formFileMultiple" class="form-label stext-102 cl3">Pictures speak louder than words</label>
																<input class="form-control stext-102 cl3" name='reviewImage[]' type="file" id="formFileMultiple" multiple>
																<div id="fileHelpId" class="text-danger fw-medium"><?php echo $revImgError ?></div>
															</div>
														</div>
													</div>

													<button type="submit" name="reviewBtn" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
														Submit
													</button>
												</form>
												<?php
											}
											else{
												?>
												<h1 class='mtext-101 cl3 m-r-16 text-center'>No Reviews Found..</h1>
												<!-- Add review -->
												<form class="w-full" method="post" enctype="multipart/form-data">
													<input type="hidden" name="userId" value='<?php echo $_SESSION['Id'] ?>'>
													<input type="hidden" name="proId" value="<?php echo $Data['Product_Id'] ?>">
													<h5 class="mtext-108 cl2 p-b-7">
														Add a review
													</h5>
													<div class="flex-w flex-m p-t-20 p-b-23">
														<span class="stext-102 cl3 m-r-16">Your Rating</span>
														<span class="wrap-rating fs-18 cl11 pointer" id="starRating">
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														</span>
														<!-- Hidden field to capture the star rating -->
														<input type="hidden" class="starRatingValue" name="starRating" value="0">
													</div>
													<div class="row p-b-25">
														<div class="col-12 p-b-5">
															<label class="stext-102 cl3" for="review">Write your Product review</label>
															<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="userReview"></textarea>
															<div id="fileHelpId" class="text-danger fw-medium"><?php echo $revError ?></div>
														</div>
														<div class="col-12 p-b-5 mt-4">
															<div class="mb-3">
																<label for="formFileMultiple" class="form-label stext-102 cl3">Pictures speak louder than words</label>
																<input class="form-control stext-102 cl3" name='reviewImage' type="file" id="formFileMultiple" multiple>
																<div id="fileHelpId" class="text-danger fw-medium"><?php echo $revImgError ?></div>
																
															</div>
														</div>
													</div>

													<button type="submit" name="reviewBtn" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
														Submit
													</button>
												</form>
												<?php
											}
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: <?php echo $Data["Category_Name"] ?>
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2 product-Detail">
				<div class="slick2">
<?php
$query=$run->prepare('select * from Products where Product_CatId = :pId');
$query->bindParam('pId',$Data["id"]);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $products){

?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="<?php echo $Pro_ImageAddress.$products['Product_Image'] ?>" alt="IMG-PRODUCT">

								<a href="#product<?php echo $products['Product_Id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" id="<?php echo $products['Product_Id'] ?>">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-uppercase">
									<?php echo $products['Product_Name'] ?>
									</a>

									<span class="stext-105 cl3">
									 $ <?php echo $products['Product_Price'] ?>
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
<?php
}
?>
				</div>
			</div>
		</div>
	</section>
		
<?php
include("components/footer.php");
?>