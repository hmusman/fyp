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
	
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script>

</head>

<body>
	
	<div id="page">
	
	<nav class="navbar" style="background: linear-gradient(to right, #480048, #C04848); padding: 15px 20px;">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a href="index.php" style=" color: #fff; font-size: 19px;font-weight: 500;">BOOK RECOMMENDATION</a>
	    </div>
	    <ul class="nav navbar-nav">
	     <?php 
			if($con->login_session()){ ?><li><a href="login.php" class="login">Login</a></li><?php }
			else{ ?><li><a href="logout.php" class="" style="color: #fff;font-weight: 500;">LOGOUT</a></li><?php }
		?>
	    </ul>
	  </div>
	</nav>
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
  input[name="question"]{
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



	<main style="margin-top: 40px;">
		
		<p class="onboarding-question">Which author do you like to read?</p>
		
		
		<center> 
		   	<div class="question"><!-- <p>Mysteries, Thrillers, Action</p> -->
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" ></div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="message" ></div>
				</div>
			    <ul class="answers">
					
					<?php
						$ip = $_SERVER['REMOTE_ADDR'];
						$q = "select * from user_hobby where ip_address='$ip'";
						$data = $con->fetch_assoc($con->execute($q));
						$category_hobby_id = $data['choose_hobby'];
						$q1 = "SELECT  DISTINCT(category_hobby_writer.id) ,category_hobby_writer.name ,category_hobby_writer.category_hobby_id from category_hobby_writer join hobby_book on category_hobby_writer.id = hobby_book.category_hobby_writer_id where category_hobby_writer.id=hobby_book.category_hobby_writer_id and category_hobby_writer.category_hobby_id='$category_hobby_id'";
						$run_q1 = $con->execute($q1);
						while ($writer_data = $con->fetch_assoc($run_q1))
						{
							?>
							<li >
								<label class="container">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;"><?= ucwords($writer_data['name']) ?></div>
										<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
											<input type="hidden" class="category_hobby_id" value="<?= $category_hobby_id?>">
											<input  name="question" class="question_checkbox" type="checkbox" value="<?= $writer_data['id'] ?>">  
											<span class="checkmark"></span>
										</div>
									</div>
								</label>
							</li>
						<?php
						}
						

					?>
					<li >
						<label class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-11 col-lg-10 " style="text-align: left;">All</div>
								<div class="col-xs-12 col-sm-12  col-md-1  col-lg-2">
									<input type="hidden" class="category_hobby_id" value="<?= $category_hobby_id?>">
									<input  name="question" class="question_checkbox" type="checkbox" value="anyone">  
									<span class="checkmark"></span>
								</div>
							</div>
						</label>
					</li>

			  	</ul>
				  
			</div>
		</center>
		 
		 <center><button type="button" class="btn_1 outline find_books">Find Books</button></center> 	
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
						
						<li><a href="#0">Register</a></li>
						
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href=""><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
						<li><a href=""><i class="ti-email"></i> info@info.com</a></li>
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

$(document).ready(function(){
	$('.find_books').click(function(){
		
		if($(".question_checkbox").is(":checked"))
		{
			$('#message').hide();
			// var hobbyArr = $('.question_checkbox:checked').map(function(){ return this.value; }).get();
			var writerArr = $('.question_checkbox:checked').val();
			var hobby_id = $('.category_hobby_id').val();
			$.ajax({
				url:"admin/includes/action.php",
				type:"post",
				data:{hobby_id:hobby_id,writer_id:writerArr},
				success:function(data){
					window.location="courses-grid.php";
				}
			});
		}
		else
		{
			$('#message').show();
			document.getElementById('message').innerHTML = "<div class='alert alert-warning'>Please select any Author</div>";
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