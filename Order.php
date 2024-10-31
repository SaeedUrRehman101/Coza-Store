<?php
include('components/header.php');
?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Order Placing Details
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div>
				<div class="bor10 p-lr-300 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form method="post">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
						Delivery Information
						</h4>

						<?php
						$query = $run->prepare('select * from signin where userId = :uId');
						$query->bindParam('uId', $_SESSION['Id']);
						$query->execute();
						$User = $query->fetch(PDO::FETCH_ASSOC);
						?>
                        <div class="size-210 d-flex justify-content-between w-100">
                        <div class="bor8 m-b-20 how-pos4-parent me-4 w-100">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" value="<?php echo $User['User_Name'] ?>" placeholder="Your Full Name">
							<img class="how-pos4 pointer-none" src="images/icons/user.png" alt="ICON">
						</div>
                        <div class="bor8 m-b-20 how-pos4-parent ms-4 w-100">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" value="<?php echo $User['User_Email'] ?>" placeholder="Your Email Address">
							<img class="how-pos4 pointer-none" src="images/icons/email.png" alt="ICON">
						</div>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="number" name="phone" value="<?php echo $User['User_Phone'] ?>" placeholder="Phone Number">
							<img class="how-pos4 pointer-none" src="images/icons/phone.png" alt="ICON">
						</div>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address" placeholder="Address">
							<img class="how-pos4 pointer-none" src="images/icons/location.png" alt="ICON">
						</div>

						<button name="orderPlace" type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>
			</div>
		</div>
	</section>	

<?php
include('components/footer.php');
?>