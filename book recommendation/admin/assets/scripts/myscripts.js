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

function file_check(id,error)
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
	
		var size = id[0].files[0].size;
		if (size>=100000000)
		{
			$('#'+error+'_error').hide();
			$('#'+error+'_file_error').show();
			return false;
		}
		else
		{
			$('#'+error+'_file_error').hide();
			return true;
		}
		
	}
}

function select_check(id,error)
{
	if (id.val()==null)
	{ 
		$("#"+error+"_error").show();
		return false;
	}
	else
	{
		$("#"+error+"_error").hide();
		return true;
	}
}

function add_update_category(id,title,description,img,action)
{
	
	var formdata =new FormData();
	formdata.append('id',id);
	formdata.append('title',title);
	formdata.append('description',description);
	formdata.append('img',img);
	formdata.append('category_action',action);
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:formdata,
		processData: false,
       	contentType: false,
		success:function(data)
		{
			if (data=="Category Already Exists") 
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
	});
}

function add_update_hobby(id,name,category,action)
{
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:{id:id,name:name,category:category,hobby_action:action},
		success:function(data)
		{
			if (data=="Hobby Already Exists") 
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
	});
}

function add_update_writer(id,name,category,action)
{
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:{id:id,name:name,category:category,writer_action:action},
		success:function(data)
		{
			if (data=="Writer Already Exists") 
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
	});
}


function add_update_book(id ,hobby,writer,description,action,old_file,old_img,file,img)
{
	var formData = new FormData();
	formData.append('id',id);
	formData.append('hobby',hobby);
	formData.append('writer',writer);
	formData.append('description',description);
	formData.append('old_file',old_file);
	formData.append('old_img',old_img);
	formData.append('img',img);
	formData.append('file',file);
	formData.append('book_action',action);
	$.ajax({
       url : 'includes/action.php',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,  // tell jQuery not to set contentType
       success : function(data) {
           if (data=="Book Already Exists") 
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
	});
}
