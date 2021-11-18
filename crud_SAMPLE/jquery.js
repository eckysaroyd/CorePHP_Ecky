$(document).ready(function(){
	$('#btn-submit').click(function(){
		var fname =$.trim($('#fname').val());
		var lname =$.trim($('#lname').val());
		var email =$.trim($('#email').val());
		var address=$.trim($('#address').val());
		if(fname=='')
		{
			alert("enter your first name");
			$('#fname').focus();
			return false;
		}
		if(lname=='')
		{
			alert("enter your last name");
			$('#lname').focus();
			return false;
		}
		if(email=='')
		{
			alert("enter your email address");
			$('#email').focus();
			return false;
		}
		if(IsEmail(email)==false)
			{	
				alert('Please Enter Valid Address');
				$('#email').focus();
				return false;
			}
		if(address=='')
		{
			alert("enter your home address");
			$('#address').focus();
			return false;
		}

	});
});
function IsEmail(email) {
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(email)) {
		return false;
		}else{
		return true;
		}
	}