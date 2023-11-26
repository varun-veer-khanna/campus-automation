<?php
include("mystyle.php");
include_once("script.php");
include("head.php");
include("mainmenu.php");
include("leftmenu.php");
echo "<div class='main'>";
echo "<center><h1>Internal</h1></center><br/>";
$connection_status=include("db_connection.php");
if($connection_status)
{
echo "
	<form action='ins.php' method='post'>
	<table width='40%' align='center'>
			<tr><td><b>Student ID</b> &nbsp &nbsp
			<select name='std_id' >";
			$sql="select  std_id from student1";
			$query=mysql_query($sql);
			while($row=mysql_fetch_array($query))
			{
			echo "<option value='$row[0]'>$row[0]</option>";
			}
			echo "</select></td>";			
	echo "<td><input type='submit' value='Find' class='btn'/></td></tr>
	</table>
	<hr/>
	</form>";
  if(isset($_POST['std_id']) ||isset($_REQUEST['std_id']))
	{
		if(isset($_POST['std_id']))
		{
		$std_id=$_POST['std_id'];
		}
		else
		{
		$std_id=$_REQUEST['std_id'];
		}
		$sql="select * from student1 where std_id=$std_id";
		$query_result=mysql_query($sql);
		if(mysql_query($sql))
		{
		
		$num_of_rows=mysql_num_rows($query_result);
			if($num_of_rows>0)
			{
				$row=mysql_fetch_row($query_result);
			echo "<table width='30%' align='center'>
			<tr><td><b>Student ID</b></td><td>$row[0]</td></tr>
		
			<tr><td><b>Internal</b></td><td>$row[1]</td></tr>
			
			//<tr><td colspan='2'><br/><center><a href='edit1.php?std_id=$row[0]' class='btn'>Edit</a></center></td></tr>
			</table>";
			}
			else
			{
			echo "not found";
			}
	
		}
		
		else
		{
		echo "error <br/>$sql";
		}
	}
	
	
	
}
else
{
echo "connection error";
}
 
echo "</div>";
include("addwindow.php");
include("footer.php");
?>