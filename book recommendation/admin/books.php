<?php 
	require_once('includes/header.php');
?>


<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">Books</h4>
		<div class="table-responsive">
			<table class="table" id="teacherTable">
				<thead> 
					<tr> 
						<th colspan="5"></th> 
						<th><a href="new_book.php" class="pull-right btn btn-primary btn-sm waves-effect waves-light">Add New Book</a></th> 
						
					</tr> 
				</thead> 

				<thead> 
					<tr> 
						<th>#</th> 
						<th>Name</th> 
						<th>Author</th>
						<th>Category</th> 
						<th>Hobby</th> 
						<th>Action</th> 
						
					</tr> 
				</thead> 
				<tbody> 
					
					<?php
						
						$run = $con->execute("select * from hobby_book");
						$i =1;
						while ($book_data = $con->fetch_assoc($run))
						{
							$author_data = $con->get_data_by_id('category_hobby_writer',$book_data['category_hobby_writer_id']);
							$hobby_data = $con->get_data_by_id('category_hobby',$book_data['category_hobby_id']);
							$category_data = $con->get_data_by_id('category',$hobby_data['category_id']);
							?>
								<tr> 
									<td><?= $i ?></td> 
									<td><?= ucfirst($book_data['book_name']) ?></td>
									<td><?= ucfirst($author_data['name']) ?></td> 
									<td><?= ucfirst($category_data['title']) ?></td> 
									<td><?= ucfirst($hobby_data['name']) ?></td> 									
									<td>
										<a href="update_book.php?book_update=<?= $book_data['id'] ?>" class="btn btn-primary btn-circle btn-sm waves-effect waves-light"><i class="ico fa fa-edit"></i></a>
										<button type="button" class="btn btn-danger btn-circle btn-sm waves-effect waves-light del_book" data-id="<?= $book_data['id']?>"><i class="ico fa fa-trash"></i></button>
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
			$('.del_book').click(function(){
				var id =$(this).data('id');
				var action = "del_book";
				 swal({
				    title: "Are you sure?",
				    text: "You will not be able to recover this book!",
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
							data:{id:id,del_book:action},
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