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
						<th colspan="12"></th> 
						<th><a href="teacher_register.php" class="pull-right btn btn-primary btn-sm waves-effect waves-light">Add New Teacher</a></th> 
						
					</tr> 
				</thead> 

				<thead> 
					<tr> 
						<th>#</th> 
						<th>Image</th>
						<th>Name</th> 
						<th>Email</th>
						<th>CNIC</th>
						<th>Phone</th>
						<th>Salary</th>
						<th>Education</th>
						<th>Subject</th>
						<th>Experience</th>
						<!-- <th>Class</th>
						<th>Assign</th> -->
						<th>Assign Classes</th>
						<!-- <th>Rating</th> -->
						<th>Status</th>
						<th>Action</th> 
						
					</tr> 
				</thead> 
				<tbody> 
					
					<?php
						
						$run = $con->execute("select * from teacher");
						$i =1;
						while ($teacher_data = $con->fetch_assoc($run))
						{
							?>
								<tr> 
									<td><?= $i ?></td> 
									<td><?php if($teacher_data['img'] !=null){ ?><img src="uploads/teacher/<?php echo $teacher_data['img'] ?>" style="width: 100px; height: 100px;"><?php } ?></td>
									<td><?php if($teacher_data['name'] !=null){ echo ucfirst($teacher_data['name']); } ?></td> 
									<td><?php if($teacher_data['email'] !=null){ echo ucfirst($teacher_data['email']); } ?></td>
									<td><?php if($teacher_data['cnic'] !=null){ echo ucfirst($teacher_data['cnic']); } ?></td>
									<td><?php if($teacher_data['phone'] !=null){ echo ucfirst($teacher_data['phone']); } ?></td>
									<td><?php if($teacher_data['salary'] !=null){ echo ucfirst($teacher_data['salary']); } ?></td>
									<td><?php if($teacher_data['education'] !=null){ echo ucfirst($teacher_data['education']); } ?> Years</td>
									<td><?php if($teacher_data['subject'] !=null){ echo ucfirst($teacher_data['subject']); } ?></td>
									<td><?php if($teacher_data['experience'] !=null){ echo ucfirst($teacher_data['experience']); } ?></td>
									<!-- <td>
										<select class="form-control" id="class_name<?= $teacher_data['id']?>">
											<option  selected="" disabled="">Select Class </option>
											<?php 
												$class_name_run = $con->class_teacher_name_filter('name',$con->class_teacher_ids('teacher_id',$teacher_data['id'],'class_name'),'classes'); 
												while ($class_name_data = $con->fetch_assoc($class_name_run))
												{
													?>	
														<option value="<?= $class_name_data['name'] ?>"><?= ucfirst($class_name_data['name']) ?></option>
													<?php
												}
											?>
										</select>
									</td> -->
									<!-- <td>
										<button type="button" class="btn btn-primary btn-sm waves-effect waves-light assign_class" data-id="<?= $teacher_data['id'] ?>">Assign</button>
									</td> -->
									<td>
										<?php
											$con->class_teacher_names('teacher_id',$teacher_data['id'],'classes','class_name','name');
										?>
									</td>
									<!-- <td class="text-info">
										<i class=" fa fa-star"></i>
										<i class=" fa fa-star"></i>
										<i class=" fa fa-star"></i>
									</td> -->
									<td><?php 
										if ($teacher_data['status']==1)
										{
											?>
												<input type="hidden" class="name<?= $teacher_data['id']; ?>" value="<?= $teacher_data['name']; ?>">
												<button type="button" class="btn btn-danger btn-sm waves-effect waves-light block_teacher" data-id="<?= $teacher_data['id']?>">Block</button>

											<?php
										}
										else
										{
											?>
												<input type="hidden" class="name<?= $teacher_data['id']; ?>" value="<?= $teacher_data['name']; ?>">
												<button type="button" class="btn btn-success btn-sm waves-effect waves-light active_teacher" data-id="<?= $teacher_data['id']?>">Active</button>

											<?php
										}
									 ?></td>
									<td>
										<!-- <a href="reviews.php?teacher_review=<?= $teacher_data['id'] ?>" class="btn btn-info btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-comment"></i></a> -->
										<a href="update_teacher.php?teacher_update=<?= $teacher_data['id'] ?>" class="btn btn-primary btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-edit"></i></a>
										<button type="button" class="btn btn-danger btn-circle btn-sm waves-effect waves-light del_teacher" data-id="<?= $teacher_data['id']?>"><i class="ico fa fa-trash"></i></button>
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
			$('.del_teacher').click(function(){
				var id =$(this).data('id');
				var action = "del_teacher";
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
							data:{id:id,del_teacher:action},
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