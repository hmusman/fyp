function validation_field_check(id,check,error,pattern,minlength,maxlength)
{
	id.keyup(function()
	{
		if(!pattern.test(id.val()))
		{
			$('#'+error+'_error').show();
			id.css('border','1px solid #ff7f7f');
			$('#'+error+'_error').text('Only '+check+' Are Allowed');
		}
		else if(id.val().length > maxlength)
		{
			$('#'+error+'_error').show();
			id.css('border','1px solid #ff7f7f');
			$('#'+error+'_error').text('Maximum '+maxlength +' Length Is Allowed');
		}

		else if(id.val().length < minlength)
		{
			$('#'+error+'_error').show();
			id.css('border','1px solid #ff7f7f');
			$('#'+error+'_error').text('Minimum '+minlength +' Length Is Allowed');
		}
		else
		{
			$('#'+error+'_error').hide();
			id.css('border','1px solid green');
		}
	});
}

function blank_field_check(id,check,error,pattern,minlength,maxlength)
{
	var value = id.val();
	if(value=='')
	{
		$('#'+error+'_error').show();
		id.css('border','1px solid #ff7f7f');
		validation_field_check(id,check,error,pattern,minlength,maxlength);
	}
	else
	{ validation_field_check(id,check,error,pattern,minlength,maxlength); }

}

function time_blank_check(id,error)
{
	var value = id.val();
	if(value=='')
	{
		id.change(function(){
			if (id.val()!='')
			{
				$("#"+error+"_error").hide();
				id.css('border','1px solid green');
				return true;
			}
		});
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

function file_blank_check(id,error)
{
	var value = id.val();
	if(value=='')
	{
		$('#'+error+'_error').show();
		id.css('border','1px solid #ff7f7f');
		return false;
	}
	else
	{ return true; }

}


function select_check(id,error)
{
	if (id.val()==null)
	{ 
		id.change(function(){
			if (id.val()!=null)
			{
				$("#"+error+"_error").hide();
				id.css('border','1px solid green');
				return true;
			}
		});
		$("#"+error+"_error").show();
		id.css('border','1px solid #ff7f7f');
		return false;

	}
	else
	{
		$("#"+error+"_error").hide();
		id.css('border','1px solid green');
		return true;
	}
}

function  teacher_signup(username,pass)
{
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:{username:username,pass:pass,teacher_signup:"teacher_signup"},
		success:function(data)
		{
			if (data=="Username Already Exists") {
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

function  student_signup(username,pass)
{
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:{username:username,pass:pass,student_signup:"student_signup"},
		success:function(data)
		{
			if (data=="Username Already Exists") {
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

function class_add_update(id,name,section,location,student,timing,action)
{
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:{id:id,name:name,section:section,student:student,location:location,timing:timing,class_action:action},
		success:function(data)
		{
			if (data=="Class Already Exists") {
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

function teacher_add_update(id,username,name,email,cnic,phone,experience,salary,education,subject,file,action)
{
	var formdata = new FormData();
	formdata.append('id',id);
	formdata.append('username',username);
	formdata.append('name',name);
	formdata.append('email',email);
	formdata.append('cnic',cnic);
	formdata.append('phone',phone);
	formdata.append('education',education);
	formdata.append('experience',experience);
	formdata.append('salary',salary);
	formdata.append('subject',subject);
	formdata.append('img',file);
	formdata.append('teacher_action',action);
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:formdata,
		processData: false,
       	contentType: false,
		success:function(data)
		{
			window.location=data;
		}

	});
}

function class_teacher_association_add_update(id,class_name,teacher_id,subject,start_time,end_time,shift,action)
{
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:{id:id,class_name:class_name,teacher_id:teacher_id,subject:subject,start_time:start_time,end_time:end_time,shift:shift,class_teacher_association_action:action},
		success:function(data)
		{
			if (data=="Class Teacher Association Already Exists") {
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

function active_block(table,id,name,action)
{
	swal({
	    title: "Are you sure?",
	    text: "You want to "+action+" "+name,
	    type: "warning",
	    showCancelButton: true,
	    confirmButtonColor: '#DD6B55',
	    confirmButtonText: 'Yes',
	    cancelButtonText: "No",
	    closeOnConfirm: true,
	    closeOnCancel: true
	 },
	 function(isConfirm){
	   if (isConfirm){
	   		$.ajax({
				url:"includes/action.php",
				type:"post",
				data:{table:table,id:id,active_block:action},
				success:function(data)
				{
					location.reload();
				}
			});
	    }
	 });
}

function student_add_update(id,username,name,email,admission,class_id,action)
{
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:{id:id,username:username,name:name,email:email,admission_date:admission,class_id:class_id,student_action:action},
		success:function(data)
		{
			
			if (data=="Username Already Exists") {
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
	$('#teacher_error').hide();
	$('#shift_error').hide();
	$('#location_error').hide();
	$('#to_time_error').hide();
	$('#from_time_error').hide();
	$('#shift_error').hide();
	$('#email_error').hide();
	$('#pass_error').hide();
	$('#subject_error').hide();
	$('#month_error').hide();
	$('#week_error').hide();
	$('#class_error').hide();
	$('#admission_error').hide();
	$('#cnic_error').hide();
	$('#phone_error').hide();
	$('#education_error').hide();
	$('#experience_error').hide();
	$('#salary_error').hide();
	// $('#teacherTable').DataTable();
	// $('#reviewTable').DataTable();
	// $('#classTable').DataTable();
	// $('#studentTable').DataTable();

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
			alert("you are not");
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