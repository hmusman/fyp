<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">Classes</h4>
		<div class="table-responsive">
			<table class="table" id="classTable">
				
				<thead> 
					<tr> 
						<th colspan="5"></th> 
						<th><a href="new_class.php" class="pull-right btn btn-primary btn-sm waves-effect waves-light">Add New Class</a></th> 
						
					</tr> 
				</thead> 

				<thead> 
					<tr> 
						<th>#</th> 
						<th>Name</th> 
						<th>Teacher</th>
						<th>Assign</th>
						<th>Assign Teachers</th>
						<th>Action</th> 
						
					</tr> 
				</thead> 
				
				<tbody> 
					<?php

						$q = 'select * from classes';
						$run = $con->execute($q);
						$i = 1;
						while($class_data = $con->fetch_assoc($run))
						{
							$class_name = $class_data['name'];
							?>
								<tr> 
									<td><?= $i ?></td> 
									<td><?= $class_name ?></td>
									<td>
										
										<select class="form-control" id="teacher_name<?= str_replace(' ', '_',$class_data['name'])?>">
											<option selected="" disabled="">Select Teacher</option>
											<?php 

												$teacher_name_run = $con->class_teacher_name_filter('id',$con->class_teacher_ids('class_name',$class_name,'teacher_id'),'teacher'); 
												while ($teacher_name_data = $con->fetch_assoc($teacher_name_run))
												{
													?>	
														<option value="<?= $teacher_name_data['id'] ?>"><?= ucfirst($teacher_name_data['name']) ?></option>
													<?php
												}
											?>
											
										</select>
									</td>
									<td>
										<button type="button" class="btn btn-primary btn-sm waves-effect waves-light assign_teacher" data-id="<?= str_replace(' ', '_',$class_data['name']) ?>">Assign</button>
									</td>
									<td>

										<?php $con->class_teacher_names('class_name',$class_name,'teacher','teacher_id','id');?>

									</td>
									<td>
										<a href="update_class.php?class=<?= $class_data['id'] ?>" class="btn btn-primary btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-edit"></i></a>
										<a href="?class_del=<?= $class_data['id'] ?>" class="btn btn-danger btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-trash"></i></a>
										
									</td> 
									
								</tr> 

							<?php
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