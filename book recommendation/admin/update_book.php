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
							$category_hobby_id;
						?>
						<form>
							<div class="form-group">
								<label for="subject">Category</label>
								<select class="form-control" id="category">
									<?php 
										$run = $con->execute("select * from category_hobby");
										while ($category_hobby_data = $con->fetch_assoc($run))
										{
											if($category_hobby_data['id']==$data['category_hobby_id']) { $category_hobby_id = $category_hobby_data['id']; }
											$category_data = $con->get_data_by_id('category',$category_hobby_data['category_id']);
											?><option <?php if($category_hobby_data['id']==$data['category_hobby_id']){ echo "selected=''"; } ?> value="<?= $category_hobby_data['id']?>"><?= ucwords( $category_data['title']." ". $category_hobby_data['name']) ?></option><?php
										}
									?>
								</select>
								<p id="category_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Category </p>
							</div>

							<div class="form-group">
								<label for="subject">Hobby Writer </label>

								<select class="form-control" id="hobby">
									<?php
										$category_hobby_writer_old_run = $con->execute("select * from category_hobby_writer");
										while ($category_hobby_writer_old_data= $con->fetch_assoc($category_hobby_writer_old_run))
										{
											?><option <?php if($category_hobby_writer_old_data['id']==$data['category_hobby_writer_id']){ echo "selected=''"; }?> value="<?= $category_hobby_writer_old_data['id']?>"><?= ucfirst($category_hobby_writer_old_data['name']) ?></option><?php
										}

									?>
								</select>
								<p id="hobby_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Hobby </p>
							</div>

							<div class="form-group">
								<label for="description">Book Description</label>
								<textarea id="description" class="form-control" placeholder="Please Type Book Description"><?= $data['book_description'] ?></textarea>
								<p id="description_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Book Description </p>


							</div>

							<div class="form-group">
								<label for="name">Book Image</label>
								<input type="file" id="img">
								<input type="hidden" id="old_img" id="old_img" value="<?= $data['book_img'] ?>">
								<img src="uploads/books/<?= $data['book_img']?>" style="width: 100px; height: 100px; margin-top: 5px;">
								<p id="img_error" style="color: #ff7f7f; margin-top: 15px;">Please Choose Book Image </p>
							</div>

							<div class="form-group">
								<label for="name">Book In PDF</label>
								<input type="file" id="file">
								<input type="hidden" id="old_file" value="<?= $data['book_name'] ?>">
								<p id="file_error" style="color: #ff7f7f; margin-top: 15px;">Please Choose Book </p>
								<p id="file_file_error" style="color: #ff7f7f; margin-top: 15px;">Please Size should be less than 100Mb </p>
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
			$('#file_file_error').hide();
			$('#img_error').hide();
			$('#description_error').hide();
			$('.update_book').click(function(){
				
				if (select_check($("#category"),'category') && select_check($("#hobby"),'hobby') && blank_field_check($('#description'),'description') && file_check($('#file'),'file')) 
				{
					add_update_book($(this).data('id'),$('#category').val(),$('#hobby').val(),$('#description').val(),"update_book", $('#old_file').val(),$('#old_img').val(),$('#file')[0].files[0],$('#img')[0].files[0]);
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