<?php 
	require_once 'includes/database.php'; 
	$con->login_session();
?>


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
			<?php 
				if($con->login_session()){ ?><li><a href="login.php" class="login">Login</a></li><?php }
				else{ ?><li><a href="logout.php" class="">Logout</a></li><?php }
			?>
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
	
	h1 {
	  margin-top: 100px;
    text-align: center;
    font-size: 28px;
    text-shadow: #963c3c 1px 1px;
    color: #f44336;
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

</style>


<style>
	
.control-group {
  display: inline-block;
  vertical-align: top;
  background: #fff;
  text-align: left;
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  padding: 30px;
  width: 200px;
  height: 210px;
  margin: 10px;
}
.control {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 15px;
  cursor: pointer;
  font-size: 18px;
}
.control input {
  position: absolute;
  z-index: -1;
  opacity: 0;
}
.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background: #e6e6e6;

  margin-left: 180px;
    /* text-align: right; */
    margin-top: 9px;

}
.control--radio .control__indicator {
  border-radius: 50%;
}
.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
  background: #ccc;
}
.control input:checked ~ .control__indicator {
  background: #832348;
}
.control:hover input:not([disabled]):checked ~ .control__indicator,
.control input:checked:focus ~ .control__indicator {
  background: #832348;
}




.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.6;
  pointer-events: none;
}
.control__indicator:after {
  content: '';
  position: absolute;
  display: none;
}
.control input:checked ~ .control__indicator:after {
  display: block;
}
.control--checkbox .control__indicator:after {
  left: 8px;
  top: 4px;
  width: 3px;
  height: 8px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}
.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #7b7b7b;
}
.control--radio .control__indicator:after {
  left: 7px;
  top: 7px;
  height: 6px;
  width: 6px;
  border-radius: 50%;
  background: #fff;
}
.control--radio input:disabled ~ .control__indicator:after {
  background: #7b7b7b;
}
.select {
  position: relative;
  display: inline-block;
  margin-bottom: 15px;
  width: 100%;
}
.select select {
  display: inline-block;
  width: 100%;
  cursor: pointer;
  padding: 10px 15px;
  outline: 0;
  border: 0;
  border-radius: 0;
  background: #e6e6e6;
  color: #7b7b7b;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}
.select select::-ms-expand {
  display: none;
}
.select select:hover,
.select select:focus {
  color: #000;
  background: #ccc;
}
.select select:disabled {
  opacity: 0.5;
  pointer-events: none;
}
.select__arrow {
  position: absolute;
  top: 16px;
  right: 15px;
  width: 0;
  height: 0;
  pointer-events: none;
  border-style: solid;
  border-width: 8px 5px 0 5px;
  border-color: #7b7b7b transparent transparent transparent;
}
.select select:hover ~ .select__arrow,
.select select:focus ~ .select__arrow {
  border-top-color: #000;
}
.select select:disabled ~ .select__arrow {
  border-top-color: #ccc;
}
.para{
	font-size: 16px;
    line-height: 1.5em;
    font-weight: 600;
}

.para2{
	font-size: 14px;
  margin-top: -19px;
}


#booktime:hover .para{
   color: #832348 !important;
}


#booktime:hover .para2{
   color: #832348 !important;
}


#booktime:hover{
  
 
   box-shadow:         inset 0 0 5px #661248;
}















#booktime2:hover .para{
   color: #832348 !important;
}


#booktime2:hover .para2{
   color: #832348 !important;
}


#booktime2:hover{
  
 
   box-shadow:         inset 0 0 5px #661248;
}















#booktime3:hover .para{
   color: #832348 !important;
}


#booktime3:hover .para2{
   color: #832348 !important;
}


#booktime3:hover{
  
 
   box-shadow:         inset 0 0 5px #661248;
}
.control--radio .control__indicator {
  
    /* border: 1px teal solid ;
	background-color: white ; */
}


.btn_1.outline {
    border: 2px solid #832348 !important;
    color: #832348 !important;
}
.btn_1.outline:hover {
    background: #832348 !important;
	color: white !important;
}

</style>
	<main>
		<h1>BuzzFeed Quiz</h1>
		<br/><br/>
			<h2 class="perh2">PERSONALIZE YOUR EXPERIENCE</h2>
		
		
		
			
			<p class="onboarding-question">Which best describes you?</p>



<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" ></div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="message" ></div>


