<?php include("dataconnection.php");?>
<?php
    if(isset($_GET["cate"]))
    {
        $Cate_Name = $_GET["cate"];
        $page_title = $Cate_Name;
        include("includes/header.php")
?>
		<div class="breadcrumbs-two">
			<div class="container">
				<div class="row mb-2">
					<div class="col">
                        <h2 style ="font-size:60px"><?php echo $Cate_Name?></h2>
                            <?php
                                $Category = "SELECT ID,Cate_Name FROM category WHERE Cate_Name = '$Cate_Name' AND Cate_Status = '1' ";
                                $Category_Run = mysqli_query($dataconnection,$Category);

                                if(mysqli_num_rows($Category_Run) >0 )
                                {
                                    $Category_Items = mysqli_fetch_array($Category_Run);
                                    $Category_ID = $Category_Items['ID'];

                                    $Product = "SELECT ID,Category_ID,Pro_Name,Pro_Price,Pro_Image FROM product WHERE Category_ID = '$Category_ID' AND Pro_Status = '1'";
                                    $Product_Run = mysqli_query($dataconnection,$Product);

                                    if(mysqli_num_rows($Product_Run) > 0)
                                    {
                                        ?>
                                                <div class="row">
                                                    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                                                        <h2>View All Products</h2>
                                                    </div>
                                                </div>
                    </div>
                </div>    
            </div>
        </div>
        <div class="colorlib-product">
            <div class="container">
                <div class="row">
                        <div class="col-lg-3 col-xl-3">
							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Size</h3>
									<div class="block-26 mb-2">
										<h4>Size</h4>
					               <ul>
                                    <?php
                                        $Size = "SELECT * FROM size";
                                        $Size_run = mysqli_query($dataconnection,$Size);
                                        if(mysqli_num_rows($Size_run))
                                        {
                                            foreach($Size_run as $All_Size)
                                            {
                                                ?>
                                                <li><a href="filter.php?size=<?php echo $All_Size['EUsize']?>"><?php echo $All_Size['EUsize']?></a></li>
                                                <?php
                                            }
                                        }
                                    ?>
					               </ul>
					            </div>
								</div>
							</div>
					    </div>  
                        <div class="col-lg-9 col-xl-9">
                            <div class="row row-pb-md">    
                                        <?php
                                        foreach($Product_Run as $Product_Items)
                                        {
                                            ?>
                                                        <div class="col-md-3 col-lg-3 mb-4 text-center">
                                                            <div class="product-entry border">
                                                                <a href="products.php?title=<?php echo $Product_Items['ID']?>" class="prod-img">
                                                                    <img src="../Admin/uploads/products/<?php echo $Product_Items['Pro_Image']?>" class="img-fluid">
                                                                </a>
                                                                <div class="desc">
                                                                    <h2><a href="products.php?title=<?php echo $Product_Items['ID']?>"><?php echo $Product_Items['Pro_Name']?></a></h2>
                                                                    <span class="price"><strong>RM  <?php echo $Product_Items['Pro_Price'];?></strong></span>
                                                                </div>
                                                            </div>
                                                        </div>                
                                            <?php            
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>                
                </div>                     
            </div>
        </div>                         
<?php
                                    }
                                }
    }
	else
	{        
        $page_title = "All Products";
        include("includes/header.php");
?>
        <div class="breadcrumbs-two">
            <div class="container">
				<div class="row mb-2">
                    <div class="col">    
                        <h2 style ="font-size:60px"><?php echo $page_title?></h2>
                        <?php
							$Product = "SELECT product.* FROM product,category WHERE product.Pro_Status = '1' AND category.Cate_Status='1' AND product.Category_ID = category.ID";
							$Product_Run = mysqli_query($dataconnection,$Product);
							if(mysqli_num_rows($Product_Run) > 0)
                            {
                                        ?>
                                                    <div class="row">
                                                        <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                                                            <h2>View All Products</h2>
                                                        </div>
                                                    </div>
                    </div>                
                </div>                        
            </div>    
        </div>     
        <div class="colorlib-product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-xl-3">
							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Filter</h3>
									<div class="block-26 mb-2">
										<h4>Size</h4>
					               <ul>
                                    <?php
                                        $Size = "SELECT * FROM size";
                                        $Size_run = mysqli_query($dataconnection,$Size);
                                        if(mysqli_num_rows($Size_run))
                                        {
                                            foreach($Size_run as $All_Size)
                                            {
                                                ?>
                                                 <li><a href="filter.php?size=<?php echo $All_Size['EUsize']?>"><?php echo $All_Size['EUsize']?></a></li>
                                                <?php
                                            }
                                        }
                                    ?>
					               </ul>
					            </div>
								</div>
							</div>
					</div>  
                    <div class="col-lg-9 col-xl-9">
                        <div class="row row-pb-md">
                                        <?php
                                        foreach($Product_Run as $Product_Items)
                                        {
                                            ?>
                                                        <div class="col-md-3 col-lg-3 mb-4 text-center">
                                                            <div class="product-entry border">
                                                                <a href="products.php?title=<?php echo $Product_Items['ID']?>" class="prod-img">
                                                                    <img src="../Admin/uploads/products/<?php echo $Product_Items['Pro_Image']?>" class="img-fluid">
                                                                </a>
                                                                <div class="desc">
                                                                    <h2><a href="products.php?title=<?php echo $Product_Items['ID']?>"><?php echo $Product_Items['Pro_Name']?></a></h2>
                                                                    <span class="price"><strong>RM  <?php echo $Product_Items['Pro_Price']?></strong></span>
                                                                </div>
                                                            </div>
                                                        </div>     
                                            <?php            
                                        }
                                        ?>
                        </div>
                    </div>
                </div>
            </div>                            
        </div>                      
<?php      
                                    }

	}
                            ?>

		<div class="colorlib-product">
			<div class="container">
				<div class="row">

					<div class="col-md-12 text-center">
						<div class="block-27">
		               <ul>
			               <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li>
		                  <li class="active"><span>1</span></li>
		                  <li><a href="#">2</a></li>
		                  <li><a href="#">3</a></li>
		                  <li><a href="#">4</a></li>
		                  <li><a href="#">5</a></li>
		                  <li><a href="#"><i class="ion-ios-arrow-forward"></i></a></li>
		               </ul>
		            </div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-4.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div>


	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	

	</body>

<?php include("includes/footer.php")?>
<?php include("includes/scripts.php")?>
