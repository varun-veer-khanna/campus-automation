<?php
include("style.php");
include('head.php');
include("left.php");
echo "<div class='main'>";
$connection_status=include("db_connection.php");
if($connection_status)
{
 if(isset($_POST['student_id']) ||isset($_REQUEST['student_id']))
	{
		if(isset($_POST['student_id']))
		{
		$student_id=$_POST['student_id'];
		}
		else
		{
		$student_id=$_REQUEST['student_id'];
		}
		$sql="select * from student where student_id=$student_id";
		$query_result=mysql_query($sql);
		if(mysql_query($sql))
		{
		
		$num_of_rows=mysql_num_rows($query_result);
			if($num_of_rows>0)
			{
				$row=mysql_fetch_row($query_result);
			echo "<table width='50%' align='center'>
			<tr><td><b>Student ID</b></td><td>$row[0]</td></tr>
			<tr><td><b>Name</b></td><td>$row[1]</td></tr>
			<tr><td><b>Father's Name</b></td><td>$row[2]</td></tr>
			<tr><td><b>Mother's Name</b></td><td>$row[3]</td></tr>
			<tr><td><b>Date of Birth</b></td><td>$row[4]</td></tr>
			<tr><td><b>Gender</b></td><td>$row[5]</td></tr>
			<tr><td><b>Address</b></td><td>$row[6]</td></tr>";
			$sql2="select * from qualification where student_id=$student_id";
		$query=mysql_query($sql2);
		if(mysql_query($sql2))
		{
			$num=mysql_num_rows($query);
			if($num>0)
			{
				$rows=mysql_fetch_row($query);
				echo"<tr><td colspan=2> 
				<table border='1'>
                <tr><th>Qualification</th><th>Uni/college name</th><th>Year of appearing</th><th>Percentage</th></tr>
                <tr><td>10th</td>
                <td>$rows[1]</td>
                <td>$rows[2]</td>
                <td>$rows[3]</td></tr>
				<tr><td>+2</td>
                <td>$rows[4]</td>
                <td>$rows[5]</td>
                <td>$rows[6]</td></tr>
				<tr><td>Graduation</td>
                <td>$rows[7]</td>
                <td>$rows[8]</td>
                <td>$rows[9]</td></tr>
				<tr><td>Post Graduation</td>
                <td>$rows[10]</td>
                <td>$rows[11]</td>
                <td>$rows[12]</td></tr>
				
              </table></td></tr>";
	        }
			else
			{
			}
        }	
			echo "<tr><td><b>Email ID</b></td><td>$row[7]</td></tr>
			<tr><td><b>Contact Number</b></td><td>$row[8]</td></tr>
			<tr><td><b>Date of registration</b></td><td>$row[11]</td></tr>
			<tr><td><b>Course Selected</b></td><td>$row[12]</td></tr>
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
include('right.php');
include('foot.php');

?>