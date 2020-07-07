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
								<label for="exampleInputEmail1">Name</label>
								<input type="email" class="form-control" id="exampleInputName" placeholder="Enter Class Name">
							</div>
							
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Add Class</button>
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