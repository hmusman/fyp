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
	<!-- <link rel="stylesheet" href="admin/assets/plugin/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="admin/assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css"> -->

  <!-- external javascripts -->
  <script src="assets/jstimer/jquery-2.2.4.min.js"></script>
  <!-- <script src="js/jquery-ui.min.js"></script> -->
 
  <!-- JS | jquery plugin collection for this theme -->
  <script src="assets/jstimer/jquery-plugin-collection.js"></script>
</head>

<body>





<div class="main-menu">
	<header class="header">
    <!-- <div id="basic-coupon-clock" ></div> -->
    <a href="" class="logo"><i class="ico ti-rocket"></i>School System</a>
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
				<li><a  href="logout.php">Log Out</a></li>
			</ul>
			<!-- /.sub-ico-item -->
		</div>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->


<!-- /#message-popup -->

<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">TimeTable</h4>
		
    <table class="table" id="studentTable" style="margin-top: 25px;" >
     
			<thead> 
		        <!-- <tr style="background-color: #00aeff;">
		          <td class="text-center  " colspan="5" style="color:white; font-weight: 600; font-size: larger; " >Timing For All Batches</td>
		        </tr> -->
				<tr> 
					<th>#</th>
					<th>Class</th> 
					<th>Subject</th>
					<th>Start Time</th> 
					<th>End Time</th>
					<th>Location</th>
					
					
				</tr> 
			</thead> 
			<tbody> 
				<?php
						if(isset($_SESSION['teacher'])){ $id =  $_SESSION['id']; }
						$run = $con->execute("select * from class_teacher where teacher_id='$id'");
						$i =1;
						while ($class_teacher_data = $con->fetch_assoc($run))
						{
							$class_name = $class_teacher_data['class_name'];
							$teacher_data = $con->get_data_by_id('teacher',$class_teacher_data['teacher_id']);
							$class_data = $con->fetch_assoc($con->execute("select * from classes where name='$class_name'"));
							?>
								<tr> 
									<td><?= $i ?></td> 
									
									<td><?php  echo ucfirst($class_teacher_data['class_name']);?></td> 
									<td><?php  echo ucfirst($class_teacher_data['subject']); ?></td>
									<td><?php echo $class_teacher_data['start_time']; ?></td>
									<td><?php  echo $class_teacher_data['end_time']; ?></td>
									<td><?php echo ucfirst($class_data['location']);?></td>									
									
								</tr> 

							<?php
							$i++;
						}

					?>
				
			</tbody> 
		</table> 
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
<!-- Placed at the end of the document so the pages load faster -->
	<!-- <script src="../admin/assets/scripts/jquery.min.js"></script> -->
	
	<!-- Sparkline Chart -->
	

	<!-- Chartist Chart -->



	<!-- FullCalendar -->
<!-- 	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#teacherTable').DataTable();
			$('#reviewTable').DataTable();
			$('#classTable').DataTable();
			$('#studentTable').DataTable();
		});
	</script> -->



<script>
	 $(document).ready(function() {
    $('#basic-coupon-clock').countdown('2020/07/20', function(event) {
      $(this).html(event.strftime('%D days %H:%M:%S'));
    });
  });
</script>

<script>
  $(document).ready(function() {
   $('#basic-coupon-clock2').countdown('2020/07/20', function(event) {
     $(this).html(event.strftime('%D days %H:%M:%S'));
   });
 });
</script>
</body>
</html>