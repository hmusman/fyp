	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<!-- Sparkline Chart -->
	<script src="assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/scripts/chart.sparkline.init.min.js"></script>

	<!-- Percent Circle -->
	<script src="assets/plugin/percircle/js/percircle.js"></script>

	<!-- Google Chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- Chartist Chart -->
	<script src="assets/plugin/chart/chartist/chartist.min.js"></script>
	<script src="assets/scripts/jquery.chartist.init.min.js"></script>

	<!-- FullCalendar -->
	<script src="assets/plugin/moment/moment.js"></script>
	<script src="assets/plugin/fullcalendar/fullcalendar.min.js"></script>
	<script src="assets/scripts/fullcalendar.init.js"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
	<script type="text/javascript">
	
		$(document).ready(function(){
			// $('.weeks').hide();
			// $('.teachers').hide();
			// $('.students_rating').hide();

			function class_teacher_assign(class_name,teacher_id,cat)
			{
				var submit = "submit";
				$.ajax({
					type:"post",
					url:"includes/action.php",
					data:{teacher_id:teacher_id,class_name:class_name,submit:submit,cat:cat},
					success:function(data)
					{
						swal({
						    title: "",
						    text: data,
						    type: "success",
						    confirmButtonColor: '#3F51B5',
						    confirmButtonText: 'Ok',
						    closeOnConfirm: false,
						 },
						 function(isConfirm){

						   if (isConfirm){
						   		location.reload();
						    } 
						 });
					}
				});
			} // class_teacher_assign()

			$('.assign_class').click(function(){
				var teacher_id = $(this).data('id');
				var class_name = $('#class_name'+teacher_id).children('option:selected').val();
				var cat = "class";
				if (class_name=="Select Class") {
					swal("Please Select Any Class");
				}
				else
				{
					class_teacher_assign(class_name,teacher_id,cat);
				}
			});

			$('.assign_teacher').click(function(){
				var class_name = $(this).data('id');
				var teacher_id = $('#teacher_name'+class_name).children('option:selected').val();
				var cat="teacher";
				if (teacher_id=="Select Teacher") {
					swal("Please Select Any Teacher");
				}
				else
				{
					class_teacher_assign(class_name,teacher_id,cat);
				}
			});

			// $('#student_class').change(function(){
			// 	var value = $('#student_class option:selected').text();
			// 	if (value=="9th") 
			// 	{ window.location = "9th_class.php"; }
			// 	else if(value=="10th")
			// 	{
			// 		window.location = "10th_class.php";
			// 	}
			// });

			// $('#month').change(function(){
			// 	var value = $('#month option:selected').text();
			// 	$('.months').hide();
			// 	$('.weeks').show();

			// });

			// $('#week').change(function(){
			// 	var value = $('#week option:selected').text();
			// 	$('.weeks').hide();
			// 	$('.teachers').show();

			// });

			// $('#week').change(function(){
			// 	var value = $('#week option:selected').text();
			// 	$('.weeks').hide();
			// 	$('.teachers').show();

			// });

			// $('#teacher').change(function(){
			// 	var value = $('#week option:selected').text();
			// 	$('.teachers').hide();
			// 	$('.students_rating').show();

			// });
		});


	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#teacherTable').DataTable();
			$('#reviewTable').DataTable();
			$('#classTable').DataTable();
			$('#studentTable').DataTable();
		});
	</script>
</body>
</html>