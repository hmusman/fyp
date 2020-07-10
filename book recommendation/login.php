<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
   <title>Final Year Project</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body id="login_bg" style="background: #ccc !important;">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="login">
		<aside style="width: 40%; margin-left: 30% !important; margin-top:5% !important; margin-right: 30% !important; height: 435px !important;">
			<figure>
				<a href="BookReadingPeriods.php" style=" color: #fff; font-size: 19px;font-weight: 500;">BOOK RECOMMENDATION</a>
			</figure>
			  <form>
				<div class="form-group">
					<div class="alert alert-warning" id="alert_login">Sorry! Your email / password is wrong</div>
					<span class="input">
					<input class="input_field" type="email" id="email" autocomplete="off" name="email">
						<label class="input_label">
						<span class="input__label-content">Your email</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" autocomplete="new-password" name="pass" id="pass">
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					</span>
					<!-- <small><a href="#0">Forgot password?</a></small> -->
				</div>
				<a href="#0" class="btn_1 rounded full-width add_top_60 login">Login</a>
				<div class="text-center add_top_10">New ? <strong><a href="register.php">Sign up!</a></strong></div>
			</form>
		</aside>
	</div>
	<!-- /login -->
		
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	<script src="js/register_login.js"></script>

  
</body>
</html>