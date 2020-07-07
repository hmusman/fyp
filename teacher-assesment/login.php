<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Final Year Project</title>
	<link rel="stylesheet" href="admin/assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="admin/assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
	<form class="frm-single" method="post">
		<div class="inside">
			<div class="title"><strong>Dashboard</strong></div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
			<div class="row">
                <div class="col-sm-12 "> <div class="alert alert-warning login_error">Sorry! Your Email / Password is Wrong.</div></div>
                </div>
			<div class="form-group" style="color: #999">
               <div class="row">
                   <div class="col-sm-4 col-xs-4" style="margin-top:0px;">
                      <label>
                        <input type="radio" class="login_as" name="login_as" value="admin">
                       Admin
                      </label>
                    </div>

                    <div class=" col-sm-4 col-xs-4" >
                      <label>
                        <input type="radio" class="login_as" name="login_as" value="teacher">
                       Teacher
                      </label>
                    </div>

                    <div class=" col-sm-4 col-xs-4">
                      <label>
                        <input type="radio" class="login_as" name="login_as" value="student">
                       Student
                      </label>
                    </div>


                </div>
                <div class="row">
                	<div class="col-sm-12"><p id="role_error" style="color: #ff7f7f;"></p></div>
                	<div class="col-sm-12"><p id="email_pass_error" style="color: #ff7f7f;"></p></div>

                </div>

            </div>

			<div class="frm-input"><input type="text" placeholder="Email Address" class="frm-inp email"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" placeholder="Password" class="frm-inp pass"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.frm-input -->
			<!-- /.clearfix -->
			<button type="button" class="frm-submit login">Login<i class="fa fa-arrow-circle-right"></i></button>
			
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
	<script src="admin/assets/scripts/jquery.min.js"></script>
	<script src="admin/assets/scripts/modernizr.min.js"></script>
	<script src="admin/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="admin/assets/plugin/nprogress/nprogress.js"></script>
	<script src="admin/assets/plugin/waves/waves.min.js"></script>
	<script src="admin/assets/scripts/main.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#role_error').hide();
			$('#email_pass_error').hide();
			$('.login_error').hide();
			$('.login').click(function(){
				if($('.login_as').is(":checked"))
				{
					$('#role_error').hide();
					var role = $('.login_as:checked').val();
					var email = $('.email').val();
					var pass = $('.pass').val();
					var action = "login";
					if(email!='' && pass!='')
					{
						$('#email_pass_error').hide();
						$.ajax({
							url:'admin/includes/action.php',
							type:'POST',
							data:{email:email,pass:pass,role:role,login:action },
							success:function(data)
							{
								if (data=='not') { $('.login_error').show(); }
								else{ $('.login_error').hide(); window.location=data; }

							}
						});
					}
					else
					{
						$('#email_pass_error').show();
						$('#email_pass_error').text("Please Type Your Email And Password");
					}
				}
				else
				{
					$('#role_error').show();
					$('#role_error').text("Please Select Your Role");
				}
			});
		});
	</script>

</body>
</html>