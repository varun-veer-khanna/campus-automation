<?php
include('style.php');
include('head.php');
include('left.php');
echo "<div class='main'>";
echo "<br/><center><font face='28 Days Later' color='cyan' size='8'>Grade</font></center><br/>";
$connection_status=include("connect.php");
if($connection_status)
{
  if(isset($_POST['student_id']))
	{
		$student_id=$_REQUEST['student_id'];
		$sql="select * from grade where student_id=$student_id";
		$query_result=mysql_query($sql);
		
		if($query_result)
		{
		    echo"
				<table cellpadding='4' border='1' align='center'>
                <tr>
					<th>Subject</th><th>MST</th><th>Assignment</th><th>Project</th>
					<th>Seminar</th><th>Other</th><th>External</th><th>Total</th>
				</tr>";
				
			$row_style="style1";
			while($rows=mysql_fetch_array($query_result))
			{
				if($row_style=="style1"){$row_style="style2";} 
			    else{$row_style="style1";}    
               echo" <tr class='$row_style'>
				<td>$rows[1]</td>
                <td>$rows[2]</td>
                <td>$rows[3]</td>
                <td>$rows[4]</td>
                <td>$rows[5]</td>
                <td>$rows[6]</td>
                <td>$rows[7]</td>
				<td>$rows[8]</td>
               </tr>";
            } 
			echo "</table><br/><br/>";

			echo "
			<form action='grade.php?student_id=$student_id' method='POST'>
			<table width='60%'>
			<tr><td><font face='Astonished' size='6.5'>Subject: </font></td><td><input type='text' name='subject'></td></tr>
			<tr><td><font face='Astonished' size='6.5'>MST: </font></td><td><input type='text' name='mst'></td></tr>
			<tr><td><font face='Astonished' size='6.5'>Assignment: </font></td><td><input type='text' name='assignment'></td></tr>
			<tr><td><font face='Astonished' size='6.5'>Project: </font></td><td><input type='text' name='project'></td></tr>
			<tr><td><font face='Astonished' size='6.5'>Seminar: </font></td><td><input type='text' name='seminar'></td></tr>
			<tr><td><font face='Astonished' size='6.5'>Other: </font></td><td><input type='text' name='other'></td></tr>
			<tr><td><font face='Astonished' size='6.5'>External: </font></td><td><input type='text' name='external'></td></tr>
			</table>
			<center><input type='submit' value='Submit'></center>
			</form>
			";
		}
	}
	else if(isset($_POST['subject']))
	{
		$student_id=$_REQUEST['student_id'];
		
		$subject=$_POST['subject'];
		$mst=$_POST['mst'];
		$assign=$_POST['assignment'];
		$project=$_POST['project'];
		$seminar=$_POST['seminar'];
		$other=$_POST['other'];
		$external=$_POST['external'];
		
		$sql="update grade set mst=$mst && assignment=$assign where student_id=$student_id && subject='$subject'";
		$query=mysql_query($sql);
		if($query)
		{echo "Updated";}
		else
		{echo "Error in updating";}
	
	}
	else
	{
		echo"
		<form action='grade.php' method='POST'>
		<center><pre><font face='Astonished' size='6.5'>    Input Student ID:</font> <input type='text' name='student_id'></pre></center><br/>
		<center><input type='submit' value='Submit'></center>
		</form>";
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
