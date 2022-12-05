<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="index.php">KNM SHOES</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="#" class="search-wrap">
			               <div class="form-group">
			                  <input type="search" class="form-control search" placeholder="Search">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li class="has-dropdown">
									<a href="categories.php">Shop
									<i class="ion-ios-arrow-down" style="font-size: 10px;"></i></a>
									<ul class="dropdown">
									<?php
									$Category = "SELECT * FROM category WHERE Cate_Status = '1'";
									$Category_Query = mysqli_query($dataconnection,$Category);
									if(mysqli_num_rows($Category_Query) > 0)
									{
										foreach($Category_Query as $Items)
										{
											?>
												<li><a href="categories.php?cate=<?php echo $Items["Cate_Name"]?>"><?php echo $Items["Cate_Name"]?></a></li>
											<?php
										}
									}
									?>
									</ul>
								</li>
								<li class=""><a href="about.php">About</a></li>
								<li><a href="contact.php">Contact</a></li>
								<li class="cart"><a href="cart.php"><i class="icon-shopping-cart"></i> Cart [0]</a>
								<a href="sign-up.php">Log In/Sign Up</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>