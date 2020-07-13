<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Update Interest</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<?php
							if(isset($_REQUEST['interest'])){ $id = $_REQUEST['interest']; }
							$data = $con->get_data_by_id('category',$id);
						?>
						<form>
							<div class="form-group">
								<label for="class_name">Name</label>
								<input type="text" class="form-control" id="title" value="<?= $data['title']?>" placeholder="Enter Interest Title">
								<p id="title_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Interest Title </p>
							</div>

							<div class="form-group">
								<label for="class_name">Description</label>
								<textarea class="form-control" id="description" placeholder="Enter Interest Description"><?= $data['description']?></textarea>
								<p id="description_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Interest Description </p>
							</div>

							<div class="form-group">
								<label for="name">Interest Image</label>
								<input type="file" id="img">
								<img src="uploads/category/<?= $data['img']?>" style="width: 100px; height: 100px; margin-top: 5px;">
								<p id="img_error" style="color: #ff7f7f; margin-top: 15px;">Please Choose Interest Image </p>
							</div>

							<button type="button" data-id="<?= $data['id'] ?>" class="btn btn-primary btn-sm waves-effect waves-light update_category">Update Interest</button>
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
			$('#title_error').hide();
			$('#description_error').hide();
			$('#img_error').hide();
			$('.update_category').click(function(){
				if(blank_field_check($('#title'),'title') && blank_field_check($('#description'),'description') && blank_field_check($('#img'),'img'))
				{

					add_update_category($(this).data('id'),$('#title').val(),$('#description').val(),$('#img')[0].files[0],"update_category");
				}
				
			});
		});
	</script>