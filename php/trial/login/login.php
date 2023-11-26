<?php 
ob_start(); 
$student_id=null;
include('stylesheet.php');
include('header.php');
include('hmenu.php');
echo " <div class=main>";
echo " <div class=mainlog> ";
$con=include('connect.php');
if($con)
	{
	
		//echo "<hr/><a href=login2.php>Sign in as Admin</a><hr/>";
		if(isset($_POST['student_id']))
		{
			echo "<h1>login</h1>";
			$student_id=mysql_escape_string($_POST['student_id']);
			$pwd=mysql_escape_string($_POST['pwd']);
				
		 if (!$_POST['student_id'] | !$_POST['pwd'])
		{
			echo "<SCRIPT >
			alert('you cant left th fields empty')
			
			</SCRIPT>";
			$flag=false;
		}
		
		else
		{
		$sql= mysql_query("SELECT * FROM student WHERE student_id = '$student_id' AND pwd = '$pwd'");
		if(mysql_num_rows($sql)>0)
		{
		echo "<input type='hidden' value='$student_id' name='student_id'/>";
		echo ("<SCRIPT>
        alert('Login Successfull!.')
        location.href='studentProfile/indexSTU.php?student_id=$student_id'
        </SCRIPT>");
		
		}
		else
		{
		echo "<SCRIPT>
        alert('Wrong student_id pwd combination.Please re-enter.');
        
        </SCRIPT>";
		
		$flag=false;
		$student_id=$pwd="";
		}
		
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
			if($flag==false)
			{	echo "re-enter student_id and password";
				echo "
				<form action='login.php'  method='post'  >
				<table width=100%  cellpadding=10>
				<tr><td>Username</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=student_id id=uname value='$student_id' /></td></tr>
				<tr><td>Password</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=password name=pwd id=pwd value='$pwd' /></td></tr>
				<tr><td colspan=2>&nbsp;</td><td><input type=submit value=Login /></td></tr>
				</table>
				</form>
				";
			}
		}
		else
		{
			echo "
				<form action='login.php'  method='post'  >
				<table width=100%  cellpadding=10>
				<tr><td>Username</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=student_id id=uname value='$student_id' /></td></tr>
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


echo "<br/><a href=login2.php>Sign in as Admin</a><hr width=300 align=left />";
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
		