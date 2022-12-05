<?php include("dataconnection.php");?>
<?php include("includes/header.php") ?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Welcome to KNM Shoes</title>
	</head>
	<body>
		
	<div class="colorlib-loader"></div>
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.php">Home</a></span> / <span>Sign Up</span></p>
					</div>
				</div>
			</div>
		</div>


		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="contact-wrap">
							<h3>Sign Up</h3>
							<form action="#" class="contact-form">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="fname">First Name</label>
											<input type="text" id="fname" class="form-control" placeholder="Your firstname" onchange="check()">
											<span id="fnameerror" style="color: Red;text-align: center;"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lname">Last Name</label>
											<input type="text" id="lname" class="form-control" placeholder="Your lastname" onchange="check1()">
											<span id="lnameerror" style="color: Red;text-align: center;"></span>
										</div>
									</div>
									<div class="w-100"></div>
									<div class="col-sm-12">
										<div class="form-group">
											<label for="email">Email</label>
											<input type="text" id="email" class="form-control" placeholder="Your email address" onchange="check2()">
											<span id="emailerror" style="color: Red;text-align: center;"></span>
										</div>
									</div>
									<div class="w-100"></div>
									<div class="col-sm-12">
										<div class="form-group">
											<label for="subject">Password</label>
											<input type="text" id="password" class="form-control" placeholder="Your Password" onchange="check3()">
											<span id="passerror" style="color: Red;text-align: center;"></span>
										</div>
									</div>
									<div class="w-100"></div>
									<div class="col-sm-12">
										<div class="form-group">
											<label for="subject">Confirm Password</label>
											<input type="text" id="cpassword" class="form-control" placeholder="Your Confirm Password" onchange="check4()">
											<span id="cpasserror" style="color: Red;text-align: center;"></span>
										</div>
									</div>
									<div class="w-100"></div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="button" value="Join Us" class="btn btn-primary" onclick="check()">
										</div>
									</div>
                                    <div class="w-100"></div>
									<div class="col-sm-12">
										<div class="form-group">
                                                Already A Member?  <a href="login.php" style="font-weight: bold;text-decoration: underline;">Log In</a>
										</div>
									</div>
								</div>
							</form>		
						</div>
					</div>
				</div>
			</div>
		</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	<script type="text/javascript">
		var count1=0,count2=0,count3=0,count4=0,count5=0;
		function check()
		{
			var fname = document.getElementById("fname").value;
			var res = /^[a-zA-Z]+$/;
			if(res.test(fname))
			{
				document.getElementById("fnameerror").innerHTML = "";
				count1 = 1;
			} 
			else
			{
				document.getElementById("fnameerror").innerHTML = "Please Enter Valid First Name";
			}
			
		}
		function check1()
		{
			var lname = document.getElementById("lname").value;
			var res = /^[a-zA-Z]+$/;
			if(res.test(lname))
			{
				document.getElementById("lnameerror").innerHTML = "";
				count2 = 1;
			} 
			else
			{
				document.getElementById("lnameerror").innerHTML = "Please Enter Valid Last Name";
			}
		}
		function check2()
		{
			var email = document.getElementById("email").value;
			var ema = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(ema.test(email))
			{
				document.getElementById("emailerror").innerHTML = "";
				count3 = 1;
			}
			else
			{
				document.getElementById("emailerror").innerHTML = "Please Enter Valid Email Address";
			}
		}
		function check3()
		{
			var password = document.getElementById("password").value;
			var passw=  /^[A-Za-z]\w{7,14}$/;
			if(passw.test(password))
			{
				document.getElementById("passerror").innerHTML = "";
				count4 = 1;
			}
			else
			{
				document.getElementById("passerror").innerHTML = "Please Enter Valid Passsword(7 to 16 characters which contain only characters, numeric digits, underscore and first character must be a letter";
			}
		}
		function check4()
		{
			var cpassword = document.getElementById("cpassword").value;
			if(cpassword == document.getElementById("password").value)
			{
				document.getElementById("cpasserror").innerHTML = "";
				count5 = 1;
			}
			else
			{
				document.getElementById("cpasserror").innerHTML = "The Confirm Password Is Not Same As Password!"
			}
		}
	</script>
	</body>
</html>

<?php include("includes/footer.php")?>
<?php include("includes/scripts.php")?>