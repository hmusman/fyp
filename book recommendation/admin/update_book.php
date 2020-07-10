<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Update Book</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<?php
							if (isset($_REQUEST['book_update'])) { $id = $_REQUEST['book_update']; }
							$data = $con->get_data_by_id('hobby_book',$id);
							$hobby_data = $con->get_data_by_id('category_hobby',$data['category_hobby_id']);
							$category_hobby_data = $con->get_data_by_id('category',$hobby_data['category_id']);
							$category_id;
						?>
						<form>
							<input type="hidden" id="book_old_name" value="<?= $data['book_name'] ?>">
							<div class="form-group">
								<label for="subject">Category</label>
								<select class="form-control" id="category">
									<option selected="" disabled="">Select Category</option>
									<?php 
										$run = $con->execute("select * from category");
										while ($category_data = $con->fetch_assoc($run))
										{
											if($category_data['id']==$category_hobby_data['id']){ $category_id=$category_data['id']; }
											?><option <?php if($category_data['id']==$category_hobby_data['id']){ echo "selected=''"; }?> value="<?= $category_data['id']?>"><?= ucfirst($category_data['title']) ?></option><?php
										}
									?>
								</select>
								<p id="category_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Category </p>
							</div>

							<div class="form-group">
								<label for="subject">Hobby </label>

								<select class="form-control" id="hobby">
									<?php
										$category_hobby_old_run = $con->execute("select * from category_hobby where category_id='$category_id'");
										while ($category_hobby_old_data= $con->fetch_assoc($category_hobby_old_run))
										{
											?><option <?php if($category_hobby_old_data['id']==$data['category_hobby_id']){ echo "selected=''"; }?> value="<?= $category_hobby_old_data['id']?>"><?= ucfirst($category_hobby_old_data['name']) ?></option><?php
										}

									?>
								</select>
								<p id="hobby_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Hobby </p>
							</div>

							<div class="form-group">
								<label for="name">Book</label>
								<input type="file" id="file" value="<?php echo "admin/files_folder/".$data['book_name']; ?>">
								<p id="file_error" style="color: #ff7f7f; margin-top: 15px;">Please Choose Book </p>
							</div>
							
							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light update_book" data-id=<?= $data['id'] ?>>Update Book</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-12s col-xs-12 -->

		</div>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
<!-- Placed at the end of the document so the pages load faster -->
	<?php require_once('includes/footer_script.php'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#hobby_error').hide();
			$('#category_error').hide();
			$('#file_error').hide();
			$('.update_book').click(function(){
				
				if (blank_field_check($("#category"),'category') && blank_field_check($("#hobby"),'hobby')) 
				{
					add_update_book($(this).data('id'),$('#hobby').val(),"update_book", $('#book_old_name').val(),$('#file')[0].files[0]);
				}
				
			});


			$('#category').change(function(){
				var category= $('#category').val();
				var action ="category_hobby_filter";
				$.ajax({
					url:"includes/action.php",
					type:"post",
					data:{category:category,category_hobby_filter:action},
					success:function(data)
					{
						$('#hobby').html(data);
					}
				})
			});
		});
	</script>