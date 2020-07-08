<?php 
	require_once('includes/header.php');
?> 

<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">Students</h4>
		
		<!-- <div class="col-md-4 table-responsive">
			<select id="student_class" class="form-control">
				<option selected=""  disabled="">Select Class</option>
				<option>9th</option>
				<option>10th</option>
			</select>
		</div> -->


		<div class="col-md-12 table-responsive months">

			<div class="col-md-2 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="student_class" class="form-control">
					<?php 
						$run = $con->execute("select * from classes");
					?>
					<option selected=""  disabled="">Select Class</option>
					<?php 
						while ($class_data = $con->fetch_assoc($run))
						{
							?><option value="<?= str_replace(' ' ,'_',$class_data['name']) ?>"><?= $class_data['name'] ?></option><?php
						}
					?>
					
				</select>
			</div>

			<div class="col-md-2 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
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
			</div>

			<div class="col-md-3" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="week" class="form-control">
					<option selected="" disabled="">Select Weeks</option>
					<option value="First Week">First Week</option>
					<option value="Second Week">Second Week</option>
					<option value="Third Week">Third Week</option>
					<option value="Fourth Week">Fourth Week</option>
				
				</select>
			</div>

			<div class="col-md-3 teacher_option" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="teacher" class="form-control">
					
					
				</select>
			</div>

			<div class="col-md-2" style="margin-top: 5px; margin-bottom: 5px;">
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
						<th>Action</th> 
						
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

						<td>
							<a href =""class="btn btn-danger btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-trash"></i></a>
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
						<td>
							<a href =""class="btn btn-danger btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-trash"></i></a>
						</td> 
						
					</tr> 
					
				</tbody> 
			</table> 
		
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
<!-- Placed at the end of the document so the pages load faster -->
	<?php require_once('includes/footer_script.php'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.teacher_option').hide();

			$('#student_class').change(function(){
				var class_name= $('#student_class').val();
				var action ="class_teacher";
				$.ajax({
					url:"includes/action.php",
					type:"post",
					data:{class_name:class_name,class_teacher:action},
					success:function(data)
					{
						$('.teacher_option').show();
						$('#teacher').html(data);
					}
				})
			});
		});
	</script>