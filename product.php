<?php
include("components/header.php");
?>
	<!-- Product -->
	<div class="bg0 m-t-100 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<?php
				if(!isset($_GET['cateId'])){
					?>
					<div class="flex-w flex-l-m filter-tope-group m-tb-10">
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
							All Products
						</button>
						<?php
						$query = $run->query('select * from categories');
						$result = $query->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $cate){
							?>
							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $cate['id'] ?>"><?php echo $cate['Category_Name'] ?></button>
							<?php
						}
							?>
					</div>
					<?php
				}
				?>
				<!-- <div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
						Women
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
						Men
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
						Bag
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
						Shoes
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
						Watches
					</button>
				</div> -->

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<!-- <div class="dis-none panel-search w-full p-t-10 p-b-15">
					<form method="Get">
					<div class="bor8 dis-flex p-l-15">
						<button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search"  value="<?php echo isset($_GET['search-product']) ? $_GET['search-product'] : ''; ?>">
						<?php
						if(isset($_GET['cateId'])){
							?>
							<input type="hidden" name="cateId" value="<?php echo isset($_GET['cateId']) ? $_GET['cateId'] : ''; ?>">
							<?php
						}
						?>
					</div>
					</form>
				</div> -->

				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<!-- SECOND METHOD -->

					<form method="dialog">
						<div class="bor8 dis-flex p-l-15">
							<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>

							<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="searchProduct" id="search" placeholder="Search">
						</div>
					</form>
				</div>


				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row isotope-grid" id="productData">
				<?php
				if(isset($_GET['cateId'])){
					$categoryId = $_GET['cateId'];
					$query = $run->prepare('select * from products where Product_CatId = :pid');
					$query->bindParam('pid',$categoryId);
					$query->execute();
					$productdata = $query->fetchAll(PDO::FETCH_ASSOC);
					if(isset($_GET['search-product'])){
						$categoryId = $_GET['cateId'];
						$searchpro = strtoupper($_GET['search-product']);
						$query = $run->prepare('select * from products where Product_CatId = :pid and (upper(Product_Name) like :search or upper(Product_Description) like :search)');
						$searchTerm = "%" . $searchpro ." %";
						$query->bindParam('pid',$categoryId);
						$query->bindParam('search',$searchTerm);
						$query->execute();
						$productdata = $query->fetchAll(PDO::FETCH_ASSOC);
					}
					if($productdata){
						foreach($productdata as $product){
							?>
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="<?php echo $Pro_ImageAddress.$product['Product_Image'] ?>" alt="IMG-PRODUCT">
											<a href="#product<?php echo $product['Product_Id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" id="<?php echo $product['Product_Id'] ?>">
												Quick View
											</a>
										</div>
	
										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product-detail.php?proId=<?php echo $product['Product_Id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-uppercase">
													<?php echo $product["Product_Name"] ?>
												</a>
	
												<span class="stext-105 cl3">
												$, <?php echo $product['Product_Price'] ?>
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
					}
					else{
						echo "<div class='container col-sm-2 col-md-5 col-lg-10 isotope-item'>
						<div class='stext-114 text-capitalize p-t-30 p-b-40 col-sm-5 col-lg-10'>No products found...</div>
						<div class='search-error'>
						<img src='images/light.png' class='col-sm-2 col-md-10 p-l-50' alt='IMG-PRODUCT'>;
						</div>
						</div>";
					}
				}
				if(!isset($_GET['cateId'])){
					$query = $run->query('select * from products');
					$productdata = $query->fetchAll(PDO::FETCH_ASSOC);
					// if(isset($_GET['search-product'])){
						// 	$searchpro = strtoupper($_GET['search-product']);
						// 	$query = $run->prepare('select * from products where upper(Product_Name) like :search or upper(Product_Description) like :search');
						// 	$searchTerm = "%" . $searchpro ." %";
						// 	$query->bindParam('search',$searchTerm);
						// 	$query->execute();
						// 	$productdata = $query->fetchAll(PDO::FETCH_ASSOC);
					// }
					if($productdata){
						foreach($productdata as $product){
							?>
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $product['Product_CatId'] ?>">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="<?php echo $Pro_ImageAddress.$product['Product_Image'] ?>" alt="IMG-PRODUCT">
	
		
											<a href="#product<?php echo $product['Product_Id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" id="<?php echo $product['Product_Id'] ?>">
												Quick View
											</a>
						
										</div>
	
										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product-detail.php?proId=<?php echo $product['Product_Id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-uppercase">
													<?php echo $product["Product_Name"] ?>
												</a>
	
												<span class="stext-105 cl3">
												$, <?php echo $product['Product_Price'] ?>
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
					}
					else{
						echo "<div class='container col-sm-2 col-md-5 col-lg-10 isotope-item'>
						<div class='stext-114 text-capitalize p-t-30 p-b-40 col-sm-5 col-lg-10'>No products found...</div>
						<div class='search-error'>
						<img src='images/light.png' class='col-sm-2 col-md-10 p-l-50' alt='IMG-PRODUCT'>;
						</div>
						</div>";
					}
				}
						?>

			</div>
		</div>
	</div>

<?php
include("components/footer.php");
?>