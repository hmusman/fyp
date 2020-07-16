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
								<label for="cnic">Identity Card Number</label>
								<input type="text" class="form-control" id="cnic" maxlength="13" value="<?= $data['cnic'] ?>" placeholder="Enter Identity Card Number Without Dash">
								<p id="cnic_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Identity Card Number </p>
							</div>

							<div class="form-group">
								<label for="phone">Mobile Number</label>
								<input type="text" class="form-control" id="phone" value="<?= $data['phone'] ?>" maxlength="11" placeholder="Enter Mobile Number ">
								<p id="phone_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Mobile Number  </p>
							</div>

							<div class="form-group">
								<label for="experience">Teaching Experience</label>
								<input type="text" class="form-control" id="experience" value="<?= $data['experience'] ?>" placeholder="Enter Experience ">
								<p id="experience_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Experience  </p>
							</div>

							<div class="form-group">
								<label for="salary">Salary</label>
								<input type="text" class="form-control" id="salary" value="<?= $data['salary'] ?>" placeholder="Enter Salary ">
								<p id="salary_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Salary  </p>
							</div>
							
							<div class="form-group">
								<label for="education">Latest Education</label>
								<select class="form-control" id="education" >
									<option selected="" disabled="">Pleaase Select Latest Degree</option>
									<option <?php if($data['education']==14){ echo "selected=''"; } ?> value="14">B.A / B.sc</option>
									<option <?php if($data['education']==16){ echo "selected=''"; } ?> value="16">M.sc / BS(Hons)</option>
									<option <?php if($data['education']==18){ echo "selected=''"; } ?> value="18">Mphil / M.sc(Hons)</option>
									<option <?php if($data['education']==21){ echo "selected=''"; } ?> value="21">Phd</option>
								</select>
								<p id="education_error" style="color: #ff7f7f; margin-top: 15px;">Pleaase Select Latest Degree</p>
							</div>

							<div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" class="form-control" id="subject" value="<?= $data['subject'] ?>" placeholder="Enter Subject">
								<p id="subject_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Subject </p>
							</div>

							<div class="form-group">
								<label >Image</label>
								<input type="file" id="img">
								<?php 
									if ($data['img']!=null)
									{
										?> <img src="uploads/teacher/<?= $data['img'] ?>" style="width: 100px; height: 100px; margin-top: 5px;"> <?php
									}
								?>
								<p id="img_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Image </p>

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
			$('#img_error').hide();
			blank_field_check($('#name'),'Characters','name',/^[a-zA-Z]/,2,5);
			blank_field_check($('#email'),'Email Addresses','email',/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,5,50);
			blank_field_check($('#cnic'),'Numbers','cnic',/^[0-9]/,13,13);
			blank_field_check($('#phone'),'Numbers','phone',/^[0-9]/,11,11);
			blank_field_check($('#experience'),'Characters And Numbers','experience',/^[a-zA-Z0-9]/,6,7);
			blank_field_check($('#salary'),'Numbers','salary',/^[0-9]/,4,6);
			select_check($('#education'),'education');
			blank_field_check($('#subject'),'Characters','subject',/^[a-zA-Z]/,4,20);
			blank_field_check($('#img'),'img');
			$('.update_teacher').click(function(){
				if ($("#name_error").is(":hidden") && $("#email_error").is(":hidden") && $("#cnic_error").is(":hidden") && $("#phone_error").is(":hidden") && $("#experience_error").is(":hidden") && $("#salary_error").is(":hidden") && $("#education_error").is(":hidden") && $("#subject_error").is(":hidden") && $("#img_error").is(":hidden")) 
				{
					teacher_add_update($(this).data('id'),'',$('#name').val(),$('#email').val(),$('#cnic').val(),$('#phone').val(),$('#experience').val(),$('#salary').val(),$('#education').val(),$('#subject').val(),$('#img')[0].files[0],"update_teacher");
				}
				
			});
		});
	</script>