<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
	<form action="#" class="frm-single">
		<div class="inside">
			<div class="title">Dashboard</div>
			<!-- /.title -->
			<div class="frm-title">Student SignUp</div>
			<!-- /.frm-title -->
			<div class="alert alert-warning message">Please Type Username / Password</div>
			<div class="frm-input"><input type="text" id="username" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" id="pass" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.frm-input -->

			<!-- /.clearfix -->
			<button type="button" class="frm-submit save">Sign Up<i class="fa fa-arrow-circle-right"></i></button>
			<!-- /.row -->
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
	<script src="assets/scripts/myscripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.message').hide();
			$('.save').click(function () {
				
				if($('#username').val() !='' && $('#pass').val() !='')
				{
					student_signup($('#username').val(),$('#pass').val());
				}
				else
				{
					$('.message').show();
				}

			});
		});
	</script>
</body>
</html>