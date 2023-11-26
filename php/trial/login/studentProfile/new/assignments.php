<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
include('style.php');
include('head.php');
include('left.php');

echo "<div class='main'>";

echo "<br/><br/><center><h1><font face='28 Days Later' color='cyan' size='8'>Delete Assignment</font></h1></center><br/>";
$con=include('connect.php');

if($con)
	{
		
		//List of Assignments
		
		
	
	if(isset($_POST['name']))
	{
	
		$topic=$_POST['name'];
		$my_query="delete from Assignment where Topic='$topic'";
	
		if(mysql_query($my_query))
		{
			echo "Topic=$name";
			$path2="pdf/$topic.pdf";
			echo "<br/>$path2";
			if(is_file($path2))
			{
				echo"<br/>File deleted</br>";
				unlink($path2);
			}
			else
			{
				echo"<br/>Error deleting file</br>";
			}
		}
		else
		{
			echo "Query error <br/>$my_query";
		}	
	}
	else
	{
	
	echo "
		<form action='assignments.php' method='post' enctype='multipart/form-data'>
		
		<center><font size='6.5' face='Astonished'>Assignment Name: </font><input type='text' name='name'/></center><br/><br/>
		<center><input type='submit' value='Delete'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='reset' value='Clear'/></center>
		
		</form>
		";
	}
		
			$sql="select * from Assignment";
			$query=mysql_query($sql);
			echo "<table width=100% cellpadding='3'>
				<tr class='head'><tr><td><font face='Brandon Grotesque Bold'>Sr. No.</font></td>
									 <td><font face='Brandon Grotesque Bold'>Course</font></td>
									 <td><font face='Brandon Grotesque Bold'>Semester</font></td>
									 <td><font face='Brandon Grotesque Bold'>Topic</font></td>
									 <td><font face='Brandon Grotesque Bold'>Deadline</font></td>
									 <td><font face='Brandon Grotesque Bold'>Path</font></td>
								</tr>";
								
				$row_style="style1";
			
				while($row_data=mysql_fetch_array($query))
				{
					if($row_style=="style1"){$row_style="style2";}  
					else{$row_style="style1";}    
					
					echo 
					"<tr class='$row_style'>
					<td>$row_data[0]</td><td>$row_data[1]</td><td>$row_data[2]</td><td>$row_data[3]</td><td>$row_data[4]</td><td>$row_data[5]</td>
					</tr>";
					
				}
				echo "</table><br/><br/><br/><br/>";
				
		
}
		
	else
	{
		echo "Connection Error";
	}
echo "</div>";
include('right.php');
include('foot.php');
?>