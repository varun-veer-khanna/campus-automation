<head>
<link rel="stylesheet" href="style.css" type="text/css"/>
<script>
function empty_check()
{
var email=document.getElementById('email').value;
var pwd=document.getElementById('pwd').value;
if(email.trim().length!=0 && pwd.trim().length!=0 )
{
alert("ok");
}
else
{
	
	if(email.trim().length==0){
	
	document.getElementById('email_err').innerHTML="email id can't be empty";
	}
	if(pwd.trim().length==0)	{
	
	document.getElementById('password_err').innerHTML="\npassword can't be empty";}
	//alert(err_msg);

}
}


function empty_check_1(id,err_id)
{
var email=document.getElementById(id).value;
	var err_msg="";
	if(email.trim().length==0)
	{
	err_msg="can't be empty";
	}
	document.getElementById(err_id).innerHTML=err_msg;
}


</script>
</head>