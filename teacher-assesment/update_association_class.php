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
					<a class="waves-effect" href=""><i class="menu-icon ti-dashboard"></i><span>Dashboard</span></a>
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
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Update Class Association</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<?php
							if (isset($_REQUEST['class_association_update'])) { $id = $_REQUEST['class_association_update']; }
							$data = $con->get_data_by_id('class_teacher',$id);
						?>
						<form>
							
							<div class="form-group">
								<label for="from_time">Class Start Time</label>
								<input type="time" class="form-control" id="from_time" value="<?= date('H:i',strtotime($data['start_time']))?>">
								<p id="from_time_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Class Start Time </p>
							</div>

							<div class="form-group">
								<label for="to_time">Class End Time</label>
								<input type="time" class="form-control" id="to_time" value="<?= date('H:i',strtotime($data['end_time'])) ?>">
								<p id="to_time_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Class End Time </p>
							</div>

							
							<div class="form-group">
								<label for="shift">Shift</label>
								<select class="form-control" id="shift" >
									<option selected="" disabled="">Pleaase Select Shift</option>
									<option  <?php if($data['shift']=='morning'){ echo "selected=''"; } ?> value="morning">Morning</option>
									<option <?php if($data['shift']=='evening'){ echo "selected=''"; } ?> value="evening">Evening</option>
								</select>
								<p id="shift_error" style="color: #ff7f7f; margin-top: 15px;">Pleaase Select Shift</p>
							</div>

							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light update_class_association" data-id=<?= $data['id'] ?>>Update Class Association</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-12s col-xs-12 -->

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
		function blank_field_check(id,error)
		{
			var value = id.val();
			if(value=='')
			{
				$('#'+error+'_error').show();
				id.css('border','1px solid #ff7f7f');
				return false;
			}
			else
			{
				$('#'+error+'_error').hide();
				id.css('border','1px solid green');
				return true;
			}
		}

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
				id.css('border','1px solid green');
				return true;
			}
		}

		function class_association_update(id,start_time,end_time,shift,action)
		{
			$.ajax({
				url:"admin/includes/action.php",
				type:"post",
				data:{id:id,start_time:start_time,end_time:end_time,shift:shift,class_association_action:action},
				success:function(data)
				{
					window.location=data;
				}

			});
		}

		$(document).ready(function(){
			$('#from_time_error').hide();
			$('#to_time_error').hide();
			$('#shift_error').hide();


			$('.update_class_association').click(function(){
				if (blank_field_check($("#from_time"),'from_time') && blank_field_check($('#to_time'),'to_time') && select_check($("#shift"),'shift')) 
				{
					class_association_update($(this).data('id'),$('#from_time').val(),$('#to_time').val(),$('#shift').val(),"update_class_association");
				}
				
			});


		});
	</script>

</body>
</html>