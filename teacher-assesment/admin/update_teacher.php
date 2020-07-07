<?php 
	require_once('includes/header.php');
?>

<div id="wrapper">
	<div class="main-content">
		
		<div class="row small-spacing">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title" style="background: #3F51B5;">Update Teacher</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form>
							<div class="form-group">
								<label for="exampleInputName">Name</label>
								<input type="email" class="form-control" id="exampleInputName" placeholder="Enter Name">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Address">
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Subject">
							</div>

							<div class="form-group">
								<label for="exampleInputSubject">Password</label>
								<input type="password" class="form-control" id="exampleInputSubject" placeholder="Enter Subject">
							</div>
							
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Update Teacher</button>
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