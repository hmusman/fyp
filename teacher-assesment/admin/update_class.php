<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Update Class</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<?php
							if(isset($_REQUEST['class'])){ $id = $_REQUEST['class']; }
							$data = $con->get_data_by_id('classes',$id);
						?>
						<form>
							<div class="form-group">
								<label for="update_name">Name</label>
								<input type="email" class="form-control" id="update_name" value="<?= $data['name']; ?>" placeholder="Enter Class Name">
							</div>
							
							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light update_class" data-id="<?= $data['id'] ?>">Update Class</button>
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
			$('.update_class').click(function(){
				var id = $(this).data('id');
				var name = $('#update_name').val();
				var action = "update_class";
				if (name=="") { $('#name_error').show(); $('#update_name').css('border','1px solid #ff7f7f'); }
				else
				{
					$('#name_error').hide();
					$('#update_name').css('border','1px solid green');
					$.ajax({
						url:"includes/action.php",
						type:"post",
						data:{name:name,id:id,update_class:action},
						success:function(data)
						{
							window.location=data;
						}
					})
				}
			});
		});
	</script>