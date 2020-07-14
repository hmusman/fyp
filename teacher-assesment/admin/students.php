<?php 
	require_once('includes/header.php');
?>


<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">Teachers</h4>
		<div class="table-responsive">
			<table class="table" id="teacherTable">
				<thead> 
					<tr> 
						<th colspan="6"></th> 
						<th><a href="student_register.php" class="pull-right btn btn-primary btn-sm waves-effect waves-light">Add New Student</a></th> 
						
					</tr> 
				</thead> 

				<thead> 
					<tr> 
						<th>#</th> 
						<th>Name</th> 
						<th>Email</th>
						<th>Admission Date</th> 
						<th>Class</th>
						<th>Status</th>
						<th>Action</th> 
						
					</tr> 
				</thead> 
				<tbody> 
					
					<?php
						
						$run = $con->execute("select * from student");
						$i =1;
						while ($student_data = $con->fetch_assoc($run))
						{
							if($student_data['class_id']!=0)
							{
								$class_data = $con->get_data_by_id('classes',$student_data['class_id']);
							}
							
							?>
								<tr> 
									<td><?= $i ?></td> 
									<td><?php if($student_data['name']!=null){ echo ucfirst($student_data['name']); } ?> </td> 
									<td><?php if($student_data['email']!=null){ echo ucfirst($student_data['email']); } ?> </td> 
									<td><?php if($student_data['admission_date']!=null){ echo date('d / m / Y',strtotime($student_data['admission_date'])); } ?> </td> 
									<td><?php if($student_data['class_id']!=0){ echo ucwords($class_data['name']); } ?></td> 
									<td><?php 
										if ($student_data['status']==1)
										{
											?>
												<input type="hidden" class="name<?= $student_data['id']; ?>" value="<?= $student_data['name']; ?>">
												<button type="button" class="btn btn-danger btn-sm waves-effect waves-light block_student" data-id="<?= $student_data['id']?>">Block</button>

											<?php
										}
										else
										{
											?>
												<input type="hidden" class="name<?= $student_data['id']; ?>" value="<?= $student_data['name']; ?>">
												<button type="button" class="btn btn-success btn-sm waves-effect waves-light active_student" data-id="<?= $student_data['id']?>">Active</button>

											<?php
										}
									 ?></td>
									<td>
										<a href="update_student.php?student_update=<?= $student_data['id'] ?>" class="btn btn-primary btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-edit"></i></a>
										<button type="button" class="btn btn-danger btn-circle btn-sm waves-effect waves-light del_student" data-id="<?= $student_data['id']?>"><i class="ico fa fa-trash"></i></button>
									</td> 
									
								</tr> 

							<?php
							$i++;
						}

					?>
					
					
				</tbody> 
			</table> 
			
		</div>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
<!-- Placed at the end of the document so the pages load faster -->
	<?php require_once('includes/footer_script.php'); ?>
	<script type="text/javascript">



		$(document).ready(function() {
			$('.del_student').click(function(){
				var id =$(this).data('id');
				var action = "del_delete";
				 swal({
				    title: "Are you sure?",
				    text: "You will not be able to recover this student!",
				    type: "warning",
				    showCancelButton: true,
				    confirmButtonColor: '#DD6B55',
				    confirmButtonText: 'Yes',
				    cancelButtonText: "No",
				    closeOnConfirm: true,
				    closeOnCancel: true
				 },
				 function(isConfirm){
				   if (isConfirm){
				   		$.ajax({
							url:"includes/action.php",
							type:"post",
							data:{id:id,del_student:action},
							success:function(data)
							{
								location.reload();
							}
						});
				    }
				 });
				
			});

			$('.block_student').click(function(){ active_block('student',$(this).data('id'),$('.name'+$(this).data('id')).val(),'block'); });

			$('.active_student').click(function(){ active_block('student',$(this).data('id'),$('.name'+$(this).data('id')).val(),'active'); });

		});
	</script>