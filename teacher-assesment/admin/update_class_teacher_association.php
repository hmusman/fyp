<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Update Class Teacher Association</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<?php
							if (isset($_REQUEST['class_teacher_association_update'])) { $id = $_REQUEST['class_teacher_association_update']; }
							$data = $con->get_data_by_id('class_teacher',$id);
						?>
						<form>
							<div class="form-group">
								<label for="class">Class</label>
								<select class="form-control" id="class" >
									<option selected="" disabled="">Pleaase Select Class</option>
									<?php
										$run_class = $con->execute("select * from classes");
										while ($class_data = $con->fetch_assoc($run_class))
										{
											?>
												<option <?php if($class_data['name']==$data['class_name']){ echo "selected=''"; } ?>  value="<?= $class_data['name'] ?>"><?= ucwords($class_data['name']) ?></option>
											<?php
										}

									?>
								</select>
								<p id="class_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Class</p>
							</div>

							<div class="form-group">
								<label for="teacher">Teacher</label>
								<select class="form-control" id="teacher" >
									<option selected="" disabled="">Pleaase Select Teacher</option>
									<?php
										$run_teacher = $con->execute("select * from teacher");
										while ($teacher_data = $con->fetch_assoc($run_teacher))
										{
											?>
												<option <?php if($teacher_data['id']==$data['teacher_id']){ echo "selected=''"; } ?> value="<?= $teacher_data['id'] ?>"><?= ucwords($teacher_data['name']) ?></option>
											<?php
										}

									?>
								</select>
								<p id="teacher_error" style="color: #ff7f7f; margin-top: 15px;">Pleaase Select Teacher</p>
							</div>

							<div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" class="form-control" id="subject" placeholder="Enter Subject" value="<?= $data['subject'] ?>">
								<p id="subject_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Subject </p>
							</div>

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

							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light update_class_teacher_association" data-id=<?= $data['id'] ?>>Update Class Teacher Association</button>
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
			select_check($('#class'),'class');
			select_check($('#teacher'),'teacher');
			select_check($('#shift'),'shift');
			blank_field_check($('#subject'),'Characters','subject',/^[a-zA-Z]/,4,20);
			time_blank_check($('#from_time'),'from_time');
			time_blank_check($('#to_time'),'to_time');
			$('.update_class_teacher_association').click(function(){
				if ($("#class_error").is(":hidden") && $("#teacher_error").is(":hidden") && $("#subject_error").is(":hidden") && $("#from_time_error").is(":hidden") && $("#to_time_error").is(":hidden") && $("#shift_error").is(":hidden")) 
				{
					class_teacher_association_add_update($(this).data('id'),$('#class').val(),$('#teacher').val(),$('#subject').val(),$('#from_time').val(),$('#to_time').val(),$('#shift').val(),"update_class_teacher_association");
				}
				
			});
		});
	</script>