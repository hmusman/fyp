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
				url:"includes/action.php",
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
				url:"includes/action.php",
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
});