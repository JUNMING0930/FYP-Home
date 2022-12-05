<?php include("dataconnection.php");
if(isset($_GET['title']))
{
	$Title = $_GET['title'];
	$page_pro = "SELECT Pro_Name FROM product WHERE ID = '$Title'";
	$page_pro_run = mysqli_query($dataconnection,$page_pro);
	if(mysqli_num_rows($page_pro_run) > 0)
	{
		$page_name = mysqli_fetch_array($page_pro_run);
		$page_title = $page_name['Pro_Name'];
	}
 include("includes/header.php") ?>
	<body>

        <?php
				$Product = "SELECT Category_ID,Pro_Name,Pro_Description,Pro_Price,Pro_Image FROM product WHERE ID = '$Title'";
				$Product_query = mysqli_query($dataconnection,$Product);
				if(mysqli_num_rows($Product_query)>0)
				{
					$Data = mysqli_fetch_array($Product_query);
					$Category_ID = $Data['Category_ID'];
					$Category = "SELECT Cate_Name FROM category WHERE ID = '$Category_ID'";
					$Category_Run = mysqli_query($dataconnection,$Category);
					if(mysqli_num_rows($Category_Run)>0)
					{
						$Cate = mysqli_fetch_array($Category_Run);
					}
					?>
					<div class="colorlib-product">
						<div class="container">
							<div class="row row-pb-lg product-detail-wrap">
								<div class="col-sm-8">
										<div class="item">
											<div class="product-entry border">
												<a href="#" class="prod-img">
													<img src="../Admin/uploads/products/<?php echo $Data['Pro_Image']?>"  height="900px" width="750px">
												</a>
											</div>
										</div>
								</div>
								<div class="col-sm-4">
							<div class="product-desc">
							<h3 style="font-size:36px"><?php echo $Data['Pro_Name']?></h3>
							<p> <?php echo $Cate['Cate_Name'] ?></p>
							<p class="price">
								<span><strong>RM <?PHP echo $Data['Pro_Price']?></strong></span> 
							</p>
							
							
							<div class="size-wrap">
								<div class="block-26 mb-2">
									<h4 style="font-size:18px">Select Size (EU)</h4>
				               <ul>
				                  
				            	
							<?php
								$Available_Size = "SELECT stock.Product_ID AS Pid,stock.Product_Size AS Pro_Size FROM stock,size WHERE stock.Product_Size = size.EUsize AND stock.Product_ID = '$Title' AND stock.Product_Quantity > 0" ;
								$Available_Size_run = mysqli_query($dataconnection,$Available_Size);
								if(mysqli_num_rows($Available_Size_run) > 0)
								{
									$Size = "SELECT * FROM size";
									$Size_Run = mysqli_query($dataconnection,$Size);
									if(mysqli_num_rows($Size_Run)>0)
									{
										foreach ($Size_Run AS $Size_Row) 
										{
											foreach($Available_Size_run as $Available_Size_array)
											{
												if($Size_Row['EUsize'] == $Available_Size_array['Pro_Size'])
												{		
													{
														?>
														<li><a href="products.php?title=<?php echo $Title?>&size=<?php echo $Available_Size_array['Pro_Size']?>" style="color:black"><?php echo $Available_Size_array['Pro_Size']?></a></li>
														<?php
													}
												}
											}
										}
									}
								}
								else
								{
									echo "The Product Temporaly Out of Stock";
								}
								
							?>
							</ul>
							</div>
				            <?php
								if(isset($_GET['size']))
								{
									$Selected_Size = $_GET['size'];
									$Selected = "SELECT Product_Quantity FROM stock WHERE Product_Size = '$Selected_Size'";
									$Selected_run = mysqli_query($dataconnection,$Selected);
									if(mysqli_num_rows($Selected_run)>0)
									{
										$Quantity = mysqli_fetch_array($Selected_run);
										if($Quantity['Product_Quantity']>=10)
										{
											?>
											<p><h3>Size <?php echo $Selected_Size?> : <strong><?php echo $Quantity['Product_Quantity']?></strong> in stock </h3></p>
											<?php
										}
										else
										{
											?>
											<p><h3>Size <?php echo $Selected_Size?> : Just <strong> <?php echo $Quantity['Product_Quantity']?></strong> in stock</h3></p>
											<?php
										}
									}
								}
								?>
							<table class="table table-bordered table-striped">
                       	 	<thead>
                            <tr>
                                <th>EU Size</th>
                                <th>Centimeters</th>
                            </tr>    
                        	</thead>
                        	<tbody>
							<?php
								$Size_Details = "SELECT * FROM size";
								$Size_Details_Run = mysqli_query($dataconnection,$Size_Details);
								if(mysqli_num_rows($Size_Details_Run) > 0)
								{
									foreach($Size_Details_Run as $Details)
									{
										?>
										<tr>
										<td><?php echo $Details['EUsize']?></td>
										<td><?php echo $Details['CMsize']?> cm</td>
										</tr>
										<?php
									}
								}
							?>
							</tbody>
							</table>			
							</div>
                     <div class="input-group mb-4">
                     	<span class="input-group-btn">
                        	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                           <i class="icon-minus2"></i>
                        	</button>
                    		</span>
                     	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                     	<span class="input-group-btn ml-1">
                        	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                             <i class="icon-plus2"></i>
                         </button>
                     	</span>
                  	</div>
                  	<div class="row">
	                  	<div class="col-sm-12 text-center">
									<p class="addtocart"><a href="cart.php" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Add to Cart</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-md-12 pills">
								<div class="bd-example bd-example-tabs">
								  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

								    <li class="nav-item">
								      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Description</a>
								    </li>
								  </ul>

								  <div class="tab-content" id="pills-tabContent">
								  	<div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
								    	<p><?php echo $Data['Pro_Description']?></p>	
								    </div>
								  </div>
								</div>
				         </div>
						</div>
					</div>
				</div>
			</div>
		</div>
					<div class="gototop js-top">
					<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
					</div>			
					<?php				
				}
				else
				{
				echo ' error ';
				}
			}
			else
			{
				echo ' error ';
			}
        ?>
								
									
					
	

	<script>
		$(document).ready(function(){

		var quantity=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>


	</body>

<?php include("includes/footer.php")?>
<?php include("includes/scripts.php")?>

