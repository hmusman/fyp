<?php 
	require_once('includes/header.php');
?>


<div id="wrapper">
	<div class="main-content">
		<h4 class="box-title">TimeTable</h4>
		
	    <table class="table" id="studentTable" style="margin-top: 25px;" >
     
			<thead> 
		        <!-- <tr style="background-color: #00aeff;">
		          <td class="text-center  " colspan="5" style="color:white; font-weight: 600; font-size: larger; " >Timing For All Batches</td>
		        </tr> -->
				<tr> 
					<th>#</th>
					<th>Class</th>
					<th>Teacher</th> 
					<th>Subject</th>
					<th>Start Time</th> 
					<th>End Time</th>
					<th>Location</th>
					
					
				</tr> 
			</thead> 
			<tbody> 
				<?php
						
						$q = "select * from class_teacher";
						$run = $con->execute($q);
						$i =1;
						while ($class_teacher_data = $con->fetch_assoc($run))
						{
							$teacher_data = $con->get_data_by_id('teacher',$class_teacher_data['teacher_id']);
							$class_name = $class_teacher_data['class_name'];
							$class_data = $con->fetch_assoc($con->execute("select * from classes where name='$class_name'"));
							?>
								<tr> 
									<td><?= $i ?></td> 
									
									<td><?php  echo ucfirst($class_data['name']);?></td> 
									<td><?php  echo ucfirst($teacher_data['name']);?></td> 
									<td><?php  echo ucfirst($class_teacher_data['subject']); ?></td>
									<td><?php echo $class_teacher_data['start_time']; ?></td>
									<td><?php  echo $class_teacher_data['end_time']; ?></td>
									<td><?php echo ucfirst($class_data['location']);?></td>									
									
								</tr> 

							<?php
							$i++;
						}

					?>
				
			</tbody> 
	</table> 
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
<!-- Placed at the end of the document so the pages load faster -->
		<?php require_once('includes/footer_script.php'); ?>
		<script>
			 $(document).ready(function() {
		    $('#basic-coupon-clock').countdown('2020/07/20', function(event) {
		      $(this).html(event.strftime('%D days %H:%M:%S'));
		    });
		  });
		</script>

		<script>
		  $(document).ready(function() {
		   $('#basic-coupon-clock2').countdown('2020/07/20', function(event) {
		     $(this).html(event.strftime('%D days %H:%M:%S'));
		   });
		 });
		</script>