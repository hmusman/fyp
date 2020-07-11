<?php 
	require_once('admin/includes/database.php'); 
	$con->login_session('student');
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

<style>
	@charset "UTF-8";
*, *::before, *::after {
  box-sizing: border-box;
}

.visuhide {
  position: absolute !important;
  overflow: hidden;
  width: 1px;
  height: 1px;
  clip: rect(1px, 1px, 1px, 1px);
}

.star__container:hover .star__item, .star__radio:checked ~ .star__item {
  -webkit-filter: grayscale(0);
          filter: grayscale(0);
}

.star__container:not(:hover) > .star__radio:nth-of-type(1):checked ~ .star__item:nth-of-type(1) ~ .star__item, .star__container:not(:hover) > .star__radio:nth-of-type(2):checked ~ .star__item:nth-of-type(2) ~ .star__item, .star__container:not(:hover) > .star__radio:nth-of-type(3):checked ~ .star__item:nth-of-type(3) ~ .star__item, .star__container:not(:hover) > .star__radio:nth-of-type(4):checked ~ .star__item:nth-of-type(4) ~ .star__item, .star__container:not(:hover) > .star__radio:nth-of-type(5):checked ~ .star__item:nth-of-type(5) ~ .star__item, .star__item, .star__item:hover ~ .star__item {
  -webkit-filter: grayscale(1);
          filter: grayscale(1);
}

.star__radio:nth-of-type(1):checked ~ .star__item:nth-of-type(1)::before {
  -webkit-transform: scale(1.5);
          transform: scale(1.5);
  transition-timing-function: cubic-bezier(0.5, 1.5, 0.25, 1);
}
.star__radio:nth-of-type(2):checked ~ .star__item:nth-of-type(2)::before {
  -webkit-transform: scale(1.5);
          transform: scale(1.5);
  transition-timing-function: cubic-bezier(0.5, 1.5, 0.25, 1);
}
.star__radio:nth-of-type(3):checked ~ .star__item:nth-of-type(3)::before {
  -webkit-transform: scale(1.5);
          transform: scale(1.5);
  transition-timing-function: cubic-bezier(0.5, 1.5, 0.25, 1);
}
.star__radio:nth-of-type(4):checked ~ .star__item:nth-of-type(4)::before {
  -webkit-transform: scale(1.5);
          transform: scale(1.5);
  transition-timing-function: cubic-bezier(0.5, 1.5, 0.25, 1);
}
.star__radio:nth-of-type(5):checked ~ .star__item:nth-of-type(5)::before {
  -webkit-transform: scale(1.5);
          transform: scale(1.5);
  transition-timing-function: cubic-bezier(0.5, 1.5, 0.25, 1);
}
/* .star__container {
  display: flex;
  margin: auto;
  border-radius: .25em;
  background-color: #00a39b;
  box-shadow: 0 0.25em 1em rgba(0, 0, 0, 0.25);
  transition: box-shadow .3s ease;
} */
/* .star__container:focus-within {
  box-shadow: 0 0.125em 0.5em rgba(0, 0, 0, 0.5);
} */
.star__item {
  display: inline-flex;
  width: 1.25em;
  height: 1.5em;
}
.star__item::before {
  content: "⭐️";
  display: inline-block;
  margin: auto;
  font-size: .75em;
  vertical-align: top;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transform-origin: 50% 33.3%;
          transform-origin: 50% 33.3%;
  transition: -webkit-transform .3s ease-out;
  transition: transform .3s ease-out;
  transition: transform .3s ease-out, -webkit-transform .3s ease-out;
}

</style>

<body>

