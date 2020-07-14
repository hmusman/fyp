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


		<div class="row table-responsive months">

			<div class="col-md-4 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
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
				<p id="class_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Class</p>
			</div>

			<div class="col-md-4 teacher_option" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="teacher" class="form-control">
					
					
				</select>
				<p id="teacher_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Teacher</p>
			</div>

			<div class="col-md-4 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="location" class="form-control">
					
				</select>
				<p id="location_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Location</p>
			</div>
			
		</div>

		<div class="row table-responsive months">

			<div class="col-md-4" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="shift" class="form-control">
			
				</select>
				<p id="shift_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Shift</p>
			</div>

			<div class="col-md-4" style="margin-top: 5px; margin-bottom: 5px;">
				<select id="week" class="form-control">
					<option selected="" disabled="">Select Weeks</option>
					<option value="First Week">First Week</option>
					<option value="Second Week">Second Week</option>
					<option value="Third Week">Third Week</option>
					<option value="Fourth Week">Fourth Week</option>
				
				</select>
				<p id="week_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Week</p>
			</div>

			<div class="col-md-4 mt-5" style="margin-top: 5px; margin-bottom: 5px;">
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
				<p id="month_error" style="color: #ff7f7f; margin-top: 7px;">Please Select Month</p>
			</div>
			
		</div>

		<div class="row">
			<div class="col-md-2" style="margin-top: 5px; margin-bottom: 5px;">
				<button class="btn btn-info filter">Filter</button>
			</div>
		</div>


			<div class="studentReviews">
				 
			</div>
		
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
<!-- Placed at the end of the document so the pages load faster -->
	<?php require_once('includes/footer_script.php'); ?>
	<script type="text/javascript">
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
				return true;
			}
		}

		function review_delete(id)
		{
			var action = "review_delete";
			swal({
			    title: "Are you sure?",
			    text: "You will not be able to recover this comment!",
			    type: "warning",
			    showCancelButton: true,
			    confirmButtonColor: '#DD6B55',
			    confirmButtonText: 'Yes, I am sure!',
			    cancelButtonText: "No, cancel it!",
			    closeOnConfirm: true,
			    closeOnCancel: true
			 },
			 function(isConfirm){
			   if (isConfirm){
			   		var class_name = $('#student_class').val();
					var month = $('#month').val();
					var week = $('#week').val();
					var teacher = $('#teacher').val();
					var action = "admin_filter";
					$.ajax({
						url:"includes/action.php",
						type:"post",
						data:{id:id,class_name:class_name,month:month,week:week,teacher_id:teacher,review_delete:action},
						success:function(data)
						{
							$('.studentReviews').html(data);
						}
					});
			    }
			 });
		}

		$(document).ready(function(){
			// $('.teacher_option').hide();
			$('#class_error').hide();
			$('#month_error').hide();
			$('#week_error').hide();
			$('#teacher_error').hide();
			
			$('.filter').click(function(){

				if(select_check($('#student_class'),"class") && select_check($('#month'),"month") && select_check($('#week'),"week") && select_check($('#teacher'),"teacher"))
				{ 
					var class_name = $('#student_class').val();
					var month = $('#month').val();
					var week = $('#week').val();
					var teacher = $('#teacher').val();
					var action = "admin_filter";
					$.ajax({
						url:"includes/action.php",
						type:"post",
						data:{class_name:class_name,month:month,week:week,teacher_id:teacher,filtering:action},
						success:function(data)
						{
							$('.studentReviews').html(data);
						}
					});
				}

			});
			

			$('#student_class').change(function(){
				var class_name= $('#student_class').val();
				var action ="class_teacher";
				$.ajax({
					url:"includes/action.php",
					type:"post",
					data:{class_name:class_name,class_teacher:action},
					success:function(data)
					{
						// $('.teacher_option').show();
						$('#teacher').html(data);
					}
				});

				$.ajax({
					url:"includes/action.php",
					type:"post",
					data:{class_name:class_name,class_location:action},
					success:function(data)
					{
						$('#location').html(data);
					}
				});

				$.ajax({
					url:"includes/action.php",
					type:"post",
					data:{class_name:class_name,class_shift:action},
					success:function(data)
					{
						$('#shift').html(data);
					}
				})
			});

			$('.review_delete').click(function(){
				alert($(this).data('id'));
			});

		});
	</script>