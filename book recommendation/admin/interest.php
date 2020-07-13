<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">Interest</h4>
		<div class="table-responsive">
			<table class="table" id="classTable">
				
				<thead> 
					<tr> 
						<th colspan="3"></th> 
						<th><a href="new_interest.php" class="pull-right btn btn-primary btn-sm waves-effect waves-light">Add New Interest</a></th> 
						
					</tr> 
				</thead> 

				<thead> 
					<tr> 
						<th>#</th> 
						<th>Title</th> 
						<th>Description</th>
						<th>Action</th>
					</tr> 
				</thead> 
				
				<tbody> 
					<?php

						$q = 'select * from category';
						$run = $con->execute($q);
						$i = 1;
						while($category_data = $con->fetch_assoc($run))
						{
						
							?>
								<tr> 
									<td><?= $i ?></td> 
									<td><?= ucfirst($category_data['title']); ?></td>
									<td><?= ucfirst($category_data['description']) ?></td>
									<td>
										<a href="update_interest.php?interest=<?= $category_data['id'] ?>" class="btn btn-primary btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-edit"></i></a>
										<button type="button" class="btn btn-danger btn-circle btn-sm waves-effect waves-light del_category" data-id="<?= $category_data['id']?>"><i class="ico fa fa-trash"></i></button>
										
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
			$('.del_category').click(function(){
				var id =$(this).data('id');
				var action = "del_category";
				 swal({
				    title: "Are you sure?",
				    text: "You will not be able to recover this category!",
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
							data:{id:id,del_category:action},
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