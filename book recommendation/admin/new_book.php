<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Add Book</h4>
					<!-- /.box-title -->
					<div class="card-content">
						
						<form>
							
							<div class="form-group">
								<label for="subject">Sub Category</label>
								<select class="form-control" id="category">
									<option selected="" disabled="">Select Sub Category</option>
									<?php 
										$run = $con->execute("select * from category_hobby");
										while ($category_hobby_data = $con->fetch_assoc($run))
										{
											$category_data = $con->get_data_by_id('category',$category_hobby_data['category_id']);
											?><option value="<?= $category_hobby_data['id']?>"><?= ucwords( $category_data['title']." ". $category_hobby_data['name']) ?></option><?php
										}
									?>
								</select>
								<p id="category_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Sub Category </p>
							</div>

							<div class="form-group">
								<label for="subject">Hobby</label>
								<select class="form-control" id="hobby">
									
								</select>
								<p id="hobby_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Writer</p>
							</div>

							<div class="form-group">
								<label for="description">Book Description</label>
								<textarea id="description" class="form-control" placeholder="Please Type Book Description"></textarea>
								<p id="description_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Book Description </p>


							</div>

							<div class="form-group">
								<label for="name">Book Image</label>
								<input type="file" id="img">
								<p id="img_error" style="color: #ff7f7f; margin-top: 15px;">Please Choose Book Image </p>
							</div>

							<div class="form-group">
								<label for="name">Book In PDF</label>
								<input type="file" id="file">
								<p id="file_error" style="color: #ff7f7f; margin-top: 15px;">Please Choose Book </p>
								<p id="file_file_error" style="color: #ff7f7f; margin-top: 15px;">Please Size should be less than 100Mb </p>
							</div>
							
							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light add_book">Add Book</button>
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
			$('#name_error').hide();
			$('#category_error').hide();
			$('#hobby_error').hide();
			$('#description_error').hide();	
			$('#img_error').hide();
			$('#file_error').hide();
			$('#file_file_error').hide();
			$('.add_book').click(function(){
				
				if (select_check($("#category"),'category') && select_check($("#hobby"),'hobby') && blank_field_check($('#description'),'description') &&  file_check($('#img'),'img') && file_check($('#file'),'file')) 
				{
					add_update_book(0,$('#category').val(),$('#hobby').val(),$('#description').val(),"add_book",' ',' ', $('#file')[0].files[0],$('#img')[0].files[0]);
				}
				
			});


			$('#category').change(function(){
				var category= $('#category').val();
				var action ="category_hobby_filter";
				$.ajax({
					url:"includes/action.php",
					type:"post",
					data:{category:category,category_hobby_writer_filter:action},
					success:function(data)
					{
						$('#hobby').html(data);
					}
				})
			});
		});
	</script>