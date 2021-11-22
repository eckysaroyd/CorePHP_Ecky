$(document).ready(function(){
$('button').click(function(){
var fname=$.trim($('.fname').val());
var lname=$.trim($('.lname').val());
var email=$.trim($('.email').val());
var contactno=$.trim($('.contactno').val());
var Address=$.trim($('.Address').val());
if(fname=='')
{
	alert('Please Enter Your First Name');
	$('.fname').focus();
	return false;
}
if(lname=='')
{
	alert('Please Enter Your Last Name');
	$('.lname').focus();
	return false;
}
if(email=='')
{
	alert('Please Enter Your Email Address');
	$('.email').focus();
	return false;
}

if(IsEmail(email)==false)
{
	alert('Please Enter Valid Address');
	$('.email').focus();
	return false;
}
if(isNaN(contactno))
{
	alert('Enter a Right Mobile number');
	$('.contactno').focus();
	return false;
}
if(contactno=='')
{
alert('Enter a Your Mobile number');
$('.contactno').focus();
return false;
}
if(Address=='')
{
	alert("Please Enter  Your Address");
	$('.Address').focus();
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