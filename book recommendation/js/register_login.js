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



function login(role,email,pass)
{
	if (blank_field_check(email,'email') && blank_field_check(pass,'pass'))
	{
		$.ajax({
			url:"admin/includes/action.php",
			type:"post",
			data:{email:email.val(), pass:pass.val(),login:role},
			success:function(data)
			{
				if(data=='not')
				{
					$('#alert_login').show();
				}
				else
				{
					window.location=data;

				}
			}
		});
	} 
}


$(document).ready(function(){
	$('#alert_register').hide();
	$('#alert_login').hide();
	$('#email_error').hide();
	$('#pass_error').hide();
	$('.register').click(function(){
		var name= $('#name').val(); 
		var email= $('#email').val(); 
		var pass= $('#pass').val(); 
		var cpass= $('#cpass').val();
		var action = "register";
		if (name!='' && email !='' && pass!='' && cpass!='')
		{
			$.ajax({
				url:"admin/includes/action.php",
				type:"post",
				data:{name:name, email:email, pass:pass, register:action},
				success:function(data)
				{
					
					$('#alert_register').show();
					setTimeout(function(){ window.location="index.php" },5000);
				}
			});
		} 

	});

	 $(document).keyup(function(event) {
        if (event.keyCode == 13) {
         	$('.login').click();
         	$('.admin_login').click();
        }
    })

	$('.login').click(function(){ login('user',$('#email'),$('#pass')); } );
	$('.admin_login').click(function(){ login('admin',$('#email'),$('#pass')); } );

});