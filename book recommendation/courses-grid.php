<?php
	require_once('admin/includes/database.php');
	$con->login_session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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


<style>
	#bgimg1{
		background-image: url('img/RHqIc5qwNp (1).png');
		background-repeat: no-repeat;
	}

	.filters_listing {
   
    background: #bfa796 !important;
	}
	

	.switch-field input:checked + label {
   
    background-color: #480048 !important;
}
</style>

</head>

<body>
	
	<div id="page">
		
	<header class="header menu_2">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
		<div id="logo">
			<a href="index.php" style=" color: #fff; font-size: 19px;font-weight: 500;">BOOK RECOMMENDATION</a>
		</div>
		<ul id="top_menu">
			<?php 
				if($con->login_session()){ ?><li><a href="login.php" class="login">Login</a></li><?php }
				else{ ?><li><a href="logout.php" class="">Logout</a></li><?php }
			?>
		</ul>
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<nav id="menu" class="main-menu">
			<ul>
				
				
				
				
				
			</ul>
		</nav>
		<!-- Search Menu -->
		<div class="search-overlay-menu">
			<span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
			<form role="search" id="searchform" method="get">
				<input value="" name="q" type="search" placeholder="Search..." />
				<button type="submit"><i class="icon_search"></i>
				</button>
			</form>
		</div><!-- End Search Menu -->
	</header>
	<!-- /header -->
	
	<main>
		<section id="hero_in" class="courses">
			<div class="wrapper" id="bgimg1">
				<div class="container">
					<h1 class="fadeInUp" style="color: #791d48 !important;"><span></span>Books</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->
		<div class="filters_listing sticky_horizontal">
			<div class="container">
				<ul class="clearfix">
					
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->

		<div class="container margin_60_35">
			<div class="row">
				<?php 
					$ip = $_SERVER['REMOTE_ADDR'];
					$q = "select * from user_hobby where ip_address='$ip'";
					$run = $con->execute($q);
					while ($user_hobby_data = $con->fetch_assoc($run))
					{
						$category_hobby_id = $user_hobby_data['choose_hobby'];
						$category_data = $con->fetch_assoc($con->execute("select category.title,category.description from category join category_hobby on category_hobby.category_id = category.id where category_hobby.id='$category_hobby_id'"));
						$q1 = "select * from hobby_book where category_hobby_id='$category_hobby_id'";
						$run1 = $con->execute($q1);
						while ($hobby_book = $con->fetch_assoc($run1))
						{
						 	?>
						 		<div class="col-xl-4 col-lg-6 col-md-6">
									<div class="box_grid wow">
										<figure class="block-reveal">
											<div class="block-horizzontal"></div>
											<!-- <a href="#0" class="wish_bt"></a> -->
											<a href="view_book.php?book=<?= $hobby_book['book_name']?>"><img src="img/3uLLk4tXSV.png" class="img-fluid" alt=""></a>
										</figure>
										<div class="wrapper">
											<small>Category</small>
											<h3><?= ucfirst($category_data['title']) ?></h3>
											<p><?= ucfirst($category_data['description']) ?></p>
										</div>
										<ul>
											
											<li><a href="view_book.php?book=<?= $hobby_book['book_name']?>" style="width: 100% !important;">View Book</a></li>
										</ul>
									</div>
								</div>

						 	<?php
						} 
					}

				?>

			</div>
			<!-- /row -->
			
		</div>
		<!-- /container -->
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-help2"></i>
							<h4>Need Help? Contact us</h4>
							<p>Cum appareat maiestatis interpretaris et, et sit.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-wallet"></i>
							<h4>Payments and Refunds</h4>
							<p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-note2"></i>
							<h4>Quality Standards</h4>
							<p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
						</a>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
	<!--/main-->
	
	<footer>
		<div class="container margin_120_95">
			<div class="row">
				<div class="col-lg-5 col-md-12 p-r-5">
					<p><a href="BookReadingPeriods.php" style=" color: #fff; font-size: 19px;font-weight: 500;">BOOK RECOMMENDATION</a></p>
					<p>Mea nibh meis philosophia eu. Duis legimus efficiantur ea sea. Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu. Nihil facilisi indoctum an vix, ut delectus expetendis vis.</p>
					<div class="follow_us">
						<ul>
							<li>Follow us</li>
							<li><a href="#0"><i class="ti-facebook"></i></a></li>
							<li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
							<li><a href="#0"><i class="ti-google"></i></a></li>
							<li><a href="#0"><i class="ti-pinterest"></i></a></li>
							<li><a href="#0"><i class="ti-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ml-lg-auto">
					<h5>Useful links</h5>
					<ul class="links">
						
						<li><a href="#0">Register</a></li>
						
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href=""><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
						<li><a href=""><i class="ti-email"></i> info@devsbeta.com</a></li>
					</ul>
					<div id="newsletter">
					<h6>Newsletter</h6>
					<div id="message-newsletter"></div>
					<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
						<div class="form-group">
							<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
							<input type="submit" value="Submit" id="submit-newsletter">
						</div>
					</form>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© 2017 Devsbeta</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
  
</body>
</html>