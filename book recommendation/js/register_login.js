$(document).ready(function(){
	$('#alert_register').hide();
	$('#alert_login').hide();
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
					setTimeout(function(){ window.location="BookReadingPeriods.php" },5000);
				}
			});
		} 

	});

	$('.login').click(function(){
		var email= $('#email').val(); 
		var pass= $('#pass').val(); 
		var action = "login";
		if (email !='' && pass!='')
		{
			$.ajax({
				url:"admin/includes/action.php",
				type:"post",
				data:{email:email, pass:pass,login:action},
				success:function(data)
				{
					if(data=='not')
					{
						$('#alert_login').show();
					}
					else
					{
						window.location="BookReadingPeriods.php";

					}
				}
			});
		} 

	});


	$('.admin_login').click(function(){
		var email= $('#email').val(); 
		var pass= $('#pass').val(); 
		var action = "admin_login";
		if (email !='' && pass!='')
		{
			$.ajax({
				url:"admin/includes/action.php",
				type:"post",
				data:{email:email, pass:pass,admin_login:action},
				success:function(data)
				{
					if(data=='not')
					{
						$('#alert_login').show();
					}
					else
					{
						window.location="admin/index.php";

					}
				}
			});
		} 

	});

});