<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Update Class</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<?php
							if(isset($_REQUEST['class'])){ $id = $_REQUEST['class']; }
							$data = $con->get_data_by_id('classes',$id);
						?>
						<form>
							<div class="form-group">
								<label for="name">Class Name</label>
								<input type="text" class="form-control" id="name" placeholder="Enter Class Name" value="<?= $data['name'] ?>">
								<p id="name_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Class Name </p>
							</div>

							<div class="form-group">
								<label for="section">Class Section</label>
								<input type="text" class="form-control" id="section" placeholder="Enter Class Section" value="<?= $data['section'] ?>">
								<p id="section_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Section </p>
							</div>

							<div class="form-group">
								<label for="student">Number Of Student</label>
								<input type="text" class="form-control" id="student" placeholder="Enter Number of Students " value="<?= $data['student'] ?>">
								<p id="student_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Number Of Student</p>
							</div>

							<div class="form-group">
								<label for="timing">Class Time</label>
								<select type="text" class="form-control" id="timing">
									<option selected="" disabled="">Select Class Time</option>
									<option <?php if($data['timing']=="morning"){ echo "selected=''"; } ?> value="morning">Morning</option>
									<option <?php if($data['timing']=="evening"){ echo "selected=''"; } ?> value="evening">Evening</option>
								</select>
								<p id="timing_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Class Time</p>
							</div>

							<div class="form-group">
								<label for="location">Class Location</label>
								<textarea type="text" class="form-control" id="location" placeholder="Enter Class Location"><?= $data['location'] ?></textarea>
								<p id="location_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Location</p>
							</div>
							
							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light update_class" data-id="<?= $data['id'] ?>">Update Class</button>
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
			$('#name_error').hide();
			$('#section_error').hide();
			$('#location_error').hide();
			$('#student_error').hide();
			$('#timing_error').hide();
			blank_field_check($('#name'),'Characters','name',/^[a-zA-Z]/,2,5);
			blank_field_check($('#section'),'Characters','section',/^[a-zA-Z]/,1,5);
			blank_field_check($('#student'),'Numbers','student',/^[0-9]/,2,4);
			blank_field_check($('#location'),'Characters And Numbers','location',/^[a-zA-Z0-9]/,5,10);
			select_check($('#timing'),'timing');
			$('.update_class').click(function(){
				if($("#name_error").is(":hidden") && $("#section_error").is(":hidden") && $("#student_error").is(":hidden") && $("#location_error").is(":hidden") && $("#timing_error").is(":hidden"))
				{
					class_add_update($(this).data('id'),$('#name').val(),$('#section').val(),$('#location').val(),$('#student').val(),$('#timing').val(),'update_class');
				}
			});
		});
	</script>