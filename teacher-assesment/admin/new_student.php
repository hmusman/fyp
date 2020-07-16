<?php 
	require_once('includes/header.php');
?>


<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Add Student</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form>

							<div class="form-group">
								<label >UserName</label>
								<input type="text" disabled="" class="form-control" id="username" value="<?php if(isset($_REQUEST['username'])){ echo($_REQUEST['username']); }?>">
							</div>

							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" placeholder="Enter Name">
								<p id="name_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Name </p>
							</div>

							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" class="form-control" id="email" placeholder="Enter Email Address">
								<p id="email_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Email </p>
							</div>

							<div class="form-group">
								<label for="addmission_date">Select Admission Date</label>
								<input type="date" class="form-control" id="admission_date">
								<p id="admission_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Admission Date </p>
							</div>

							<div class="form-group">
								<label for="subject">Class</label>
								<select class="form-control" id="class">
									<option selected="" disabled="">Select Class</option>
									<?php 
										$run = $con->execute("select * from classes");
										while ($class_data = $con->fetch_assoc($run))
										{
											?><option value="<?= $class_data['id'] ?>"> <?= $class_data['name'] ?></option><?php
										}
									?>
								</select>
								<p id="class_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Class </p>
							</div>
							
							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light add_student">Add Student</button>
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
			blank_field_check($('#name'),'Characters','name',/^[a-zA-Z]/,2,5);
			blank_field_check($('#email'),'Email Addresses','email',/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,5,50);
			time_blank_check($('#admission_date'),'admission');
			select_check($('#class'),'class');

			$('.add_student').click(function(){
				if ($("#name_error").is(":hidden") && $("#email_error").is(":hidden") && $("#admission_error").is(":hidden") && $("#class_error").is(":hidden")) 
				{
					student_add_update(0,$('#username').val(),$('#name').val(),$('#email').val(),$('#admission_date').val(),$('#class').val(),"add_student");
				}
				
			});
		});
	</script>