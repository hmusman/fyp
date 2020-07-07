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
					<option selected=""  disabled="">Select Class</option>
					<option>9th</option>
					<option>10th</option>
				</select>
			</div>

			<div class="col-md-2 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="month" class="form-control">
					<option selected="" disabled="">Select Month</option>
					<option>Jan</option>
					<option>Feb</option>
					<option>Mar</option>
					<option>Apr</option>
					<option>May</option>
					<option>Jun</option>
					<option>July</option>
					<option>Aug</option>
					<option>Sept</option>
					<option>Oct</option>
					<option>Nov</option>
					<option>Dec</option>
					
				</select>
			</div>

			<div class="col-md-3" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="week" class="form-control">
					<option selected="" disabled="">Select Weeks</option>
					<option>First Week</option>
					<option>Second Week</option>
					<option>Third Week</option>
					<option>Fourth Week</option>
				
				</select>
			</div>

			<div class="col-md-3" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="teacher" class="form-control">
					<option selected="" disabled="">Select Teachers</option>
					<option>Teacher1</option>
					<option>Teacher2</option>
					
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