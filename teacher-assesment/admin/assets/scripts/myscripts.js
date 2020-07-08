function blank_field_check(id,error)
{
	var value = id.val();
	if(value=='')
	{
		$('#'+error+'_error').show();
		id.css('border','1px solid #ff7f7f');
		return false;
	}
	else
	{
		$('#'+error+'_error').hide();
		id.css('border','1px solid green');
		return true;
	}
}

function teacher_add_update(id,name,email,pass,subject,action)
{
	
	var name_val = name.val();
	var email_val = email.val();
	var pass_val = pass.val();
	var subject_val = subject.val();
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:{id:id,name:name_val,email:email_val,pass:pass_val,subject:subject_val,teacher_action:action},
		success:function(data)
		{
			if (data=="Teacher Already Exists") {
				swal({
				    title: "",
				    text: data,
				    type: "warning",
				    confirmButtonColor: '#3F51B5',
				    confirmButtonText: 'Ok',
				    closeOnConfirm: false,
				 });
			}
			else
			{
				window.location=data;
			}
		}

	});
}



$(document).ready(function(){
	
	$('#name_error').hide();
	$('#email_error').hide();
	$('#pass_error').hide();
	$('#subject_error').hide();

	$('#teacherTable').DataTable();
	$('#reviewTable').DataTable();
	$('#classTable').DataTable();
	$('#studentTable').DataTable();

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

});