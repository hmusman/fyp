<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Add Class</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form>
							<div class="form-group">
								<label for="class_name">Name</label>
								<input type="text" class="form-control" id="class_name" placeholder="Enter Class Name">
								<p id="name_error" style="color: #ff7f7f; margin-top: 15px;">Please Type Class Name </p>
							</div>
							<button type="button" class="btn btn-primary btn-sm waves-effect waves-light add_class">Add Class</button>
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
			$('.add_class').click(function(){
				var name = $('#class_name').val();
				var action = "add_class";
				if (name=="") { $('#name_error').show(); $('#class_name').css('border','1px solid #ff7f7f'); }
				else
				{
					$('#name_error').hide();
					$('#class_name').css('border','1px solid green');
					$.ajax({
						url:"includes/action.php",
						type:"post",
						data:{name:name,add_class:action},
						success:function(data)
						{
							if (data=="Class Already Exists") 
							{ 
								swal({
								    title: "",
								    text: data,
								    type: "warning",
								    confirmButtonColor: '#3F51B5',
								    confirmButtonText: 'Ok',
								    closeOnConfirm: false,
								 });
							}
							else{ window.location=data; }
						}
					})
				}
			});
		});
	</script>