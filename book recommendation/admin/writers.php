<?php 
	require_once('includes/header.php');
?>


<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">Writers</h4>
		<div class="table-responsive">
			<table class="table" id="hobbyTable">
				<thead> 
					<tr> 
						<th colspan="4"></th> 
						<th><a href="new_writer.php" class="pull-right btn btn-primary btn-sm waves-effect waves-light">Add New Writer</a></th> 
						
					</tr> 
				</thead> 

				<thead> 
					<tr> 
						<th>#</th> 
						<th>Name</th> 
						<th>Category</th>
						<th>Sub Category</th>
						<th>Action</th> 
						
					</tr> 
				</thead> 
				<tbody> 
					
					<?php
						
						$run = $con->execute("select * from category_hobby_writer");
						$i =1;
						while ($category_hobby_writer_data = $con->fetch_assoc($run))
						{

							$category_hobby_data = $con->get_data_by_id('category_hobby',$category_hobby_writer_data['category_hobby_id']);
							$category_data = $con->get_data_by_id('category',$category_hobby_data['category_id']);
							?>
								<tr> 
									<td><?= $i ?></td> 
									<td><?= ucfirst($category_hobby_writer_data['name']) ?></td> 
									<td><?= ucfirst($category_data['title']) ?></td>
									<td><?= ucfirst($category_hobby_data['name']) ?></td>
									<td>
										<a href="update_writer.php?writer_update=<?= $category_hobby_writer_data['id'] ?>" class="btn btn-primary btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-edit"></i></a>
										<button type="button" class="btn btn-danger btn-circle btn-sm waves-effect waves-light del_category_hobby_writer" data-id="<?= $category_hobby_writer_data['id']?>"><i class="ico fa fa-trash"></i></button>
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
			$('.del_category_hobby_writer').click(function(){
				var id =$(this).data('id');
				var action = "delhobbyr";
				 swal({
				    title: "Are you sure?",
				    text: "You will not be able to recover this hobby!",
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
							data:{id:id,del_category_hobby_writer:action},
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