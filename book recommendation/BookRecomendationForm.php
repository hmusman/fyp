<?php 
	require_once('includes/database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>UDEMA | Modern Educational site template</title>

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
	
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script>

</head>

<body>
	
	<div id="page">
	
	<header class="header menu_2">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
		<div id="logo">
			<a href="index.html"><img src="img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
		</div>
		<ul id="top_menu">
			<li><a href="login.html" class="login">Login</a></li>
			<li><a href="#0" class="search-overlay-menu-btn">Search</a></li>
			<li class="hidden_tablet"><a href="admission.html" class="btn_1 rounded">Admission</a></li>
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
				<li><span><a href="#0">Home</a></span>
					<ul>
						<li><a href="index.html">Home version 1</a></li>
						<li><a href="index-2.html">Home version 2</a></li>
						<li><a href="index-6.html">Home version 3</a></li>
						<li><a href="index-3.html">Home version 4</a></li>
						<li><a href="index-4.html">Home version 5</a></li>
						<li><a href="index-5.html">With Cookie bar (EU law)</a></li>
					</ul>
				</li>
				<li><span><a href="#0">Courses</a></span>
					<ul>
						<li><a href="courses-grid.html">Courses grid</a></li>
						<li><a href="courses-grid-sidebar.html">Courses grid sidebar</a></li>
						<li><a href="courses-list.html">Courses list</a></li>
						<li><a href="courses-list-sidebar.html">Courses list sidebar</a></li>
						<li><a href="course-detail.html">Course detail</a></li>
                        <li><a href="course-detail-2.html">Course detail working form</a></li>
						<li><a href="admission.html">Admission wizard</a></li>
						<li><a href="teacher-detail.html">Teacher detail</a></li>
					</ul>
				</li>
				<li><span><a href="#0">Pages</a></span>
					<ul>
						<li><a href="#0">Menu 2</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="register.html">Register</a></li>
						<li><a href="contacts.html">Contacts</a></li>
						<li><a href="404.html">404 page</a></li>
						<li><a href="agenda-calendar.html">Agenda Calendar</a></li>
						<li><a href="faq.html">Faq</a></li>
						<li><a href="help.html">Help</a></li>
					</ul>
				</li>
				<li><span><a href="#0">Extra Pages</a></span>
					<ul>
						<li><a href="media-gallery.html">Media gallery</a></li>
						<li><a href="cart-1.html">Cart page 1</a></li>
						<li><a href="cart-2.html">Cart page 2</a></li>
						<li><a href="cart-3.html">Cart page 3</a></li>
						<li><a href="pricing-tables.html">Responsive pricing tables</a></li>
						<li><a href="coming_soon/index.html">Coming soon</a></li>
						<li><a href="icon-pack-1.html">Icon pack 1</a></li>
						<li><a href="icon-pack-2.html">Icon pack 2</a></li>
						<li><a href="icon-pack-3.html">Icon pack 3</a></li>
						<li><a href="icon-pack-4.html">Icon pack 4</a></li>
					</ul>
				</li>
				<li><span><a href="#0">Buy template</a></span></li>
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
	<style>

@media (max-width: 550px){

	input[name="question[]"] {
    display: block !important;
    visibility: hidden;
}
.container input:checked ~ .checkmark {
    margin-left: 20px !important;

    height: 144% !important;
    width: 19% !important;
  

}
.checkmark {

   
    height: 105% !important;
   
    border-radius: 5px !important;
    width: 17% !important;
    margin-left: 20px !important;
}

.container input:checked ~ .checkmark:after {
  
    height: 61% !important;
    width: 21% !important;
    margin-left: 2px !important;
    margin-top: -2px;
}
}













		header[class="header mm-slideout"]{
			background-color: #661248 !important;
		}

  .perh2{
    font-size: 16px !important;
    line-height: 1.5em !important;
    font-weight: 600 !important;
    color: #8b9093 !important;
    text-transform: uppercase !important;
    text-align: center !important;
  }
  


.onboarding-question{
    
  text-align: center;
  font-family: inherit;
  font-weight: 600;
  font-size: 48px;
  line-height: 1.1em;
margin-top: -3px;
  padding-bottom: 25px;

  
}


ul[ class="answers"] > li{
    width: 50% !important;
}



.btn_1.outline {
    border: 2px solid #832348 !important;
    color: #832348 !important;
}
.btn_1.outline:hover {
    background: #832348 !important;
	color: white !important;
}

  h1 {
	  margin-top: 100px;
    text-align: center;
    font-size: 28px;
    text-shadow: #963c3c 1px 1px;
    color: #f44336;
  }
  
  .question {
    font-size:21px;

  }
  #qst{
    text-align: center;
    font-size: 18px !important;
    line-height: 1.5em;
    font-weight: 600;
    text-align: left;
    font-family: inherit;
  }
  label {
    border:1px solid #dcdedf;
    padding:10px;
    margin:0 0 10px;
    display:block;
    font-size:20px;
    background-color: white !important;
  }
  
  label:hover {
    background:#e3dede;
    cursor:pointer;
    border:1px solid #661248 !important;
  }
  
  ul {
    list-style: none;
  }
  
  nav li {
    display:inline;
    margin:10px;
    /* border-style:solid;
    border-width:thin; */
    position:relative;
  
  }
  nav {
    text-align: center;
    /* border-style: solid;
    border-width: thin; */
  }
  
  nav ul {
    padding:inherit;
    list-style:none;
  }
  input[name="question[]"]{
	/* height: 100% !important;
    width: 100% !important; */
	display: none;
	visibility: hidden;
  }

