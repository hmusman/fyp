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


function add_update_category(id,title,description,action)
{
	
	$.ajax({
		url:"includes/action.php",
		type:"post",
		data:{id:id,title:title,description:description,category_action:action},
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


function add_update_book(id ,hobby,action,old_name,file)
{
	var formData = new FormData();
	formData.append('id',id);
	formData.append('hobby',hobby);
	formData.append('old_name',old_name);
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
