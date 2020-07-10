<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Update Hobby</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<?php
							if (isset($_REQUEST['hobby_update'])) { $id = $_REQUEST['hobby_update']; }
							$data = $con->get_data_by_id('category_hobby',$id);
						?>
						<form>
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" value="<?= $data['name'] ?>" placeholder="Enter Name">
								<p id="name_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Name </p>
							</div>

							<div class="form-group">
								<label for="subject">Subject</label>
								<select class="form-control" id="category">
									<?php 
										$run = $con->execute("select * from category");
										while ($category_data = $con->fetch_assoc($run))
										{
											?><option  <?php if($category_data['id']==$data['category_id']){ echo "selected=''"; } ?> value="<?= $category_data['id']?>"><?= $category_data['title'] ?></option><?php
										}
									?>
								</select>
								<p id="category_error" style="color: #ff7f7f; margin-top: 15px;">Please Select Category </p>
							</div>
							
							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light update_hobby" data-id=<?= $data['id'] ?>>Update Hobby</button>
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
			$('.update_hobby').click(function(){
				if (blank_field_check($("#name"),'name') && blank_field_check($("#category"),'category')) 
				{
					add_update_hobby($(this).data('id'),$('#name').val(),$('#category').val(),"update_hobby");
				}
				
			});
		});
	</script>