/* 

  input:checked ~ .checkmark {
  background-color: red !important;
} */

	</style>

	<style>
		
		.checkmark {
		  position: absolute;
		  top: 0;
		  left: 0;
		
		border: 1px #dadada solid;
		 
    height: 97%;
    width: 32%;
    border-radius: 5px;
		}
		
		/* On mouse-over, add a grey background color */
		.container:hover input ~ .checkmark {
		  /* background-color: #ccc; */
		}
		
		/* When the checkbox is checked, add a blue background */
		.container input:checked ~ .checkmark {
		    background-color: #711948;
    height: 97%;
    width: 32%;
    border-radius: 5px;
	box-shadow: 0 0 10px #691642;
		}
		
		/* Create the checkmark/indicator (hidden when not checked) */
		.checkmark:after {
		  content: "";
		  position: absolute;
		  display: none;
		}
		
		/* Show the checkmark when checked */
		.container input:checked ~ .checkmark:after {
		  display: block;
		  height: 55% ;
    width: 27% ;
    margin-left: 4px ;
		}
		
		/* Style the checkmark/indicator */
		.container .checkmark:after {
		  left: 9px;
		  top: 5px;
		  width: 5px;
		  height: 10px;
		  border: solid white;
		  border-width: 0 3px 3px 0;
		  -webkit-transform: rotate(45deg);
		  -ms-transform: rotate(45deg);
		  transform: rotate(45deg);
		}
		</style>



	<main>
		<h1>BuzzFeed Quiz</h1>
		<br/><br/>
			<h2 class="perh2">PERSONALIZE YOUR EXPERIENCE</h2>
		
		
		
			<p class="onboarding-question">What do you like to read?</p>
		
		
		   <center> <div class="question"><!-- <p>Mysteries, Thrillers, Action</p> -->
		
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" ></div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="message" ></div>
			</div>
			  <ul class="answers">
					
					<?php
						$ip = $_SERVER['REMOTE_ADDR'];
						$q = "select * from user_category where ip_address='$ip'";
						$categoryArr= $con->fetch_assoc($con->execute($q));
						$category_id = $categoryArr['choose_category'];
						$q1 = "select * from category_hobby where category_id= '$category_id'";
						$run = $con->execute($q1);
						while ($data = $con->fetch_assoc($run))
						{
							?>
								<li >
									<label class="container">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"><?= ucwords($data['name']) ?></div>
											<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
												<input  name="question[]" class="question_checkbox" type="checkbox" value="<?= $data['id'] ?>">  
												<span class="checkmark"></span>
											</div>
										</div>
									</label>
								</li>
							<?php
						}

					?>

				<!-- <li >
					<label class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Crime Fiction</div>
							<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
								<input  name="Question0" id="lblone" type="checkbox">  
								<span class="checkmark"></span>
							</div>
						</div>
					</label>
				</li> -->






				<!-- 	<li >
						<label class="container">
							<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Psychological Thrillers</div>
	<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
		<input  name="Question0" id="lblone" type="checkbox">  
		<span class="checkmark"></span>
	</div>
						</div>
					</label>
					</li>





					<li >
						<label class="container">
							<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Cozy Mysteries</div>
	<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>






				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Historical Mysteries</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>





				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Thrillers</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>


				



				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Supernatural Suspense</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>









				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Action and Adventure</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li> -->







			  </ul>








			  
			  
			</div></center>
		  










			
			<center> <div class="question"><p>Fantasy, Science Fiction, Horror

			</p>
			
				<ul class="answers">
				
					<li >
						<label class="container">
							<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Science Fiction</div>
	<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
		<input  name="Question0" id="lblone" type="checkbox">  
		<span class="checkmark"></span>
	</div>
						</div>
					</label>
					</li>
	
	
	
	
	
	
					<li >
						<label class="container">
							<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Fantasy</div>
	<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
		<input  name="Question0" id="lblone" type="checkbox">  
		<span class="checkmark"></span>
	</div>
						</div>
					</label>
					</li>
	
	
	
	
	
					<li >
						<label class="container">
							<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Horror</div>
	<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
		<input  name="Question0" id="lblone" type="checkbox">  
		<span class="checkmark"></span>
	</div>
						</div>
					</label>
					</li>
	
	
	
	
	
	
				  </ul>
			</div></center>
		  
			<center><div class="question"><p>Teen and Young Readers



			</p>
			



			  <ul class="answers">
				
				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Teen and Young Adult</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>






				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Children's</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>





				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Middle Grade</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>






			  </ul>



			</div></center>
		  
	
			<center><div class="question"><p>Non Fiction



			</p>
			



			  <ul class="answers">
				
				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Biographies and Memoirs</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>






				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> History</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>





				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Science</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>
				




				<li >
					<label class="container">
						<div class="row">
