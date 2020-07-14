<?php 
	require_once('includes/header.php');
?>


<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">Class Teacher Association</h4>
		<div class="table-responsive">
			<table class="table" id="teacherTable">
				<thead> 
					<tr> 
						<th colspan="7"></th> 
						<th><a href="new_class_teacher_association.php" class="pull-right btn btn-primary btn-sm waves-effect waves-light">Add New Class Teacher Association</a></th> 
						
					</tr> 
				</thead> 

				<thead> 
					<tr> 
						<th>#</th> 
						<th>Class</th>
						<th>Teacher</th>
						<th>Subject</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Shift</th>
						<th>Action</th> 
						
					</tr> 
				</thead> 
				<tbody> 
					
					<?php
						
						$run = $con->execute("select * from class_teacher");
						$i =1;
						while ($class_teacher_data = $con->fetch_assoc($run))
						{
							$teacher_data = $con->get_data_by_id('teacher',$class_teacher_data['teacher_id']);
							?>
								<tr> 
									<td><?= $i ?></td> 
									
									<td><?php  echo ucfirst($class_teacher_data['class_name']);?></td> 
									<td><?php  echo ucfirst($teacher_data['name']); ?></td>
									<td><?php  echo ucfirst($class_teacher_data['subject']); ?></td>
									<td><?php echo $class_teacher_data['start_time']; ?></td>
									<td><?php  echo $class_teacher_data['end_time']; ?></td>
									<td><?php echo ucfirst($class_teacher_data['shift']);?></td>									
									<td>
										
										<a href="update_class_teacher_association.php?class_teacher_association_update=<?= $class_teacher_data['id'] ?>" class="btn btn-primary btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-edit"></i></a>
										<button type="button" class="btn btn-danger btn-circle btn-sm waves-effect waves-light del_class_teacher_association" data-id="<?= $class_teacher_data['id']?>"><i class="ico fa fa-trash"></i></button>
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
			$('.del_class_teacher_association').click(function(){
				var id =$(this).data('id');
				var action = "del_class_teacher_association";
				 swal({
				    title: "Are you sure?",
				    text: "You will not be able to recover this teacher!",
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
							data:{id:id,del_class_teacher_association:action},
							success:function(data)
							{
								location.reload();
							}
						});
				    }
				 });
				
			});

			$('.block_teacher').click(function(){ active_block('teacher',$(this).data('id'),$('.name'+$(this).data('id')).val(),'block'); });

			$('.active_teacher').click(function(){ active_block('teacher',$(this).data('id'),$('.name'+$(this).data('id')).val(),'active'); });

		});
	</script>