<?php 
	require_once('admin/includes/database.php'); 
	$con->login_session('teacher');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Final Year Project</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="admin/assets/styles/style.min.css">
	
	<!-- Themify Icon -->
	<link rel="stylesheet" href="admin/assets/fonts/themify-icons/themify-icons.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="admin/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="admin/assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="admin/assets/plugin/sweet-alert/sweetalert.css">
	
	<!-- Percent Circle -->
	<link rel="stylesheet" href="admin/assets/plugin/percircle/css/percircle.css">

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="admin/assets/plugin/chart/chartist/chartist.min.css">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="admin/assets/plugin/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="admin/assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">

</head>

<body>

<div class="main-menu">
	<header class="header">
		<a href="" class="logo"><i class="ico ti-rocket"></i>SpaceX</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">

		<!-- navigation start   -->
		<div class="navigation">
			<h5 class="title">Navigation</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href=""><i class="menu-icon ti-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li>
					<a class="waves-effect" href="reviews.phpl"><i class="menu-icon ti-calendar"></i><span>Comment and Rating</span></a>
				</li>
				
			</ul>

			
		</div>
		<!-- /.navigation end -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Home</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item ti-search js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="ti-search button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<a href="#" class="ico-item ti-email notice-alarm js__toggle_open" data-target="#message-popup"></a>
		<a href="#" class="ico-item ti-bell notice-alarm js__toggle_open" data-target="#notification-popup"></a>
		<div class="ico-item">
			<i class="ti-user"></i>
			<ul class="sub-ico-item">
				<li><a href="logout.php">Log Out</a></li>
			</ul>
			<!-- /.sub-ico-item -->
		</div>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="notification-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">Your Notifications</h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">10 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
					<span class="name">Anna William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">15 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-warning"><i class="fa fa-warning"></i></span>
					<span class="name">Update Status</span>
					<span class="desc">Failed to get available update data. To ensure the please contact us.</span>
					<span class="time">30 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
					<span class="name">Jennifer</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
					<span class="name">Michael Zenaty</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">50 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
					<span class="name">Simon</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">1 hour</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-violet"><i class="fa fa-flag"></i></span>
					<span class="name">Account Contact Change</span>
					<span class="desc">A contact detail associated with your account has been changed.</span>
					<span class="time">2 hours</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
					<span class="name">Helen 987</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">Yesterday</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
					<span class="name">Denise Jenny</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">Oct, 28</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
					<span class="name">Thomas William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">Oct, 27</span>
				</a>
			</li>
		</ul>
		<!-- /.notice-list -->
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>
<!-- /#notification-popup -->

<div id="message-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">Recent Messages<a href="#" class="pull-right text-danger">New message</a></h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">10 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
					<span class="name">Harry Halen</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">15 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
					<span class="name">Thomas Taylor</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">30 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
					<span class="name">Jennifer</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
					<span class="name">Helen Candy</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
					<span class="name">Anna Cavan</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 hour ago</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-success"><i class="fa fa-user"></i></span>
					<span class="name">Jenny Betty</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 day ago</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
					<span class="name">Denise Peterson</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 year ago</span>
				</a>
			</li>
		</ul>
		<!-- /.notice-list -->
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>
<!-- /#message-popup -->