<div class="main-menu">
	<header class="header">
		<a href="" class="logo"><i class="ico ti-rocket"></i>School System</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">

		<!-- navigation start   -->
		<div class="navigation">
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href=""><i class="menu-icon ti-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li>
					<a class="waves-effect" href="rating_comment.php"><i class="menu-icon ti-calendar"></i><span>Rating and Comments</span></a>
				</li>
				
				<li>
					<a class="waves-effect" href="student_time_table.html"><i class="menu-icon ti-calendar"></i><span>Time Table</span></a>
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
					<h4 class="box-title" style="background: #3F51B5;">Add Comment and Rating</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<?php
							if (isset($_SESSION['student'])) { $id = $_SESSION['id']; }
							$data = $con->get_data_by_id('student',$id);
							$class_id = $data['class_id'];
							$class_data = $con->fetch_assoc($con->execute("select * from classes where id='$class_id'"));
							$class_name = $class_data['name'];
							$q = "SELECT teacher.id , teacher.name FROM class_teacher join teacher on class_teacher.teacher_id = teacher.id where class_teacher.class_name='$class_name'";
							$run = $con->execute($q);
						?>
						<form>
							<!-- <div class="form-group">
								<label for="exampleInputName">Class</label>
								<select class="form-control" id="class">
									<option selected="" disabled="" >Select Class</option>
									<option value="<?= $class_data['name'] ?>"><?= $class_data['name']; ?></option>
								</select>
								 <p id="class_error" style="color: #ff7f7f; margin-top:10px;">Please Select Class </p>

							</div> -->

							<div class="form-group">
								<label for="">Teacher</label>
								<select class="form-control" id="teacher">
									<option selected="" disabled="" >Select Teacher</option>
									<?php
										while ($teacher_data= $con->fetch_assoc($run))
										{
											?><option value="<?= $teacher_data['id'] ?>"> <?= $teacher_data['name'] ?></option><?php
										}
									?>
									
								</select>
								 <p id="teacher_error" style="color: #ff7f7f; margin-top: 10px;">Please Select Teacher </p>

							</div>

							<div class="form-group">
								<span class="star__container">
									<input type="radio" name="rating" value="1" id="star-1" class="star__radio visuhide">
									<input type="radio" name="rating" value="2" id="star-2" class="star__radio visuhide">
									<input type="radio" name="rating" value="3" id="star-3" class="star__radio visuhide">
									<input type="radio" name="rating" value="4" id="star-4" class="star__radio visuhide">
									<input type="radio" name="rating" value="5" id="star-5" class="star__radio visuhide">
								  	<input type="hidden" id="student" value="<?= $id ?>">
								  	<input type="hidden" id="class" value="<?= $class_data['name'] ?>">
									<label class="star__item" for="star-1"><span class="visuhide">1 star</span></label>
									<label class="star__item" for="star-2"><span class="visuhide">2 stars</span></label>
									<label class="star__item" for="star-3"><span class="visuhide">3 stars</span></label>
									<label class="star__item" for="star-4"><span class="visuhide">4 stars</span></label>
									<label class="star__item" for="star-5"><span class="visuhide">5 stars</span></label>
								 </span>
								 <p id="rating_error" style="color: #ff7f7f; margin-top: 5px;">Please Select Star</p>
							</div>
							
							<div class="form-group">
								<label for="comment">Comment</label>
								<textarea class="form-control" id="comment" placeholder="Please Leave Your Comment...."></textarea>
								 <p id="comment_error" style="color: #ff7f7f; margin-top: 10px;">Please Leave Your Comment </p>

							</div>
							
							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light rating_comment">Add</button>
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
	<script src="admin/assets/scripts/main.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$('#class_error').hide();
			$('#teacher_error').hide();
			$('#rating_error').hide();
			$('#comment_error').hide();
			$('.rating_comment').click(function(){
				$('#rating_error').hide();
				var check = true;
				var rate = $('.star__radio:checked').val();
				var class_id = $('#class').val();
				var teacher_id = $('#teacher').val();
				var student_id  = $('#student').val();
				var comment = $('#comment').val();
				var action = "student_review";
				if(teacher_id ==null){check=false; $('#teacher_error').show();} else{ check=true; $('#teacher_error').hide(); }
				if(!$('.star__radio').is(":checked")){ check=false; $('#rating_error').show();} else{ check=true; $('#rating_error').hide(); }
				if (comment=='') {check=false; $('#comment_error').show();} else{ check=true; $('#comment_error').hide(); }
				if(check)
				{
					$.ajax({
						url:"admin/includes/action.php",
						type:"post",
						data:{class_name:class_id,teacher_id:teacher_id,student_id:student_id,rating:rate,comment:comment,student_review:action },
						success:function(data)
						{
							if (data=="You Have Already Left Comment")
							{
								swal({
								    title: "",
								    text: data,
								    type: "warning",
								    confirmButtonColor: '#3F51B5',
								    confirmButtonText: 'Ok',
								    closeOnConfirm: false,
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
								   		window.location="rating_comment.php";
								    } 
								 });
							}
						}
					});
				}

			});
		});

	</script>

</body>
</html>