<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"> Cooking</div>
<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
	<input  name="Question0" id="lblone" type="checkbox">  
	<span class="checkmark"></span>
</div>
					</div>
				</label>
				</li>

			  </ul>



			</div></center>
		  
		  
			<!-- <div class="results">Results</div> -->
		  
			<!-- <input class="previous" type="button" value="Previous"> -->
		  
			<!-- <input class="next"type="button" value="Next Question"> -->
		  
			<center>
			
			<!-- <a href="courses-grid.html" >	<button type="button" class="btn_1 outline">Find Books</button></a> -->


			<button type="button" class="btn_1 outline find_books">Find Books</button>

				<!-- <button type="button" class="next btn_1 outline">Next Optinos</button> -->
			</center>
			<!-- <input class="clear" type="button" value="Clear Selection">
			<input class="results" type="button" value="Results"> -->
		  
			<!-- <input type="button" class="btn_1 outline" name="btnResults" id="btnResults" value="Results" onclick="Results()"/>
		
			<div id="scoreBoard">
			  <p> <span id="score"></span></p>
			</div> -->
		<!--/call_section-->
		<br/>
		<br/>
	</main>
	<!-- /main -->
	
	<footer>
		<div class="container margin_120_95">
			<div class="row">
				<div class="col-lg-5 col-md-12 p-r-5">
					<p><img src="img/logo.png" width="149" height="42" data-retina="true" alt=""></p>
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
						<li><a href="#0">Admission</a></li>
						<li><a href="#0">About</a></li>
						<li><a href="#0">Login</a></li>
						<li><a href="#0">Register</a></li>
						<li><a href="#0">News &amp; Events</a></li>
						<li><a href="#0">Contacts</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
						<li><a href="mailto:info@udema.com"><i class="ti-email"></i> info@udema.com</a></li>
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
					<div id="copy">© 2017 Udema</div>
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
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/video_header.js"></script>
	<script>
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>







<script>

$(document).ready(function(){
	$('.find_books').click(function(){
		
		if($(".question_checkbox").is(":checked"))
		{
			$('#message').hide();
			var hobbyArr = $('.question_checkbox:checked').map(function(){ return this.value; }).get();
			$.ajax({
			url:"includes/action.php",
			type:"post",
			data:{hobby_id:hobbyArr},
			success:function(data){
				window.location="courses-grid.php";
			}
		});
		}
		else
		{
			$('#message').show();
			document.getElementById('message').innerHTML = "<div class='alert alert-warning'>Please select any hobby book</div>";
		}
	});
});

//Total number of questions
var totalNumQuestions = $('.question').size();

//Display current question, sets it at first question
var currentQuestion = 0;

//jQuery variable
$question = $('.question');

//Hide all of the questions
$question.hide();

//Show the first question
$($question.get(currentQuestion)).fadeIn();

//Click listener to get next question...
$('.next').click(function() {

  //Current question disappears...
  $($question.get(currentQuestion)).fadeOut(function() {

    //Questions go up one by one
    currentQuestion = currentQuestion + 1;

    //Next question...
    $($question.get(currentQuestion)).fadeIn();
  });
 });


//Better in jQuery
var score = 0;

function Results() {
  if (document.getElementById("correct").checked === true) score++;
  else (alert("Incorrect!"));
 }

//...Scoring...

</script>






</body>
</html>