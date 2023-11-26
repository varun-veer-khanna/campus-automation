<?php
include("mystyle.php");
include("head.php");
include("mainmenu.php");
include("leftmenu.php");
echo "<div class='main'>";
echo "<center><h1>Insert</h1></center>";
$connection_status=include("db_connection.php");
if($connection_status)
{
			//
			
			if(isset($_POST['empid']))
			{
			$empid=$_POST['empid'];
			$empname=$_POST['empname'];
			$empsalary=$_POST['empsalary'];
			$insert_query="insert into empinfo(empid,empname,empsalary) values($empid,'$empname',$empsalary)";
			if(mysql_query($insert_query))
			{
			echo "saved";
			}
			else
			{
			echo "error <br/>$insert_query";
			}
			
			
			}
			
			
			echo "<form action='insert.php' method='post'>
			<table>
			<tr><td>empid</td><td><input type='text' name='empid' /></td></tr>
			<tr><td>empname</td><td><input type='text' name='empname' /></td></tr>
			<tr><td>empsalary</td><td><input type='text' name='empsalary' /></td></tr>
			<tr><td><center><input type='submit' value='save' /></center></td></tr>
			</table></form>";
			
			
			
			
			
			
			
			
			
			
			
			
}
else
{
echo "connection error";
}
 
echo "</div>";
include("addwindow.php");
include("footer.php");
?>