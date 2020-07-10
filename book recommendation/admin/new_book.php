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
								<label for="subject">Category</label>
								<select class="form-control" id="category">
									<option selected="" disabled="">Select Category</option>
									<?php 
										$run = $con->execute("select * from category");
										while ($category_data = $con->fetch_assoc($run))
										{
											?><option value="<?= $category_data['id']?>"><?= ucfirst($category_data['title']) ?></option><?php
										}
									?>
								</select>
								<p id="category_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Category </p>
							</div>

							<div class="form-group">
								<label for="subject">Hobby</label>
								<select class="form-control" id="hobby">
									
								</select>
								<p id="hobby_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Hobby </p>
							</div>

							<div class="form-group">
								<label for="name">Book</label>
								<input type="file" id="file">
								<p id="file_error" style="color: #ff7f7f; margin-top: 15px;">Please Choose Book </p>
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
			$('#file_error').hide();
			$('.add_book').click(function(){
				
				
				if (blank_field_check($("#category"),'category') && blank_field_check($("#hobby"),'hobby') && blank_field_check($('#file'),'file')) 
				{
					add_update_book(0,$('#hobby').val(),"add_book",' ', $('#file')[0].files[0]);
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