<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">Teacher Review</h4>
		<div class="col-md-12 table-responsive months">

			<div class="col-md-3 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="student_class" class="form-control">
					<option selected=""  disabled="">Select Class</option>
					<option>9th</option>
					<option>10th</option>
				</select>
			</div>

			<div class="col-md-3 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="month" class="form-control">
					<option selected="" disabled="">Select Month</option>
					<option>Jan</option>
					<option>Feb</option>
					<option>Mar</option>
					<option>Apr</option>
					<option>May</option>
					<option>Jun</option>
					<option>July</option>
					<option>Aug</option>
					<option>Sept</option>
					<option>Oct</option>
					<option>Nov</option>
					<option>Dec</option>
					
				</select>
			</div>

			<div class="col-md-3" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="week" class="form-control">
					<option selected="" disabled="">Select Weeks</option>
					<option>First Week</option>
					<option>Second Week</option>
					<option>Third Week</option>
					<option>Fourth Week</option>
				
				</select>
			</div>

			<div class="col-md-3" style="margin-top: 5px; margin-bottom: 5px;">
				<button class="btn btn-info">Filter</button>
			</div>
			
		</div>


		<table class="table" id="studentTable" style="margin-top: 25px;" >
			<thead> 
				<tr> 
					<th>#</th>
					<th>Teacher</th> 
					<th>Class</th> 
					<th>Comment</th>
					<th>Rating</th>
					
					
				</tr> 
			</thead> 
			<tbody> 
				<tr> 
					<td>1</td> 

					<td>Teacher1</td> 
					<td>9th</td>
					<td>
						<p>he is a good teacher</p>
					</td>
					
					<td>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</td>
					
				</tr> 

				<tr> 
					<td>2</td> 
					<td>Teacher2</td> 
					<td>10th</td>
					<td>
						<p>he is a good teacher</p>
					</td>
					<td>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</td>
					
					
				</tr> 
				
			</tbody> 
		</table> 
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
<!-- Placed at the end of the document so the pages load faster -->
	<script src="../admin/assets/scripts/jquery.min.js"></script>
	<script src="../admin/assets/scripts/modernizr.min.js"></script>
	<script src="../admin/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="../admin/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../admin/assets/plugin/nprogress/nprogress.js"></script>
	<script src="../admin/assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="../admin/assets/plugin/waves/waves.min.js"></script>
	<!-- Sparkline Chart -->
	<script src="../admin/assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
	<script src="../admin/assets/scripts/chart.sparkline.init.min.js"></script>

	<!-- Percent Circle -->
	<script src="../admin/assets/plugin/percircle/js/percircle.js"></script>

	<!-- Google Chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- Chartist Chart -->
	<script src="../admin/assets/plugin/chart/chartist/chartist.min.js"></script>
	<script src="../admin/assets/scripts/jquery.chartist.init.min.js"></script>

	<!-- FullCalendar -->
	<script src="../admin/assets/plugin/moment/moment.js"></script>
	<script src="../admin/assets/plugin/fullcalendar/fullcalendar.min.js"></script>
	<script src="../admin/assets/scripts/fullcalendar.init.js"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

	<script src="../admin/assets/scripts/main.min.js"></script>
	<script type="text/javascript">
	
		$(document).ready(function(){
			// $('.weeks').hide();
			// $('.teachers').hide();
			// $('.students_rating').hide();

			$('.assign_class').click(function(){
				var teacher_id = $(this).data('id');
				var class_name = $('#class_name'+teacher_id).children('option:selected').val();
				var submit = "submit";
				
				if (class_name=="Select Class") {
					swal("Please Select Any Class");
				}
				else
				{
					$.ajax({
						type:"post",
						url:"includes/action.php",
						data:{teacher_id:teacher_id,class_name:class_name,submit:submit},
						success:function(data)
						{
							if (data=="This class has been already assigned")
							{
								swal({
								    title: "",
								    text:data,
								    type: "warning",
								    confirmButtonColor: '#3F51B5',
								    confirmButtonText: 'Ok',
								    closeOnConfirm: false,
								 },
								 function(isConfirm){

								   if (isConfirm){
								     location.reload();

								    } 
								 });
							}
							else
							{
								swal({
								    title: "",
								    text: data,
								    type: "success",
								    confirmButtonColor: '#3F51B5',
								    confirmButtonText: 'Ok',
								    closeOnConfirm: false,
								 },
								 function(isConfirm){

								   if (isConfirm){
								   		location.reload();
								    } 
								 });
							}
							
						}
					});
				}
			});

			// $('#student_class').change(function(){
			// 	var value = $('#student_class option:selected').text();
			// 	if (value=="9th") 
			// 	{ window.location = "9th_class.php"; }
			// 	else if(value=="10th")
			// 	{
			// 		window.location = "10th_class.php";
			// 	}
			// });

			// $('#month').change(function(){
			// 	var value = $('#month option:selected').text();
			// 	$('.months').hide();
			// 	$('.weeks').show();

			// });

			// $('#week').change(function(){
			// 	var value = $('#week option:selected').text();
			// 	$('.weeks').hide();
			// 	$('.teachers').show();

			// });

			// $('#week').change(function(){
			// 	var value = $('#week option:selected').text();
			// 	$('.weeks').hide();
			// 	$('.teachers').show();

			// });

			// $('#teacher').change(function(){
			// 	var value = $('#week option:selected').text();
			// 	$('.teachers').hide();
			// 	$('.students_rating').show();

			// });
		});


	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#teacherTable').DataTable();
			$('#reviewTable').DataTable();
			$('#classTable').DataTable();
			$('#studentTable').DataTable();
		});
	</script>
</body>
</html>