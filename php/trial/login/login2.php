<?php 
ob_start(); 
$admin_id=null;
include('stylesheet.php');
include('header.php');
include('hmenu.php');
echo " <div class=main>";
echo " <div class=mainlog> ";
$con=include('connect.php');
if($con)
	{	
		//echo "<hr/><a href=login.php>Sign in as User</a><hr/>";
		if(isset($_POST['admin_id']))
		{
		
		
		
			echo "<h1>login</h1>";
			$admin_id=mysql_escape_string($_POST['admin_id']);
			$pwd=mysql_escape_string($_POST['pwd']);
				
				if (!$_POST['admin_id'] | !$_POST['pwd'])
				{
				echo "<SCRIPT >
				alert('You did not complete all of the required fields')
			
				</SCRIPT>";
				$flag=false;
				}
		
				else{
				$sql= mysql_query("SELECT * FROM admin WHERE `admin_id` = '$admin_id' AND `pwd` = '$pwd'");
					if(mysql_num_rows($sql)>0)
					{
					echo ("<SCRIPT>
					alert('Login Succesfully!.')
					location.href='newteacherProfile/indexAD.php?admin_id=$admin_id'
					</SCRIPT>");
		
					}
					else
					{
					echo "<SCRIPT>
					alert('Wrong admin_id pwd combination.Please re-enter.');
					</SCRIPT>";
					$flag=false;
					$admin_id=$pwd="";
					}
		
					}
					
					
		
					
					if($flag==false)
					{	echo "re-enter admin_id and pwd";
						echo  "
				<form action='login2.php'  method='post'  >
				<table width=100%  cellpadding=10>
				<tr><td>Username</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=admin_id id=uname value='$admin_id' /></td></tr>
				<tr><td>Password</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=password name=pwd id=pwd value='$pwd' /></td></tr>
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
				<tr><td>Username</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=admin_id id=uname value='$admin_id' /></td></tr>
				<tr><td>Password</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=password name=pwd id=pwd value='$pwd' /></td></tr>
				<tr><td colspan=2>&nbsp;</td><td><input type=submit value=Login /></td></tr>
				</table>
				</form>
				
				";	
					}
}	

	
	
	else{
	echo "connection failure";
}


echo "<br/><a href=login.php>Sign in as Student</a><hr width=300 align=left />";
echo "</div>";
echo "</div>";
include('footer.php');
include('footer2.php');


/*
echo file_get_contents('http://localhost/php/trial/stylesheet_php/footer.php');
echo file_get_contents('http://localhost/php/trial/stylesheet_php/footer2.php');
*/
include('left1.php');
include('right.php');
	
		?>		
		