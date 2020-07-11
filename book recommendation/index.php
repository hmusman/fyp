<?php 
	require_once 'admin/includes/database.php'; 
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
	
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script>

</head>

<body>
	
	<div id="page">
	
	<header class="header navbar fixed-navbar" style="position: fixed; top: 0;">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
		<div id="logo">
			<a href="BookReadingPeriods.php" style=" color: #fff; font-size: 19px;font-weight: 500;">BOOK RECOMMENDATION</a>
		</div>
		<ul id="top_menu">
			<?php 
				if($con->login_session()){ ?><li><a href="login.php" class="login">Login</a></li><?php }
				else{ ?><li><a href="logout.php" class="">Logout</a></li><?php }
			?>
		</ul>
		
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
	 <main style="margin-top: 40px;">	
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
					$img="";
					if ($data['title']=='school'){ $img="ic_import_contacts_black_48dp.png"; }
					else if ($data['title']=='college'){ $img="ic_style_black_18dp.png"; }
					else if ($data['title']=='university'){ $img="ic_account_balance_black_36dp.png"; }
					// else{ $img="ic_import_contacts_black_48dp.png"; }	
					?>
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 booktime" onmouseover="changepic(<?= $data['id'] ?>)" onmouseout="orgnlpic(<?= $data['id'] ?>)" id="booktime" style="border: 1px #dcdedf solid; background-color: white !important;margin-right: 6px;">
				
							<label class="control control--radio">&nbsp;
								<div style="height: 100%; width: 100%; ">
							
								<input type="radio" value="<?= $data['id'] ?>" class="category_id" name="radio"/>
								<div class="control__indicator"></div>
							
								</div> 
						
								<center><img id="bookimg<?= $data['id'] ?>" src="img/<?= $img ?>" /></center>
								<br/>
								<p class="para"><?= ucfirst($data['title']) ?><br/>
									<section class="para2"><?= $data['description'] ?></section>
								</p>

						
							</label>

						</div>

					<?php
				}

			?>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" ></div>
		</div>

		<center>
			<button type="button" class="btn_1 outline add_top_30 save" onclick="save();">Save and Continue</button>
		</center>
		<br/>
		<br/>
	</main>
	<!-- /main -->
	


	
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
						<li><a href="register.php">Register</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
						<li><a href="mailto:info@udema.com"><i class="ti-email"></i> info@devsbeta.com</a></li>
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
			url:"admin/includes/action.php",
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



// function changepic(id){
// 	document.getElementById("bookimg"+id).src = "img/1-1.png";
// }
// function orgnlpic(id){
// 	document.getElementById("bookimg"+id).src = "img/ic_import_contacts_black_48dp.png";
// }

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