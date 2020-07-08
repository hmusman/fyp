<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Update Teacher</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<?php
							if (isset($_REQUEST['teacher_update'])) { $id = $_REQUEST['teacher_update']; }
							$data = $con->get_data_by_id('teacher',$id);
						?>
						<form>
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" value="<?= $data['name'] ?>" placeholder="Enter Name">
								<p id="name_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Name </p>
							</div>

							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" class="form-control" id="email" value="<?= $data['email'] ?>" placeholder="Enter Email Address">
								<p id="email_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Email </p>
							</div>

							<div class="form-group">
								<label for="pass">Password</label>
								<input type="password" class="form-control" id="pass" value="<?= $data['pass'] ?>" placeholder="Enter password">
								<p id="pass_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Password </p>
							</div>

							<div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" class="form-control" id="subject" value="<?= $data['subject'] ?>" placeholder="Enter Subject">
								<p id="subject_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Subject </p>
							</div>
							
							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light update_teacher" data-id=<?= $data['id'] ?>>Update Teacher</button>
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
	<?php require_once('includes/footer_script.php'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			
			$('.update_teacher').click(function(){
				if (blank_field_check($("#name"),'name') && blank_field_check($("#email"),'email') && blank_field_check($("#pass"),'pass') && blank_field_check($("#subject"),'subject')) 
				{
					teacher_add_update($(this).data('id'),$('#name'),$('#email'),$('#pass'),$('#subject'),"update_teacher");
				}
				
			});
		});
	</script>