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
		<a href="" class="logo"><i class="ico ti-rocket"></i>School System </a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">

		<!-- navigation start   -->
		<div class="navigation">
			<img src="admin/uploads/teacher/<?= $_SESSION['img'] ?>" style="width: 100%;margin-top: 10px;margin-bottom: 10px;height: 130px;">
			<h4 style="margin-left: 5px;margin-bottom:17px;font-size: 16px;color: #000;"><?= $_SESSION['name'] ?></h4>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href="reviews.php"><i class="menu-icon ti-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li>
					<a class="waves-effect" href="reviews.php"><i class="menu-icon ti-calendar"></i><span>Comment and Rating</span></a>
				</li>

				<li>
					<a class="waves-effect" href="association_classes.php"><i class="menu-icon ti-calendar"></i><span>Association Classes</span></a>
				</li>

				<li>
					<a class="waves-effect" href="teacher_time_table.php"><i class="menu-icon ti-calendar"></i><span>Time Table</span></a>
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

<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">Reviews</h4>
		
		<!-- <div class="col-md-4 table-responsive">
			<select id="student_class" class="form-control">
				<option selected=""  disabled="">Select Class</option>
				<option>9th</option>
				<option>10th</option>
			</select>
		</div> -->


		<div class="row table-responsive months">

			<div class="col-md-4 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="student_class" class="form-control">
					<?php 
						if(isset($_SESSION['teacher'])){ $id =  $_SESSION['id']; }
						$run = $con->execute("select distinct(class_name) from class_teacher where teacher_id='$id'");
					?>
					<option selected=""  disabled="">Select Class</option>
					<?php 
						while ($class_data = $con->fetch_assoc($run))
						{
							?><option value="<?= str_replace(' ' ,'_',$class_data['class_name']) ?>"><?= $class_data['class_name'] ?></option><?php
						}
					?>
					
				</select>
				<p id="class_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Class</p>
			</div>

			<div class="col-md-4" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="subject" class="form-control">
			
				</select>
				<p id="subject_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Subject</p>
			</div>

			<div class="col-md-4 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="location" class="form-control">
					
				</select>
				<p id="location_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Location</p>
			</div>
			
		</div>

		<div class="row table-responsive months">

			<div class="col-md-4" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="shift" class="form-control">
			
				</select>
				<p id="shift_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Shift</p>
			</div>
			

			<div class="col-md-4" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="week" class="form-control">
					<option selected="" disabled="">Select Weeks</option>
					<option value="First Week">First Week</option>
					<option value="Second Week">Second Week</option>
					<option value="Third Week">Third Week</option>
					<option value="Fourth Week">Fourth Week</option>
				
				</select>
				<p id="week_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Week</p>
			</div>

			<div class="col-md-4 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="month" class="form-control">
					<option selected="" disabled="">Select Month</option>
					<option value="Jan">Jan</option>
					<option value="Feb">Feb</option>
					<option value="Mar">Mar</option>
					<option value="Apr">Apr</option>
					<option value="May">May</option>
					<option value="Jun">Jun</option>
					<option value="Jul">Jul</option>
					<option value="Aug">Aug</option>
					<option value="Sept">Sept</option>
					<option value="Oct">Oct</option>
					<option value="Nov">Nov</option>
					<option value="Dec">Dec</option>
					
				</select>
				<p id="month_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Month</p>
			</div>
			
			
		</div>

		<div class="row">
			<div class="col-md-2" style="margin-top: 5px; margin-bottom: 5px;">
				<button class="btn btn-info filter">Filter</button>
			</div>
		</div>

		<div class="studentReviews">
			 
		</div>
		
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
<!-- Placed at the end of the document so the pages load faster -->
	<script src="admin/assets/scripts/jquery.min.js"></script>
	<script src="admin/assets/scripts/modernizr.min.js"></script>
	<script src="admin/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="admin/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="admin/assets/plugin/nprogress/nprogress.js"></script>
	<script src="admin/assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="admin/assets/plugin/waves/waves.min.js"></script>
	<!-- Sparkline Chart -->
	<script src="admin/assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
	<script src="admin/assets/scripts/chart.sparkline.init.min.js"></script>

	<!-- Percent Circle -->
	<script src="admin/assets/plugin/percircle/js/percircle.js"></script>

	<!-- Google Chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- Chartist Chart -->
	<script src="admin/assets/plugin/chart/chartist/chartist.min.js"></script>
	<script src="admin/assets/scripts/jquery.chartist.init.min.js"></script>

	<!-- FullCalendar -->
	<script src="admin/assets/plugin/moment/moment.js"></script>
	<script src="admin/assets/plugin/fullcalendar/fullcalendar.min.js"></script>
	<script src="admin/assets/scripts/fullcalendar.init.js"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

	<script src="admin/assets/scripts/main.min.js"></script>
	<script type="text/javascript">
		function select_check(id,error)
		{
			if (id.val()==null)
			{ 
				$("#"+error+"_error").show();
				return false;
			}
			else
			{
				$("#"+error+"_error").hide();
				return true;
			}
		}

		$(document).ready(function(){
			$('#class_error').hide();
			$('#location_error').hide();
			$('#subject_error').hide();
			$('#shift_error').hide();
			$('#month_error').hide();
			$('#week_error').hide();			
			$('.filter').click(function(){

				if(select_check($('#student_class'),"class") && select_check($('#subject'),"subject") && select_check($('#location'),"location") && select_check($('#shift'),"shift") && select_check($('#week'),"week") && select_check($('#month'),"month"))
				{ 
					var class_name = $('#student_class').val();
					var month = $('#month').val();
					var week = $('#week').val();
					var teacher = <?php if(isset($_SESSION['teacher'])){ echo $_SESSION['id']; } ?>;
					var action = "teacher_filter";
					$.ajax({
						url:"admin/includes/action.php",
						type:"post",
						data:{class_name:$('#student_class').val(),month:$('#month').val(),week:$('#week').val(),teacher_id:teacher,subject:$('#subject').val(),location:$('#location').val(),shift:$('#shift').val(),filtering:"teacher_filter"},
						success:function(data)
						{
							$('.studentReviews').html(data);
						}
					});
				}

			});

			$('#student_class').change(function(){
				var class_name= $('#student_class').val();
				var teacher = <?php if(isset($_SESSION['teacher'])){ echo $_SESSION['id']; } ?>;
				var action ="class_teacher";
				$.ajax({
					url:"admin/includes/action.php",
					type:"post",
					data:{class_name:class_name,class_location:action},
					success:function(data)
					{
						$('#location').html(data);
					}
				});

				$.ajax({
					url:"admin/includes/action.php",
					type:"post",
					data:{class_name:class_name,teacher_id:teacher,class_teacher_subject:action},
					success:function(data)
					{
						$('#subject').html(data);
					}
				});

				$.ajax({
					url:"admin/includes/action.php",
					type:"post",
					data:{class_name:class_name,class_shift:action},
					success:function(data)
					{
						$('#shift').html(data);
					}
				})
			});


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