</div>
<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
	<?php
		$run = $con->execute('SELECT DISTINCT(category.id),category.title,category.description FROM `category` join category_hobby on category.id = category_hobby.category_id where category.id=category_hobby.category_id');
		while($data = $con->fetch_assoc($run))
		{
			?>
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 booktime" onmouseover="changepic(<?= $data['id'] ?>)" onmouseout="orgnlpic(<?= $data['id'] ?>)" id="booktime" style="border: 1px #dcdedf solid; background-color: white !important;margin-right: 6px;">
		
					<label class="control control--radio">&nbsp;
						<div style="height: 100%; width: 100%; ">
					
						<input type="radio" value="<?= $data['id'] ?>" class="category_id" name="radio"/>
						<div class="control__indicator"></div>
					
						</div> 
				
						<center><img id="bookimg<?= $data['id'] ?>" src="img/ic_import_contacts_black_48dp.png" /></center>
						<br/>
						<p class="para"><?= ucfirst($data['title']) ?><br/>
							<section class="para2"><?= $data['description'] ?></section>
						</p>

				
					</label>

				</div>

			<?php
		}

	?>
	<!-- <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 booktime" onmouseover="changepic()" onmouseout="orgnlpic()" id="booktime" style="border: 1px #dcdedf solid; background-color: white !important;margin-right: 6px;">
		
		<label class="control control--radio">&nbsp;
			<div style="height: 100%; width: 100%; ">
		
			<input type="radio" name="radio" checked="checked"/>
			<div class="control__indicator"></div>
		
			</div> 
	
			<center><img id="bookimg" src="img/ic_import_contacts_black_48dp.png" /></center>
			<br/>
			<p class="para">Occasional Reader<br/>
				<section class="para2">I read 4 books a year</section>
			</p>

	
		</label>

	</div> -->
	<!-- <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" id="booktime2" onmouseover="changepic2()" onmouseout="orgnlpic2()" style="border: 1px #dcdedf solid; background-color: white !important;margin-right: 6px;">
		
		<label class="control control--radio">&nbsp;<div style="height: 100%; width: 100%; ">
		
			<input type="radio" name="radio" checked="checked"/>
			<div class="control__indicator"></div>
		
		</div> 
	
		<center><img id="bookimg2" src="img/ic_style_black_18dp.png" /></center>
		<br/>
		<p class="para">Occasional Reader<br/>
		<section class="para2">I read 4-12 books a year</section>
		</p>

	
		</label>



	</div> -->
	<!-- <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" id="booktime3" onmouseover="changepic3()" onmouseout="orgnlpic3()" style="border: 1px #dcdedf solid; background-color: white !important;">
		
		<label class="control control--radio">&nbsp;<div style="height: 100%; width: 100%; ">
		
			<input type="radio" name="radio" checked="checked"/>
			<div class="control__indicator"></div>
		
		</div> 
	
		<center><img id="bookimg3" src="img/ic_account_balance_black_36dp.png" /></center>
<br/>
		<p class="para">Occasional Reader<br/>
		<section class="para2">I read 13+ books a year</section>
		</p>

	
	</label>



	</div> -->
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" ></div>
</div>



			<!-- <div class="control-group">
				<h1>Radio buttons</h1>
				<label class="control control--radio">First radio
				  <input type="radio" name="radio" checked="checked"/>
				  <div class="control__indicator"></div>
				</label>
				<label class="control control--radio">Second radio
				  <input type="radio" name="radio"/>
				  <div class="control__indicator"></div>
				</label>
			   
			  </div> -->































<br/>
<br/>
			<center>
			

			<button type="button" class="btn_1 outline save">Save and Continue</button>

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


<script>

$(document).ready(function(){
	$('#message').hide();
// jQuery methods go here...
$(".booktime").hover(function(){
    $(this).attr("src","img/1-1.png");
});

$('.save').click(function(){
	var category_id;
	if($(".category_id").is(":checked"))
	{
		$('#message').hide();
		var category_id = $(".category_id:checked").val();
		$.ajax({
		url:"includes/action.php",
		type:"post",
		data:{category_id:category_id},
		success:function(data){
			window.location="BookRecomendationForm.php";
		}
	});
	}
	else
	{
		$('#message').show();
		document.getElementById('message').innerHTML = "<div class='alert alert-warning'>Please select any category</div>";
	}

	
});


});



function changepic(id){
	document.getElementById("bookimg"+id).src = "img/1-1.png";
}
function orgnlpic(id){
	document.getElementById("bookimg"+id).src = "img/ic_import_contacts_black_48dp.png";
}

function changepic2(){
	document.getElementById("bookimg2").src = "img/1-2.png";
}
function orgnlpic2(){
	document.getElementById("bookimg2").src = "img/ic_style_black_18dp.png";
}

function changepic3(){
	document.getElementById("bookimg3").src = "img/1-3.png";
}
function orgnlpic3(){
	document.getElementById("bookimg3").src = "img/ic_account_balance_black_36dp.png";
}
</script>



</body>
</html>