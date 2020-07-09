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
						<th colspan="4"></th> 
						<th><a href="new_student.php" class="pull-right btn btn-primary btn-sm waves-effect waves-light">Add New Student</a></th> 
						
					</tr> 
				</thead> 

				<thead> 
					<tr> 
						<th>#</th> 
						<th>Name</th> 
						<th>Email</th> 
						<th>Class</th>
						<th>Action</th> 
						
					</tr> 
				</thead> 
				<tbody> 
					
					<?php
						
						$run = $con->execute("select * from student");
						$i =1;
						while ($student_data = $con->fetch_assoc($run))
						{
							$class_data = $con->get_data_by_id('classes',$student_data['class_id']);
							?>
								<tr> 
									<td><?= $i ?></td> 
									<td><?= ucfirst($student_data['name']) ?></td> 
									<td><?= ucfirst($student_data['email']) ?></td> 
									<td><?= ucfirst($class_data['name']) ?></td> 
									
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
				    confirmButtonText: 'Yes, I am sure!',
				    cancelButtonText: "No, cancel it!",
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
		});
	</script>