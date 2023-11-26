<?php 
ob_start(); 

include('stylesheet.php');
include('header.php');
include('hmenu.php');

echo " <div class=main>";
echo " <div class=mainlog> ";

$con=include('connect.php');
if($con)
	{	
		
		if(isset($_POST['username']))
		{
		
		
		
			$username=mysql_escape_string($_POST['username']);
			$password=mysql_escape_string($_POST['password']);
				
			if (!$_POST['username'] | !$_POST['password'])
				{
					if(!$_POST['username'])
					{
						echo "Username can't be empty <br/>";

					}	
				
					else if(!$_POST['password'])
					{
						echo "Password can't be empty <br/>";
					}
				
					else
					{
						echo "Username and Password can't be empty <br/>";
					}
					$flag=false;
				}
		
			else
				{
				$sql= mysql_query("SELECT * FROM oplog WHERE `username` = '$username' AND `password` = '$password'");
				if(mysql_num_rows($sql)>0)
					{
						echo ("<SCRIPT>
						alert('Login Succesfully!.')
						location.href='indexAD.php'
						</SCRIPT>");
		
					}
				else
					{
					echo "<SCRIPT>
					alert('Wrong username password combination.Please re-enter.');
					
					</SCRIPT>";
					$flag=false;
					$username=$password="";
					echo "<SCRIPT>location.href='login2.php'</SCRIPT>";
					}
		
				}
					
					
		
					
					if($flag==false)
					{	
						
						echo "re-enter username and password";
						echo  "
						<form action='login2.php'  method='post'  >
						<table width=100%  cellpadding=10>
						<tr><td>Username</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=username id=uname value='$username' /></td></tr>
						<tr><td>Password</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=password name=password id=pwd value='$password' /></td></tr>
						<tr><td colspan=2>&nbsp;</td><td><input type=submit value=Login /></td></tr>
						</table>
						</form>
						";
				
					}
		}
					else
					{
			
						echo  "
				<form action='login2.php'  method='post'  >
				<table width=100%  cellpadding=10>
				<tr><td>Username</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=username id=uname value='$username' /></td></tr>
				<tr><td>Password</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=password name=password id=pwd value='$password' /></td></tr>
				<tr><td colspan=2>&nbsp;</td><td><input type=submit value=Login /></td></tr>
				</table>
				</form>
				";	
					}
}	

	
	
else
	{
	echo "connection failure";
	}

echo "<br/><a href=login.php>Sign in as Student</a><hr width=300 align=left />";
echo "</div>";
echo "</div>";

include('left1.php');
include('right.php');
include('footer.php');

		?>		
		